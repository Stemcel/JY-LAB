<?php

use app\components\ActiveForm;
use app\models\Campus;
use app\models\Department;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Campus */
/* @var $model app\models\Building */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Building') : Yii::t('app', 'Update Building')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Building Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title
]);

$code = $form->field($model, 'code')->textInput(['maxlength' => true]);
$campusID = $form->field($model, 'campusID')->widget(Select2::className(),[
    'data'=>Campus::queryAllCampus(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$name = $form->field($model, 'name')->textInput(['maxlength' => true]);
$departmentID = $form->field($model, 'departmentID')->widget(Select2::className(),[
    'data'=>Department::queryAllDepartment(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);
$description = $form->field($model, 'description')->textarea(['rows'=>3]);

if($model->isNewRecord){
    $html = [
        $code,
        $name,
        $campusID,
        $departmentID,
        $description,
        $remark,
    ];
}else{
    $html = [
        $code,
        $name,
        $campusID,
        $departmentID,
        $description,
        $remark,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();
