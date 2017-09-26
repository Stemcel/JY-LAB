<?php

use app\components\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Modules*/

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Module') : Yii::t('app', 'Update Module')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Module Manage'),
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
$modulecode = $form->field($model,'moduleCode')->textInput(['maxlength' => true]);

if($model->isNewRecord){
    $html = [
        $name,
        $modulecode,
        $remark,
        $sort
    ];
}else{
    $html = [
        $name,
        $modulecode,
        $remark,
        $sort
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();
