<?php

use app\components\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Campus */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Campus') : Yii::t('app', 'Update Campus')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Campus Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title
]);

$description = $form->field($model, 'description')->textarea(['rows'=>3]);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);
$name = $form->field($model, 'name')->textInput(['maxlength' => true]);
$code = $form->field($model, 'code')->textInput(['maxlength' => true]);


if($model->isNewRecord){
    $html = [
        $code,
        $name,
        $description,
        $remark,

    ];
}else{
    $html = [
        $code,
        $name,
        $description,
        $remark,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();
