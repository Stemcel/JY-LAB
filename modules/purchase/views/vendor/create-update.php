<?php

use app\components\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vendor */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Vendor') : Yii::t('app', 'Update Vendor')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Vendor Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title
]);

$name = $form->field($model, 'name')->textInput(['maxlength' => true]);
$code = $form->field($model, 'code')->textInput(['maxlength' => true]);
$password = $form->field($model, 'password')->textInput(['maxlength' => true]);
$contacts = $form->field($model, 'contacts')->textInput(['maxlength' => true]);
$email = $form->field($model, 'email')->textInput(['maxlength' => true]);
$phone = $form->field($model, 'phone')->textInput(['maxlength' => true]);
$fax = $form->field($model, 'fax')->textInput(['maxlength' => true]);
$depositBank = $form->field($model, 'depositBank')->textInput(['maxlength' => true]);
$bankNumber = $form->field($model, 'bankNumber')->textInput(['maxlength' => true]);
$licenseNumber = $form->field($model, 'licenseNumber')->textInput(['maxlength' => true]);
$website = $form->field($model, 'website')->textInput(['maxlength' => true]);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);
if($model->isNewRecord){
    $html = [
        $code,
        $name,
        $password,
        $contacts,
        $phone,
        $email,
        $fax,
        $depositBank,
        $bankNumber,
        $licenseNumber,
        $website,
        $remark,
    ];
}else{
    $html = [
        $code,
        $name,
        $password,
        $contacts,
        $phone,
        $email,
        $fax,
        $depositBank,
        $bankNumber,
        $licenseNumber,
        $website,
        $remark,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();

