<?php

namespace app\modules\laboratory\controllers;

use app\functions\CommonFunctions;
use yii\web\Controller;
use app\models\Laboratory;
use app\models\LaboratoryRoom;
use Yii;
use app\models\search\MyLabSearch;
use yii\web\NotFoundHttpException;

/**
 * schoolFees controller for the `budget` module
 */
class LabController extends Controller
{
    const MODULE_NAME = "实验室审核";

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MyLabSearch();
        $dataProvider = $searchModel->naSearch(Yii::$app->request->queryParams);

        Laboratory::find()->where(['status' => 'OP'])->all();
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
        $statue = $aa->judgeStatue($id);
        if ($statue) {
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                    //自动修改状态
                    $dd = new Laboratory();
                    $name = 'approval';
                    $dd->atuoCreateStatus($name, $model->laboratoryID);
                $result = $model->createOrUpdateOne(myLabController::MODULE_NAME);
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                    return $this->redirect(['create-detail', 'id' => $model->laboratoryID]);
            } else {
                return $this->render('create-update', [
                    'model' => $model,
                ]);
            }
        } else {
            Yii::$app->session->setFlash('error', '已不是申请状态，请勿操作！');
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

    public function actionCreateDetail($id)
    {
        //var_dump($id);die;
        $model = new LaboratoryRoom();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->purchaseID =$id;
                $model->status = 'NA';
                $result = $model->createOrUpdateOne(MyLabController::MODULE_NAME_DETAIL);
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['index', 'id' => $model->purchaseID]);
            }
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}

