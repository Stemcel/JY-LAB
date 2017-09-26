<?php

use app\components\ActiveForm;
use app\models\Teacher;
use kartik\select2\Select2;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create User') : Yii::t('app', 'Update User')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'User Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title,
]);

$name = $form->field($model, 'name')->widget(Select2::className(),[
    'data'=>Teacher::queryAllTeacher(),
    'options' => ['placeholder' => '请选择 ...'],
]);;
$password = $form->field($model, 'password')->passwordInput(['maxlength' => true]);
$usercode = $form->field($model,'userCode')->textInput(['maxlength' => true]);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);

if($model->isNewRecord){
    $html = [
        $usercode,
        $password,
        $name,
        $remark
    ];
}else{
    $html = [
        $usercode,
        $password,
        $name,
        $remark
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();
