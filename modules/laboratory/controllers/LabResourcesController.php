<?php

namespace app\modules\laboratory\controllers;

use app\models\Laboratory;
use yii\web\Controller;
use Yii;
use app\models\search\MyLabSearch;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `laboratory` module
 */
class LabResourcesController extends Controller
{
    const MODULE_NAME = "实验室基础信息";
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $searchModel = new MyLabSearch();
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
        $model = new Laboratory();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $result = $model->createOrUpdateOne(myLabController::MODULE_NAME);
                $name = 'apply';
                $model->atuoCreateStatus($name, $model->laboratoryID);
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['index', 'id' => $model->laboratoryID]);
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
            return $this->redirect(['index','id' => $model->laboratoryID]);
        }else{
            return $this->render('create-update',[
                'model'=>$model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $errorStr = "";
        $model = new Laboratory();
        $moduleIdsArr = explode(",",$id);
        $result = $model->deleteBatch($moduleIdsArr,myLabController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg'].$errorStr);
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Laboratory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
