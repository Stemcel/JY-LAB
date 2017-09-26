<?php

use app\components\ActiveForm;
use app\widgets\SimpleUEditor;
use app\models\Laboratory;
use app\models\Teacher;
use app\models\LaboratoryTeacher;
use app\functions\CommonFunctions;
use kartik\select2\Select2;

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Laboratory Teacher') : Yii::t('app', 'Update Laboratory Teacher')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'LaboratoryTeacher Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title
]);
$teacherID =$form->field($model, 'teacherID')->widget(Select2::className(),[
    'data'=>Teacher::queryAllTeachernn(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$laboratoryID =$form->field($model, 'laboratoryID')->widget(Select2::className(),[
    'data'=>Laboratory::queryAlllaboratory1(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$type = $form->field($model,'type')->dropDownList(['0' => '专职','1'=>'兼职'],['prompt' => ' ']);
$position = $form->field($model, 'position')->textarea(['rows'=>3]);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);

if($model->isNewRecord){
    $html = [
        $laboratoryID,
        $teacherID,
        $type,
        $position,
        $remark,
    ];
}else{
    $html = [
        $laboratoryID,
        $teacherID,
        $type,
        $position,
        $remark,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();

