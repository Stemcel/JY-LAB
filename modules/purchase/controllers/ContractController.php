<?php

namespace app\modules\purchase\controllers;

use app\models\AnnualBudget;
use app\models\Contract;
use app\models\ContractDetail;
use app\models\search\ContractDetailSearch;
use Yii;
use app\models\search\ContractSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * Default controller for the `purchase` module
 */
class ContractController extends Controller
{
    const MODULE_NAME = "合同管理";
    const MODULE_NAME_DETAIL = "合同详细管理";
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ContractSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    //查看合同明细
    public function actionView($id)
    {
        //判断明细状态（都结束合同自动修改至结束状态）
        $all = ContractDetail::find()->where(['contractID'=>$id])->asArray()->all();
        $sta = array_column($all, 'status');

        $OP = in_array("OP",$sta);
        $DE = in_array("DE",$sta);
        $CL = in_array("CL",$sta);
        $NCL = in_array("NCL",$sta);

            if ((!($OP || $DE))&&($CL || $NCL)) {
                $status = new Contract();
                $name = 'JS';
                $status->atuoCreateStatus($name, $id);
            }

        $searchModel = new ContractDetailSearch();
        $searchModel->contractID = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('conDetail', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Contract model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Contract();
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){
                //上传文件
                $file = UploadedFile::getInstance($model, 'contractFile');
                if($file!= null){
                    $path = date('Y-m-d', time());
                    $file->saveAs('../uploads/contractFile/' . $path);
                    $model->contractFile = $file->baseName . '.' . $file->extension;
                }

                $result = $model->createOrUpdateOne(ContractController::MODULE_NAME);
                //修改状态
                $status = new Contract();
                $name = 'ZX';
                $status->atuoCreateStatus($name, $model->contractID);
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['create-detail', 'id' => $model->contractID]);
            }
        }
        return $this->render('create-update', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $result = $model->createOrUpdateOne(ContractController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index', 'id' => $model->contractID]);
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
        $model = new Contract();
        $moduleIdsArr =  explode(",",$id);
        $result = $model->deleteBatch($moduleIdsArr,ContractController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg'].$errorStr);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Modules model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contract the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contract::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
//添加合同详细
    public function actionCreateDetail($id)
    {

        $model = new ContractDetail();
        $sta = $model->judgeStatuer($id);
        if($sta){
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){
                    $model->contractID = $id;
                    $result = $model->createOrUpdateOne(ContractController::MODULE_NAME_DETAIL);
                   //修改状态
                   $status = new ContractDetail();
                    $name = 'QY';
                   $status->atuoCreateStatusr($name, $model->contractDetailID);
                    //判断、修改使用金额
                    $annual = new AnnualBudget();
                    //判断是否超出
                    $sta = $annual->annualSta($model->contractDetailID);
                    if($sta){
                        Yii::$app->session->setFlash($result['type'], $result['msg']);
                    //修改金额
                    $annual->updateAnnual($model->contractDetailID);

                }else{
                    Yii::$app->session->setFlash('您已经超过总预算！');
                    $annual->updateAnnual($model->contractDetailID);

                }

                return $this->redirect(['view', 'id' => $model->contractID]);
            }
        }
        return $this->render('conDetail-create-update', [
            'model' => $model,
        ]);}
        else {
            Yii::$app->session->setFlash('error', '此合同已经结束，请勿操作！');
            return $this->redirect(['index']);
        }
    }
//更新明细
    public function actionUpdateDetail($id)
    {
        $qq = new ContractDetail();
        $sta = $qq->judgeStatue($id);
        if($sta){
        $model = ContractDetail::findIdentity($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->contractDetailID = $id;
            $con = new Contract();
            if($model->status == 'CL'){
                $con->apdatecon($model->contractID,$model->amount);
            }elseif($model->status == 'NCL'){
                //返还金额
                $annual = new AnnualBudget();
                $annual->updaterAnnual($model->annualBudgetID,$model->amount);
            }

            $result = $model->createOrUpdateOne(ContractController::MODULE_NAME_DETAIL);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['view', 'id' => $model->contractID]);
        } else {
            return $this->render('conDetail-create-update', [
                'model' => $model,
            ]);
        }
        }else{
            Yii::$app->session->setFlash('error', '此合同已经结束，请勿操作！');
            return $this->redirect(['index']);

        }

    }
//删除明细
    public function actionDeleteDetail($id)
    {

        $errorStr = "";
        $model = new ContractDetail();
        $moduleIdsArr =  explode(",",$id);
        $result = $model->deleteBatch($moduleIdsArr,ContractDetailController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg'].$errorStr);
        return $this->redirect(['index']);
    }

//下载附件
    public function actionDload($id){

        $fileName = "2017-09-18";
        if (file_exists('../uploads/contractFile/' . $fileName)) {
            return Yii::$app->response->sendFile('../uploads/contractFile/' . $fileName);
        } else {
            return "<h1>文件不存在</h1>";
        }
    }
}
