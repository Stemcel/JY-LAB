<?php

use app\components\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $model app\models\Department */


$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Department') : Yii::t('app', 'Update Department')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Department Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title,

]);
if ($model->isNewRecord){$model->isLaboratory = 'Y'; }
$isLaboratory = $form->field($model, 'isLaboratory')->radioList(['Y'=>'是','N'=>'不是']);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);
$name = $form->field($model, 'name')->textInput(['maxlength' => true]);
$code = $form->field($model, 'code')->textInput(['maxlength' => true]);
$parentDepartment = $form->field($model, 'parentDepartmentID')->widget(Select2::className(),[
    'data'=>Department::queryAllDepartment(),
    'options' => ['placeholder' => '请选择 ...'],
]);

if($model->isNewRecord){
    $html = [
        $code,
        $name,
        $parentDepartment,
        $isLaboratory,
        $remark,

    ];
}else{
    $html = [
        $code,
        $name,
        $parentDepartment,
        $isLaboratory,
        $remark,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();
