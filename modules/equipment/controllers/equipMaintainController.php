<?php

namespace app\modules\equipment\controllers;

use app\models\Equipment;
use app\models\EquipmentMaintain;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\search\EquipApplySearch;

class EquipMaintainController extends Controller{
    const MODULE_NAME = "设备维修管理";

    public function actionIndex()
    {
        $searchModel = new EquipApplySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryparams);

        return $this->render('index',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

//    public function actionUpdate($id)
//    {
//        //判断是否可以修改。
//        $bb = new EquipmentMaintain();
//        $statue = $bb->judgeStatue($id);
//        if($statue) {
//            $model = $this->findModel($id);
//            if ($model->load(Yii::$app->request->post()) && $model->validate()){
//                $result = $model->createOrUpdateOne(EquipMaintainController::MODULE_NAME);
//
//                $dd = new EquipmentMaintain();
//                $name = 'applyDate';
//                $dd->autoCreateStatus($name, $model->equipmentMaintainID);
//                Yii::$app->session->setFlash($result['type'], $result['msg']);
//                return $this->redirect(['index', 'id' => $model->equipmentMaintainID]);
//            }else{
//                return $this->render('create-update', [
//                    'model' => $model,
//                ]);
//            }
//        }else{
//            Yii::$app->session->setFlash('error', '已不是申请状态，请勿操作！');
//            return $this->redirect(['index']);
//        }
//    }
    public function actionUpdate($id){
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post()) && $model->validate()){
                $post=Yii::$app->request->post();
                $eqId = $post['EquipmentMaintain']['equipmentID'];
                $result = $model->createOrUpdateOne(EquipMaintainController::MODULE_NAME);

                $dd = new EquipmentMaintain();
                $name = 'applyDate';
                $dd->autoCreateStatus($name, $model->equipmentMaintainID);
                if($result){
                    $eqObj=Equipment::find()->where(['EquipmentId'=>$eqId])->one();
                    $eqObj->status = "RU";
                    $eqObj->save();
                }
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['index', 'id' => $model->equipmentMaintainID]);
            }else{
                return $this->render('create-update', [
                    'model' => $model,
                ]);
            }
    }

    public function actionDelete($id)
    {
        $errorStr = "";
        $model = new EquipmentMaintain();
        $moduleIdsArr = explode(",",$id);
        $result = $model->deleteBatch($moduleIdsArr,EquipController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg'].$errorStr);
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = EquipmentMaintain::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}