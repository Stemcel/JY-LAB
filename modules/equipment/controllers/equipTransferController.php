<?php

namespace app\modules\equipment\controllers;

use Yii;
use app\models\EquipmentTransfer;
use yii\web\Controller;
use app\models\search\EquipmentTransferSearch;
use yii\web\NotFoundHttpException;
use app\models\Equipment;
error_reporting(0);
class EquipTransferController extends Controller
{
    const MODULE_NAME ="设备调拨";

    public function actionIndex()
    {
        $searchModel = new EquipmentTransferSearch();
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

    public function actionCreate(){
        $model = new EquipmentTransfer();
        $post=Yii::$app->request->post(); //5、至于为什么设备调动表 oldLaboratoryId和newLaboratoryId为什么是未设置，需要打印一下$post，
        //看看视图上是否成功提交过来了
//        print_r($post);die;
        $eqId = $post['EquipmentTransfer']['equipmentID'];
        $newLaboratoryID = $post['EquipmentTransfer']['newLaboratoryID'];
        $newRoomId = $post['EquipmentTransfer']['newRoomID'];
        if ($model->load($post)&&$model->validate()){
            $result = $model->createOrUpdateOne(EquipTransferController::MODULE_NAME);
//            print_r($model->getErrors());
            if($result){   //2、如果设备调动表新增成功，则接下来去处理设备详情表
                $eqObj=Equipment::find()->where(['EquipmentId'=>$eqId])->one(); //3、找到对应的对应的设备
                $eqObj->roomID = $newRoomId;
                $eqObj->laboratoryID = $newLaboratoryID;
                $eqObj->save();  //4、这里也就完成了设备详情表 的修改
//                print_r($eqObj->getErrors());
            }
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index', 'id' => $model->equipmentTransferID]);
        }
        return $this->render('create-update',[
            'model' => $model,
        ]);
    }


//    public function actionCreate()
//{
//    $model = new EquipmentTransfer();
//    if ($model->load(Yii::$app->request->post())){
//        if ($model->validate()){
//            $result = $model->createOrUpdateOne(EquipTransferController::MODULE_NAME);
//            Yii::$app->session->setFlash($result['type'], $result['msg']);
//            return $this->redirect(['index', 'id' => $model->equipmentTransferID]);
//        }
//    }
//    return $this->render('create-update',[
//        'model' => $model,
//    ]);
//}

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $result = $model->createOrUpdateOne(EquipTransferController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index','id' => $model->equipmentTransferID]);
        }else{
            return $this->render('create-update',[
                'model'=>$model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $errorStr = "";
        $model = new EquipmentTransfer();
        $moduleIdsArr = explode(",",$id);
        $result = $model->deleteBatch($moduleIdsArr,EquipTransferController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg'].$errorStr);
        return $this->redirect(['index']);
    }

    public function findModel($id)
    {
        if(($model = EquipmentTransfer::findOne($id)) !== null){
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
