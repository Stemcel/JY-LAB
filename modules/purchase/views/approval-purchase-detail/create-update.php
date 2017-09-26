<?php

use app\components\ActiveForm;
use app\functions\CommonFunctions;
use app\models\AnnualBudget;
use app\models\Purchase;
use app\models\PurchaseCatalogue;
use app\widgets\SimpleUEditor;
use kartik\select2\Select2;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseDetail */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create PurchaseDetail') : Yii::t('app', 'Update PurchaseDetail')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'PurchaseDetail Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title
]);

$purchaseID = $form->field($model, 'purchaseID')->widget(Select2::className(),[
    'data'=>Purchase::queryAllpurchase(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$annualBudgetID = $form->field($model, 'annualBudgetID')->widget(Select2::className(),[
    'data'=>AnnualBudget::queryAllAnnualBudget(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$purchaseCatalogueID = $form->field($model, 'purchaseCatalogueID')->widget(Select2::className(),[
    'data'=>PurchaseCatalogue::queryAllpurchaseCatalogue(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$description = $form->field($model, 'description')->widget(SimpleUEditor::className(), [
    'type' => SimpleUEditor::TYPE_TWO
]);
$specification = $form->field($model, 'specification')->widget(SimpleUEditor::className(), [
    'type' => SimpleUEditor::TYPE_TWO
]);
$quantity = $form->field($model,'quantity')->textInput(['maxlength' => true]);
$unit = $form->field($model,'unit')->textInput(['maxlength' => true]);
$price = $form->field($model,'price')->textInput(['maxlength' => true]);
$amount = $form->field($model,'amount')->textInput(['maxlength' => true]);

$remark = $form->field($model,'remark')->textarea(['row'=>3]);

if($model->isNewRecord){
    $html = [
        $purchaseID,
        $annualBudgetID,
        $purchaseCatalogueID,
        $description,
        $specification,
        $quantity,
        $unit,
        $price,
        $amount,
        $remark

    ];
}else{
    $html = [
        $annualBudgetID,
        $purchaseCatalogueID,
        $description,
        $specification,
        $quantity,
        $unit,
        $price,
        $amount,
        $remark

    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();

