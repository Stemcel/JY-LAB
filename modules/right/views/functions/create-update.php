<?php

use app\components\ActiveForm;
use app\models\Modules;

/* @var $this yii\web\View */
/* @var $model app\models\Functions */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Function') : Yii::t('app', 'Update Function')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Function Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title
]);

$name = $form->field($model, 'name')->textInput(['maxlength' => true]);
$icon = $form->field($model, 'icon')->textInput(['maxlength' => true]);
$url = $form->field($model, 'url')->textInput(['maxlength' => true]);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);
$sort = $form->field($model, 'sort')->textInput(['maxlength' => true]);
$functioncode = $form->field($model,'functionCode')->textInput(['maxlength' => true]);
$module = $form->field($model, 'moduleID')->dropDownList(Modules::queryAllModules(),['prompt'=>' ']);

if($model->isNewRecord){
    $html = [
        $name,
        $functioncode,
        $icon,
        $url,
        $module,
        $sort,
        $remark,

    ];
}else{
    $html = [
        $name,
        $functioncode,
        $icon,
        $url,
        $module,
        $sort,
        $remark,

    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();
