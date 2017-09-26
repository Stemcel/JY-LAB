<?php

use app\components\ActiveForm;
use app\models\Campus;
use app\models\Department;
use app\widgets\SimpleUEditor;
use app\models\Laboratory;
use app\functions\CommonFunctions;
use app\models\Teacher;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Campus */
/* @var $model app\models\Building */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Achievement') : Yii::t('app', 'Update Achievement')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Achievement Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title
]);

$name = $form->field($model, 'name')->widget(Select2::className(),[
    'data'=>Teacher::queryAllTeacher(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$achieveDate = $form->field($model, 'achieveDate')->textInput(['value' => CommonFunctions::getCurrentDateTime(),'readonly' => 'true']);
$laboratoryID =$form->field($model, 'laboratoryID')->widget(Select2::className(),[
    'data'=>Laboratory::queryAlllaboratory1(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$type = $form->field($model, 'type')->textInput(['maxlength' => true]);
$level = $form->field($model, 'level')->textInput(['maxlength' => true]);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);

if($model->isNewRecord){
    $html = [
        $name,
        $achieveDate,
        $laboratoryID,
        $type,
        $level,
        $remark,
    ];
}else{
    $html = [
        $name,
        $achieveDate,
        $laboratoryID,
        $type,
        $level,
        $remark,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();
