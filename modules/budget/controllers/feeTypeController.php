<?php

namespace app\modules\budget\controllers;

use app\models\FeeType;
use Yii;
use app\models\search\FeeTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * FeesType controller for the `budget` module
 */
class FeeTypeController extends Controller
{
    const MODULE_NAME = "经费类型管理";

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FeeTypeSearch();
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
     * Creates a new FeeType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FeeType();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $result = $model->createOrUpdateOne(feeTypeController::MODULE_NAME);
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['index', 'id' => $model->feeTypeID]);
            }
        }
        return $this->render('create-update', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FeeType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $result = $model->createOrUpdateOne(FeeTypeController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index', 'id' => $model->feeTypeID]);
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
        $model = new FeeType();
        $moduleIdsArr = explode(",", $id);
        $result = $model->deleteBatch($moduleIdsArr, FeeTypeController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg'] . $errorStr);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Modules model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FeeType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FeeType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
