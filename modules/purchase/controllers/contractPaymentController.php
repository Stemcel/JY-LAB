<?php

namespace app\modules\purchase\controllers;

use app\models\Contract;
use app\models\ContractDetail;
use app\models\ContractPayment;

use app\models\ContractPaymentDetail;
use app\models\search\ContractPaymentDetailSearch;
use app\models\search\ContractPaymentSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ContractPaymentController extends Controller
{
    const MODULE_NAME = "合同付款管理";
    const MODULE_NAME_DETAIL = "付款详细管理";
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ContractPaymentSearch();
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
        $searchModel = new ContractPaymentDetailSearch();
        $searchModel->contractPaymentID = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PurchasesDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ContractPayment();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {

                $dd = Contract::find()->where(['contractID'=>$model->contractID])->asArray()->one();
                $qq = $dd['amount'];
                $result = $model->createOrUpdateOne(ContractPaymentController::MODULE_NAME);
                //修改状态
                $status = new ContractPayment();
                $name = 'ZX';
                $status->atuoCreateStatus($name, $model->contractPaymentID);
                //获取待付款金额
                $status->atuoCreateAmount($qq,$model->contractPaymentID);
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['index', 'id' => $model->contractPaymentID]);
            }
        }
        return $this->render('create-update', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing contractDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $result = $model->createOrUpdateOne(ContractPaymentController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            $sta = ContractPayment::findOne($id);
            //判断是否全部付完
            if($sta->amount == $sta->predictAmount){
                $status = new ContractPayment();
                $name = 'JS';
                $status->atuoCreateStatus($name, $model->contractPaymentID);
            }elseif ($sta->amount < $sta->predictAmount && $sta->status == "CL"){
                $amount = new ContractPayment();
                $amount->atuoUpdateAmount($sta->amount,$sta->predictAmount,$model->contractID);
            }


            return $this->redirect(['index', 'id' => $model->contractPaymentID]);
        } else {
            return $this->render('create-update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PurchaseDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $errorStr = "";
        $model = new ContractPayment();
        $moduleIdsArr = explode(",", $id);
        $result = $model->deleteBatch($moduleIdsArr, ContractPaymentController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg'] . $errorStr);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Modules model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return contractPayment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ContractPayment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreateDetail($id)
    {
        $model = new ContractPaymentDetail();
        $sta = $model->judgeStatuer($id);
        if($sta){
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->contractPaymentID = $id;
                $result = $model->createOrUpdateOne(ContractPaymentController::MODULE_NAME_DETAIL);
                //修改已付款
               $model->autoAmount($model->contractPaymentID,$model->amount);


                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['view', 'id' => $model->contractPaymentID]);
            }
        }
        return $this->render('view-create-update', [
            'model' => $model,
        ]);}
        else{
            Yii::$app->session->setFlash('error', '此付款已经结束，请勿操作！');
            return $this->redirect(['index']);
        }
    }

    public function actionDeleteDetail($id)
    {

        $errorStr = "";
        $model = new ContractPaymentDetail();
        $model->reduceAmount($id);
        $moduleIdsArr = explode(",", $id);
        $result = $model->deleteBatch($moduleIdsArr, ContractPaymentController::MODULE_NAME_DETAIL);
        Yii::$app->session->setFlash($result['type'], $result['msg'] . $errorStr);
        return $this->redirect(['index']);
    }




}
