<?php

use app\components\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\School */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create School') : Yii::t('app', 'Update School')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'School Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title
]);

$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);
$name = $form->field($model, 'name')->textInput(['maxlength' => true]);


if ($model->isNewRecord) {
    $html = [

        $name,
        $remark,
    ];
} else {
    $html = [
        $name,
        $remark,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n", $html);
$form->end();




