<?php

namespace app\modules\right\controllers;


use app\models\UserFunction;
use Yii;
use app\models\Functions;
use app\models\search\FunctionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `right` module
 */
class FunctionsController extends Controller
{
    const MODULE_NAME = "功能管理";
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FunctionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Functions model.
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
     * Creates a new Functions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Functions();

        if ($model->load(Yii::$app->request->post())) {
//            $model->functionCode = "001";
            $result = $model->createOrUpdateOne(FunctionsController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index', 'id' => $model->functionID]);
        } else {
            return $this->render('create-update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Functions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $result = $model->createOrUpdateOne(FunctionsController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index', 'id' => $model->functionID]);
        } else {
            return $this->render('create-update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Functions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $errorStr = "";
        $model = new Functions();
        $functionIdsArr =  explode(",",$id);
        foreach ($functionIdsArr as $functionID){
            $userFunctionSize = UserFunction::find()->where(['functionID' => $functionID])->count();
            // 如果功能在已配置权限，则无法删除
            if ($userFunctionSize){
                unset($functionIdsArr[array_search($functionID,$functionIdsArr)]);
                $errorStr .= ",".Functions::find()->where(['functionID' => $functionID])->asArray()->one()['name'];
            }
        }
        $result = $model->deleteBatch($functionIdsArr,FunctionsController::MODULE_NAME);
        if (!$errorStr == ""){
            $errorStr .= "删除失败，已分配权限";
        }
        Yii::$app->session->setFlash($result['type'], $result['msg'] .$errorStr);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Functions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Functions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Functions::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
