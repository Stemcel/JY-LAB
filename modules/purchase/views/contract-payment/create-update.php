<?php

use app\components\ActiveForm;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\Contract */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Contract Payment') : Yii::t('app', 'Update Contract Payment')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', '合同付款'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title
]);

$contractID = $form->field($model, 'contractID')->widget(Select2::className(),[
    'data'=>\app\models\Contract::queryCode(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$predictAmount = $form->field($model, 'predictAmount')->textInput(['maxlength' => true]);
$predictPaymentDate  = $form->field($model, 'predictPaymentDate')->widget(\kartik\widgets\DatePicker::classname(), [
    'options' => ['placeholder' => '请选择付款时间'],
    'removeButton' => false,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'

    ]
]);
$amount = $form->field($model, 'amount')->textInput();
$remark = $form->field($model, 'remark')->textarea();
$status = $form->field($model, 'status')->dropDownList(['OP' => '执行','CL' => '结束'],['prompt'=>' ']);
if($model->isNewRecord){
    $html = [

        $contractID,
       // $predictAmount,
        $predictPaymentDate,
        //$amount,
        $remark,



    ];
}else{
    $html = [
        $contractID,
        $predictAmount,
        $predictPaymentDate,
        $amount,
        $remark,
        $status,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();
