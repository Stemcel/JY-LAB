<?php

namespace app\modules\purchase\controllers;

use app\models\Purchase;
use app\models\PurchaseDetail;
use app\models\search\MyPurchaseDetailSearch;
use app\models\search\MyPurchaseSearch;
use app\models\search\PurchaseDetailSearch;
use yii\web\Controller;
use app\functions\CommonFunctions;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class MyPurchaseController extends Controller
{
    const MODULE_NAME = "采购申请管理";
    const MODULE_NAME_DETAIL = "采购明细管理";

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MyPurchaseSearch();
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
     * Creates a new Purchase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Purchase();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $file = UploadedFile::getInstance($model, 'purchaseFile');
            if($file!= null){
                $path = date('Y-m-d', time());
                $file->saveAs('../uploads/purchaseFile/' . $path);
                $model->purchaseFile = $file->baseName . '.' . $file->extension;
            }


            $result = $model->createOrUpdateOne(MyPurchaseController::MODULE_NAME);
            //修改状态
            $dd = new Purchase();
            $name = 'SQ';
            $dd->atuoCreateStatus($name, $model->purchaseID);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['create-detail', 'id' => $model->purchaseID]);
        }
        return $this->render('create-update', [
            'model' => $model,
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
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $result = $model->createOrUpdateOne(MyPurchaseController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index', 'id' => $model->purchaseID]);
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
    /**
     * Creates a new PurchaseDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    //建立好 采购申请概况 新增明细
    public function actionCreateDetail($id)
    {
        //var_dump($id);die;
        $model = new PurchaseDetail();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->purchaseID = $id;
                $model->status = 'NA';
                $result = $model->createOrUpdateOne(MyPurchaseController::MODULE_NAME_DETAIL);
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['detail', 'id' => $model->purchaseID]);
            }
        }
        return $this->render('_detail-create-update', [
            'model' => $model,
        ]);
    }
    /**
     * Displays a single Modules model.
     * @param integer $id
     * @return mixed
     */

    //查看明细功能管理
    public function actionDetail($id)
    {
        //var_dump($id);die;
        $searchModel = new MyPurchaseDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('detail-index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Deletes an existing PurchaseDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    //在明细列表页 删除功能
    public function actionDeleteDetail($id)
    {
        $errorStr = "";
        $model = new PurchaseDetail();
        $moduleIdsArr = explode(",", $id);
        $result = $model->deleteBatch($moduleIdsArr, PurchaseDetailController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg'] . $errorStr);
        return $this->redirect(['index']);
    }

    /**
     * Updates an existing PurchaseDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateDetail($id)
    {
        $model = $this->findDetailModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $result = $model->createOrUpdateOne(MyPurchaseController::MODULE_NAME_DETAIL);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['detail', 'id' => $model->purchaseDetailID]);
        } else {
            return $this->render('_detail-create-update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the Modules model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PurchaseDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findDetailModel($id)
    {
        if (($model = PurchaseDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
