<?php

namespace app\modules\purchase\controllers;

use app\models\Purchase;
use app\models\search\PurchaseSearch;
use Yii;
use yii\web\NotFoundHttpException;

class PurchaseController extends \yii\web\Controller
{
    const MODULE_NAME = "采购申请管理";
    const MODULE_NAME_DETAIL = "采购明细管理";

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PurchaseSearch();
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
     * Updates an existing Purchase model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->status = 'PR';
        $result = $model->createOrUpdateOne(MyPurchaseController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg']);
        return $this->redirect(['index', 'id' => $model->purchaseID]);
        /*if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $result = $model->createOrUpdateOne(MyPurchaseController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index', 'id' => $model->purchaseID]);
        } else {
            return $this->render('create-update', [
                'model' => $model,
            ]);
        }*/

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
        $model = new Purchase();
        $moduleIdsArr = explode(",", $id);
        $result = $model->deleteBatch($moduleIdsArr, MyPurchaseController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg'] . $errorStr);
        return $this->redirect(['index']);

    }

    /**
     * Finds the Modules model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Purchase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Purchase::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
