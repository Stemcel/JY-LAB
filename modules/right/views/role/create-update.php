<?php

use app\components\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Roles */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Role') : Yii::t('app', 'Update Role')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Role Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title
]);

$name = $form->field($model, 'name')->textInput(['maxlength' => true]);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);
$sort = $form->field($model, 'sort')->textInput(['maxlength' => true]);
$rolecode = $form->field($model,'roleCode')->textInput(['maxlength' => true]);

if($model->isNewRecord){
    $html = [
        $name,
        $rolecode,
        $remark,
        $sort
    ];
}else{
    $html = [
        $name,
        $rolecode,
        $remark,
        $sort
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();
