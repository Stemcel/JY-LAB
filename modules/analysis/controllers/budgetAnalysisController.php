<?php

namespace app\modules\analysis\controllers;

use Yii;
use yii\web\Controller;
use app\models\AnnualBudget;
use yii\helpers\ArrayHelper;
class BudgetAnalysisController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $year = $request->post("year");
            $all = AnnualBudget::find()->where(['years' => $year])->joinWith("department")->asArray()->all();
            $alls = AnnualBudget::find()->joinWith("department")->asArray()->all();
            $data = array_column($alls, 'years');
            //使用金额二维转一维
            //$approveAmount = array_column($annualBudget, 'approveAmount');
            //审批金额
            $approveAmount = array_column($all, 'approveAmount');
            //使用金额
            $useAmount = array_column($all, 'useAmount');
            //获取部门信息
            $budget = ArrayHelper::getColumn($all, 'department');
            foreach ($budget as $key => $value) {
                $name[] = $value['name'];
            };
            return $this->renderPartial('index', [
              'data' => $data,
                'approveAmount' => $approveAmount,
                'useAmount' => $useAmount,
                'budget' => $budget,
                'name' => $name,
            ]);

        } else {
            $all = AnnualBudget::find()->joinWith("department")->asArray()->all();
            $data = array_column($all, 'years');
            //审批金额
            $approveAmount = array_column($all, 'approveAmount');
            //使用金额
            $useAmount = array_column($all, 'useAmount');
            //获取部门信息
            $budget = ArrayHelper::getColumn($all, 'department');
            foreach ($budget as $key => $value) {
                $name[] = $value['name'];
            };
            return $this->render('index', [
                'data' => $data,
                'approveAmount' => $approveAmount,
                'useAmount' => $useAmount,
                'budget' => $budget,
                'name' => $name
            ]);
        }
    }

}
