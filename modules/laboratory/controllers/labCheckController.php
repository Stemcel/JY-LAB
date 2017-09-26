<?php

namespace app\modules\laboratory\controllers;

use app\functions\CommonFunctions;
use yii\web\Controller;
use app\models\Laboratory;
use app\models\Fee;
use Yii;
use app\models\search\MyLabSearch;
use yii\web\NotFoundHttpException;

/**
 * schoolFees controller for the `budget` module
 */
class LabCheckController extends Controller
{
    const MODULE_NAME = "实验室验收";

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MyLabSearch();
        $dataProvider = $searchModel->opSearch(Yii::$app->request->queryParams);
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


    public function actionUpdate($id)
    {
        //判断是否可以修改。
        $aa = new Laboratory();
        $statue = $aa->judgeApprove($id);
        if ($statue) {
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                //自动修改状态
                $dd = new Laboratory();
                $name = 'check';
                $dd->atuoCreateStatus($name, $model->laboratoryID);
                $result = $model->createOrUpdateOne(labCheckController::MODULE_NAME);
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['index', 'id' => $model->laboratoryID]);
            } else {
                return $this->render('create-update', [
                    'model' => $model,
                ]);
            }
        } else {
            Yii::$app->session->setFlash('error', '非批准状态，请勿操作！');
            return $this->redirect(['index']);
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
        $model = new Laboratory();
        $moduleIdsArr = explode(",",$id);
        $result = $model->deleteBatch($moduleIdsArr,myLabController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg'].$errorStr);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Modules model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return laboratory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Laboratory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

