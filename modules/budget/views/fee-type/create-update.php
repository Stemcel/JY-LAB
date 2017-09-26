<?php

use app\components\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;
use app\models\Department;
use app\models\Teacher;
/* @var $this yii\web\View */
/* @var $model app\models\FeeType */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create FeeType') : Yii::t('app', 'Update FeeType')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'FeeType Manage'),
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
$departmentID = $form->field($model, 'departmentID')->widget(Select2::className(),[
    'data'=>Department::queryAllDepartment(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$teacherID = $form->field($model, 'teacherID')->widget(Select2::className(),[
    'data'=>Teacher::queryAllTeacher(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$description = $form->field($model, 'description')->textarea(['rows'=>3]);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);
if($model->isNewRecord){
    $html = [
        $code,
        $name,
        $departmentID,
        $teacherID,
        $description,
        $remark,
    ];
}else{
    $html = [
        $code,
        $name,
        $departmentID,
        $teacherID,
        $description,
        $remark,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();

