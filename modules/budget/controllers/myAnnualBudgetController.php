<?php

namespace app\modules\budget\controllers;

use app\functions\CommonFunctions;
use app\models\Fee;
use yii\web\Controller;
use app\models\AnnualBudget;
use Yii;
use app\models\search\MyAnnualBudgetSearch;
use yii\web\NotFoundHttpException;

/**
 * schoolFees controller for the `budget` module
 */
class MyAnnualBudgetController extends Controller
{
    const MODULE_NAME = "年度预算管理";

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MyAnnualBudgetSearch();
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
     * Creates a new Fee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AnnualBudget();
        $model->scenario = 'create';
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           /* $judge = new Fee();
            if ($judge->judgeAmount($model->amount, $model->feeID)) {*/
                $result = $model->createOrUpdateOne(feeTypeController::MODULE_NAME);

                //修改状态
                $dd = new Fee();
                $name = 'handlerDate';
                $dd->atuoCreateStatus($name, $model->annualBudgetID);
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['index', 'id' => $model->annualBudgetID]);
           /* } else {
                //获得剩余总预算
                $budget = new Fee();
                $money = $budget->getAmount($model->feeID);
                $name = $budget->atuoGetBudget($model->feeID);
                Yii::$app->session->setFlash('error', '申请未提交，申请金额请勿大于
                                       剩余总预算！<br> &nbsp&nbsp&nbsp提示：“'.$name.'”类预算剩余  '.$money.'元');
                return $this->render('create-update', [
                    'model' => $model,
                ]);
            }*/
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
        $aa = new AnnualBudget();
        $statue = $aa->judgeStatue($id);
        if ($statue) {
            $model = $this->findModel($id);
            $model->scenario = 'up';
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                //判断是否超 总剩余预算
                $feed = new Fee();
                $judge = $feed->judgeAmount($model->amount, $model->feeID);
                if ($judge) {
                    $result = $model->createOrUpdateOne(FeeTypeController::MODULE_NAME);

                    //修改状态
                    $dd = new Fee();
                    $name = 'handlerDate';
                    $dd->atuoCreateStatus($name, $model->annualBudgetID);

                    Yii::$app->session->setFlash($result['type'], $result['msg']);
                    return $this->redirect(['index', 'id' => $model->annualBudgetID]);
                } else {
                    Yii::$app->session->setFlash('error', '未批准成功，批准金额请勿大于剩余总预算！');
                    return $this->render('create-update', [
                        'model' => $model,
                    ]);
                }
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
        $aa = new AnnualBudget();
        $statue = $aa->judgeStatue($id);
        if ($statue) {
            $errorStr = "";
            $model = new AnnualBudget();
            $moduleIdsArr = explode(",", $id);
            $result = $model->deleteBatch($moduleIdsArr, FeeTypeController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg'] . $errorStr);
            return $this->redirect(['index']);
        } else {
            Yii::$app->session->setFlash('error', '已不是申请状态，请勿操作！');
            return $this->redirect(['index']);
        }

    }

    /**
     * Finds the Modules model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return annualBudget the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AnnualBudget::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

