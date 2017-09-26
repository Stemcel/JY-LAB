<?php

use app\components\ActiveForm;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\Contract */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Contract Detail') : Yii::t('app', 'Update Contract Detail')) . '信息';
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
$purchaseDetailID = $form->field($model, 'purchaseDetailID')->widget(Select2::className(),[
    'data'=>\app\models\PurchaseDetail::queryAllpurchaseDetail(),
    'options' => ['placeholder' => '请选择 ...'],

]);
$annualBudgetID = $form->field($model, 'annualBudgetID')->widget(Select2::className(),[
    'data'=>\app\models\AnnualBudget::queryAllAnnualBudget(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$purchaseCatalogueID = $form->field($model, 'purchaseCatalogueID')->widget(Select2::className(),[
    'data'=>\app\models\PurchaseCatalogue::queryAllPurchaseCatalogue(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$description = $form->field($model, 'description')->widget(Select2::className(),[
    'data'=>\app\models\PurchaseCatalogue::queryAllPurchaseDescription(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$specification = $form->field($model, 'specification')->widget(Select2::className(),([
    'name' => 'color_3',
    'value' => 'red', // initial value
    'data' => \app\models\PurchaseDetail::queryAllSpecification(),
    'options' => ['placeholder' => '请选择 ...'],
    'pluginOptions' => [
        'tags' => true,
        'tokenSeparators' => [',', ' '],
        'maximumInputLength' => 10
    ],
]));
$quantity = $form->field($model, 'quantity')->widget(Select2::className(),([
    'name' => 'color_3',
    'value' => 'red', // initial value
    'data' => \app\models\PurchaseDetail::queryAllQuantity(),
    'options' => ['placeholder' => '请选择 ...'],
    'pluginOptions' => [
        'tags' => true,
        'tokenSeparators' => [',', ' '],
        'maximumInputLength' => 10
    ],
]));
$unit = $form->field($model, 'unit')->widget(Select2::className(),([
    'name' => 'color_3',
    'value' => 'red', // initial value
    'data' => \app\models\PurchaseDetail::queryAllUnit(),
    'options' => ['placeholder' => '请选择 ...'],
    'pluginOptions' => [
        'tags' => true,
        'tokenSeparators' => [',', ' '],
        'maximumInputLength' => 10
    ],
]));
$price = $form->field($model, 'price')->widget(Select2::className(),([
    'name' => 'color_3',
    'value' => 'red', // initial value
    'data' => \app\models\PurchaseDetail::queryAllPrice(),
    'options' => ['placeholder' => '请选择 ...'],
    'pluginOptions' => [
        'tags' => true,
        'tokenSeparators' => [',', ' '],
        'maximumInputLength' => 10
    ],
]));
$amount = $form->field($model, 'amount')->textInput(['maxlength' => true]);
$deliveryTime  = $form->field($model, 'deliveryTime')->widget(\kartik\widgets\DatePicker::classname(), [
    'options' => ['placeholder' => '请选择交货时间'],
    'removeButton' => false,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'

    ]
]);
$deliveryTeacher = $form->field($model, 'deliveryTeacher')->widget(Select2::className(),[
    'data'=>\app\models\Teacher::queryAllTeacher(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$checkTime = $form->field($model, 'checkTime')->widget(\kartik\widgets\DatePicker::classname(), [
    'options' => ['placeholder' => '请选择验收时间'],
    'removeButton' => false,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'

    ]
]);
$checkTeacher = $form->field($model, 'checkTeacher')->widget(Select2::className(),[
    'data'=>\app\models\Teacher::queryAllTeacher(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$closeTime = $form->field($model, 'closeTime')->widget(\kartik\widgets\DatePicker::classname(), [
    'options' => ['placeholder' => '请选择建账时间'],
    'removeButton' => false,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'

    ]
]);
$closeTeacher = $form->field($model, 'closeTeacher')->textInput(['value' => \app\models\ContractDetail::getName(),'readonly' => 'true']);
$status = $form->field($model, 'status')->dropDownList(['OP' => '签约','DE' => '交货','CL' => '验收通过','NCL'=>'验收未通过'],['prompt'=>' ']);
$remark = $form->field($model,'remark')->textarea(['row'=>3]);
if($model->isNewRecord){
    $html = [

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
        $remark
    ];
}else{
    $html = [
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
        $status,
        $remark
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();
