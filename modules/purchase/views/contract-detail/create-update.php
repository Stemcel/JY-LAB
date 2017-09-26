<?php

use app\components\ActiveForm;
use kartik\select2\Select2;
use app\models\Contract;

/* @var $this yii\web\View */
/* @var $model app\models\Contract */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Contract明细') : Yii::t('app', 'Update Contract明细')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Contract Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title
]);
$contractID = $form->field($model, 'contractID')->widget(Select2::className(),[
    'data'=>Contract::queryAllcontract(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$purchaseDetailID = $form->field($model, 'purchaseDetailID')->textInput(['maxlength' => true]);
$annualBudgetID = $form->field($model, 'annualBudgetID')->widget(Select2::className(),[
    'data'=>\app\models\AnnualBudget::queryAllAnnualBudget(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$purchaseCatalogueID = $form->field($model, 'purchaseCatalogueID')->textInput(['maxlength' => true]);
$description = $form->field($model, 'description')->textInput(['maxlength' => true]);
$specification = $form->field($model, 'specification')->textInput(['maxlength' => true]);
$quantity = $form->field($model, 'quantity')->textInput(['maxlength' => true]);
$unit = $form->field($model, 'unit')->textInput(['maxlength' => true]);
$price = $form->field($model, 'price')->textInput(['maxlength' => true]);
$amount = $form->field($model, 'amount')->textInput(['maxlength' => true]);
$deliveryTime = $form->field($model, 'deliveryTime')->textInput(['maxlength' => true]);
$deliveryTeacher = $form->field($model, 'deliveryTeacher')->textInput(['maxlength' => true]);
$checkTime = $form->field($model, 'checkTime')->textInput(['maxlength' => true]);
$checkTeacher = $form->field($model, 'checkTeacher')->textInput(['maxlength' => true]);
$closeTime = $form->field($model, 'closeTime')->textInput(['maxlength' => true]);
$closeTeacher = $form->field($model, 'closeTeacher')->textInput(['maxlength' => true]);


if($model->isNewRecord){
    $html = [
        $contractID,
        $purchaseDetailID,
        $annualBudgetID,
        $purchaseCatalogueID,
        $description,
        $specification,
        $quantity,
        $unit,
        $price,
        $amount,
        $deliveryTime,
        $deliveryTeacher,
        $checkTime,
        $checkTeacher,
        $closeTime,
        $closeTeacher,
    ];
}else{
    $html = [
        $contractID,
        $purchaseDetailID,
        $annualBudgetID,
        $purchaseCatalogueID,
        $description,
        $specification,
        $quantity,
        $unit,
        $price,
        $amount,
        $deliveryTime,
        $deliveryTeacher,
        $checkTime,
        $checkTeacher,
        $closeTime,
        $closeTeacher,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();
