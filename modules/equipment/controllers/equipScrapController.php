<?php

namespace app\modules\equipment\controllers;

use app\models\EquipmentScrap;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\search\EquipmentScrapSearch;
use app\models\Equipment;

class EquipScrapController extends Controller
{

    const MODULE_NAME ="设备报废";
    public function actionIndex()
    {
        $searchModel = new EquipmentScrapSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryparams);

        return $this->render('index',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view',[
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new EquipmentScrap();
        if($model->load(Yii::$app->request->post())){
            $post=Yii::$app->request->post();
            $eqId = $post['EquipmentScrap']['equipmentID'];
            $newStatus = $post['EquipmentScrap']['status'];
            if ($model->load($post)&&$model->validate()){
                $result = $model->createOrUpdateOne(EquipScrapController::MODULE_NAME);
                if($result){
                    $eqObj=Equipment::find()->where(['EquipmentId'=>$eqId])->one();
                    $eqObj->status = $newStatus;
                    $eqObj->save();
//                    print_r($eqObj);die;
                }
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['index', 'id' => $model->equipmentScrapID]);
            }
        }
        return $this->render('create-update',[
            'model' => $model,
        ]);
    }

//    public function actionCreate()
//    {
//        $model = new EquipmentScrap();
//        if($model->load(Yii::$app->request->post())){
//            if($model->validate()){
//                $result = $model->createOrUpdateOne(EquipScrapController::MODULE_NAME);
//                Yii::$app->session->setFlash($result['type'], $result['msg']);
//                return $this->redirect(['index', 'id' => $model->equipmentScrapID]);
//            }
//        }
//        return $this->render('create-update',[
//            'model' => $model,
//        ]);
//    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $result = $model->createOrUpdateOne(EquipScrapController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index','id' => $model->equipmentScrapID]);
        }else{
            return $this->render('create-update',[
                'model'=>$model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $errorStr = "";
        $model = new EquipmentScrap();
        $moduleIdsArr = explode(",",$id);
        $result = $model->deleteBatch($moduleIdsArr,EquipScrapController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg'].$errorStr);
        return $this->redirect(['index']);
    }

    public function findModel($id)
    {
        if(($model = EquipmentScrap::findOne($id)) !== null){
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}