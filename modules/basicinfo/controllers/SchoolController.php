<?php

namespace app\modules\basicinfo\controllers;

use app\models\School;
use Yii;
use app\models\search\SchoolSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `basicinfo` module
 */
class SchoolController extends Controller
{
    const MODULE_NAME = "学校管理";
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SchoolSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Modules model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new School model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new School();
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){
                $result = $model->createOrUpdateOne(SchoolController::MODULE_NAME);
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['index', 'id' => $model->schoolID]);
            }
        }
        return $this->render('create-update', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing School model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $result = $model->createOrUpdateOne(SchoolController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index', 'id' => $model->schoolID]);
        } else {
            return $this->render('create-update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Modules model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $errorStr = "";
        $model = new School();
        $moduleIdsArr =  explode(",",$id);
        $result = $model->deleteBatch($moduleIdsArr,SchoolController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg'].$errorStr);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Modules model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return School the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = School::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
