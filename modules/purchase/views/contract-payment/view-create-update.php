<?php

use app\components\ActiveForm;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\Contract */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Contract Payment Detail') : Yii::t('app', 'Update Contract Payment Detail')) . '信息';
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

$paymentDate = $form->field($model, 'paymentDate')->widget(\kartik\widgets\DatePicker::classname(), [
    'options' => ['placeholder' => '请选择付款时间'],
    'removeButton' => false,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'

    ]
]);

$amount = $form->field($model, 'amount')->textInput();
$paymentTeacherID = $form->field($model,'paymentTeacherID')->widget(Select2::className(),[
    'data'=>\app\models\Teacher::queryAllTeacher(),
    'options' => ['placeholder' => '请选择 ...'],
]);
if($model->isNewRecord){
    $html = [

        $paymentDate,
        $amount,
        $paymentTeacherID

    ];
}else{
    $html = [
        $paymentDate,
        $amount,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();
