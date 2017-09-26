<?php

namespace app\modules\basicinfo\controllers;

use app\models\Classes;
use Yii;
use app\models\search\ClassesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;



class ClassesController extends Controller
{
    const MODULE_NAME ="班级管理";

    public function actionIndex()
    {
        $searchModel = new ClassesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryparams);

        return $this->render('index',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = Classes::find()->where(['classesID' => $id])->with('campus','major')->one();
        return $this->render('view',[
            'model'=>$model
        ]);
    }

    public function actionCreate()
    {
        $model = new Classes();
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){
                $result = $model->createOrUpdateOne(ClassesController::MODULE_NAME);
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['index', 'id' => $model->classesID]);
            }
        }
        return $this->render('create-update', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing Class model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $result = $model->createOrUpdateOne(ClassesController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index','id' => $model->classesID]);
        }else{
            return $this->render('create-update',[
                'model'=>$model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $errorStr = "";
        $model = new Classes();
        $moduleIdsArr = explode(",",$id);
        $result = $model->deleteBatch($moduleIdsArr,ClassesController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg'].$errorStr);
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if(($model = Classes::findOne($id)) !== null){
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}


