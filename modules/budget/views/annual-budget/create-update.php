<?php

use app\components\ActiveForm;
use app\functions\CommonFunctions;
use app\models\AnnualBudget;
use app\models\Fee;
use app\models\Teacher;
use app\models\Department;
use app\widgets\SimpleDetailView;
use app\widgets\SimpleUEditor;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\AnnualBudget */
$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Annual Budget') : Yii::t('app', 'Update Annual Budget')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Annual Budget Manage'),
        'url' => ['index'],
    ],
    $this->title,
];
/** @var \app\models\User $user */
$user = Yii::$app->user->getIdentity();
$nickname = $user->name;
$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title,
    'id' => 'form1'
]);
$handlerName = new AnnualBudget();
$departmentID = $form->field($model, 'departmentID')->textInput(['maxlength' => true,'value'=>$handlerName->nameLa($model->departmentID), 'readonly' => 'true', 'style' => 'background:#EED']);
$years = $form->field($model, 'years')->textInput(['maxlength' => true, 'placeholder' => '例：2017', 'readonly' => 'true', 'style' => 'background:#EED']);
$feeID = $form->field($model, 'feeID')->textInput(['maxlength' => true,'value'=>$handlerName->nameFee($model->feeID), 'readonly' => 'true', 'style' => 'background:#EED']);
$amount = $form->field($model, 'amount')->textInput(['maxlength' => true, 'readonly' => 'true', 'style' => 'background:#EED']);
$useAmount = $form->field($model, 'useAmount')->textInput(['maxlength' => true, 'readonly' => 'true', 'style' => 'background:#EED']);
$approveAmount = $form->field($model, 'approveAmount')
    ->textInput(['maxlength' => true]);
/*$handlerName = $form->field($model, 'handlerName')->widget(Select2::className(), [
    'data' => Teacher::queryAllTeacher(),
    'options' => ['placeholder' => '请选择 ...'
    ],
]);*/

$handler = $form->field($model,'handlerName')->textInput(['maxlength' => true,'value'=>$handlerName->teacherName($model->handlerName),'readonly' => 'true', 'style' => 'background:#EED']);
$handlerDate = $form->field($model, 'handlerDate')->textInput(['value' => CommonFunctions::getCurrentDateTime(),'readonly' => 'true', 'style' => 'background:#EED']);
/*$approver = $form->field($model, 'approver')->widget(Select2::className(), [
    'data' => Teacher::queryAllTeacher(),
    'options' => ['placeholder' => '请选择 ...',
     'prompt' => ' '
    ]

]);*/
/*$approver = $form->field($model, 'approver')->textInput(['maxlength' => true,'value'=>$handlerName->teacherName($nickname),'readonly' => 'true', 'style' => 'background:#EED']);*/

$approveDate = $form->field($model, 'approveDate')->textInput(['value' => CommonFunctions::getCurrentDateTime(), 'readonly' => 'true', 'style' => 'background:#EED']);
$type = $form->field($model, 'type')->dropDownList(['0' => '正常', '1' => '追加'], ['prompt' => ' ', 'readonly' => 'true','style' => 'background:#EED']);
$remark = $form->field($model, 'remark')->textarea(['rows' => 3,'readonly' => 'true', 'style' => 'background:#EED']);
$purpose = $form->field($model, 'purpose')->widget(SimpleUEditor::className(), [
    'type' => SimpleUEditor::TYPE_TWO
]);
if ($model->isNewRecord == false){$model->status = 'OP';}
$status = $form->field($model,'status')->radioList(['OP'=>'批准','CL'=>'结束']);
$annualBudgetCode = $form->field($model,'annualBudgetCode')->textInput(['maxlength' => true]);
//获得剩余总预算
$budget = new Fee();
$money = $budget->getAmount($model->feeID);
$name = $budget->atuoGetBudget($model->feeID);

$tips = ("<font  style=\"padding-left: 17%;color:red;font-size: large \" >
             注：请注意\"$name\"剩余总预算为\" $money\"元!请勿超过此金额。</font>");

    $html = [
        $departmentID,
        $years,
        $feeID,
        $amount,
        //$handler,
        $handlerDate,
        $purpose,
        $type,
        $remark,
        $tips,
        $approveAmount,
        $annualBudgetCode,
        /*$approver,*/
        $approveDate,
        $status
    ];

$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n", $html);
$form->end();

?>



