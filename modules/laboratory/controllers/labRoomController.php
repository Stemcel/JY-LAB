<?php

namespace app\modules\laboratory\controllers;

use app\models\LaboratoryRoom;
use app\models\Laboratory;
use yii\web\Controller;
use Yii;
use app\models\search\LaboratoryRoomSearch;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `laboratory` module
 */
class LabRoomController extends Controller
{
    const MODULE_NAME = "实验室用房管理";
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $searchModel = new LaboratoryRoomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
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

    public function actionCreate()
    {
        $model = new LaboratoryRoom();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $result = $model->createOrUpdateOne(myLabController::MODULE_NAME);
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['index', 'id' => $model->laboratoryRoomID]);
            }
        }

        return $this->render('create-update', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $result = $model->createOrUpdateOne(myLabController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index','id' => $model->laboratoryRoomID]);
        }else{
            return $this->render('create-update',[
                'model'=>$model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $errorStr = "";
        $model = new LaboratoryRoom();
        $moduleIdsArr = explode(",",$id);
        $result = $model->deleteBatch($moduleIdsArr,myLabController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg'].$errorStr);
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = LaboratoryRoom::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
