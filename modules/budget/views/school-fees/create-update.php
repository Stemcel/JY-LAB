<?php

use app\components\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;
use app\models\FeeType;
use app\models\Teacher;
use kartik\datetime\DateTimePicker;
use app\functions\CommonFunctions;

/* @var $this yii\web\View */
/* @var $model app\models\Fee */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Fee') : Yii::t('app', 'Update Fee')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Fee Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title
]);

$name = $form->field($model, 'name')->textInput(['maxlength' => true]);
$amount = $form->field($model, 'amount')->textInput(['maxlength' => true]);
$userAmount = $form->field($model, 'userAmount')->textInput(['maxlength' => true]);
$feeTypeID = $form->field($model, 'feeTypeID')->widget(Select2::className(),[
    'data'=>FeeType::queryAllFeeType(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$teacherID = $form->field($model, 'teacherID')->widget(Select2::className(),[
    'data'=>Teacher::queryAllTeacher(),
    'options' => ['placeholder' => '请选择 ...',
        //'prompt' =>
    ],
]);
$createDate = $form->field($model, 'createDate')->textInput(['value' => CommonFunctions::getCurrentDateTime(),'readonly' => 'true']);
$description = $form->field($model, 'description')->textarea(['rows'=>3]);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);
if($model->isNewRecord){
    $html = [
        $name,
        $feeTypeID,
        $amount,
        $teacherID,
        $createDate,
        $description,
        $remark,
    ];
}else{
    $html = [
        $name,
        $feeTypeID,
        $amount,
        $teacherID,
        $createDate,
        $description,
        $remark,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();

