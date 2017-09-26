<?php

use app\components\ActiveFormContract;
use kartik\select2\Select2;
use app\models\Vendor;
use app\models\Purchase;
/* @var $this yii\web\View */
/* @var $model app\models\Contract */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Contract') : Yii::t('app', 'Update Contract')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Contract Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveFormContract::begin([
    'renderWrap' => true,
    'title' => $this->title
]);

$vendorID = $form->field($model, 'vendorID')->widget(Select2::className(),[
        'data'=>Vendor::queryAllVender(),
        'options' => ['placeholder' => '请选择 ...'],
    ]);
$code = $form->field($model, 'code')->textInput(['maxlength' => true]);
$title = $form->field($model, 'title')->widget(Select2::className(),[
    'data'=>Purchase::queryAlltitle(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$amount = $form->field($model, 'amount')->textInput(['maxlength' => true]);
$createDate = $form->field($model, 'createDate')->widget(\kartik\widgets\DatePicker::classname(), [
    'options' => ['placeholder' => '请选择签订时间'],
    'removeButton' => false,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'

    ]
]);
$deliveryTime = $form->field($model, 'deliveryTime')->widget(\kartik\widgets\DatePicker::classname(), [
    'options' => ['placeholder' => '请选择交货时间'],
    'removeButton' => false,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'

    ]
]);
$paymentType = $form->field($model,'paymentType')->textInput(['maxlength' => true]);
$contractFile = $form->field($model, 'contractFile')->fileInput();
$remark = $form->field($model,'remark')->textarea(['row'=>3]);
if($model->isNewRecord){
    $html = [
        $vendorID,
        $code,
        $title,
       // $amount,
        $createDate,
        $deliveryTime,
        $paymentType,
        $contractFile,
        $remark
    ];
}else{
    $html = [
        $vendorID,
        $code,
        $title,
       // $amount,
        $createDate,
        $deliveryTime,
        $paymentType,
        $contractFile,
        $remark
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();
