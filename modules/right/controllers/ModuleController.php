<?php

namespace app\modules\right\controllers;

use app\models\Functions;
use Yii;
use app\models\Modules;
use app\models\search\ModuleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `right` module
 */
class ModuleController extends Controller
{
    const MODULE_NAME = "模块管理";
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ModuleSearch();
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
     * Creates a new Modules model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Modules();

        if ($model->load(Yii::$app->request->post())) {
//            $model->moduleCode = "001";
            $result = $model->createOrUpdateOne(ModuleController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index', 'id' => $model->moduleID]);
        } else {
            return $this->render('create-update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Modules model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $result = $model->createOrUpdateOne(ModuleController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index', 'id' => $model->moduleID]);
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
        $model = new Modules();
        $moduleIdsArr =  explode(",",$id);
        foreach ($moduleIdsArr as $moduleID){
            $ModulesFunctionSize = Functions::find()->where(['moduleID' => $moduleID])->count();
            // 如果模块下已存在功能，则无法删除
            if ($ModulesFunctionSize){
                unset($moduleIdsArr[array_search($moduleID,$moduleIdsArr)]);
                $errorStr .= ",".Modules::find()->where(['moduleID' => $moduleID])->asArray()->one()['name'];
            }
        }
        $result = $model->deleteBatch($moduleIdsArr,ModuleController::MODULE_NAME);
        if (!$errorStr == ""){
            $errorStr .= "删除失败，该模块下已存在功能";
        }
        Yii::$app->session->setFlash($result['type'], $result['msg'].$errorStr);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Modules model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Modules the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Modules::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
