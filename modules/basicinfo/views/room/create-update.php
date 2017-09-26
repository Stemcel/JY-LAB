<?php

use app\components\ActiveForm;
use app\models\Room;
use kartik\select2\Select2;
use yii\helpers\Html;
use app\models\Building;
use app\models\Department;
use app\models\Teacher;
/* @var $this yii\web\View */
/* @var $model app\models\Room */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Room') : Yii::t('app', 'Update Room')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Room Manage'),
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
$type = $form->field($model, 'type')->textInput(['maxlength' => true]);
$buildingID = $form->field($model, 'buildingID')->widget(Select2::className(),[
    'data'=>Building::queryAllBuilding(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$departmentID = $form->field($model, 'departmentID')->widget(Select2::className(),[
    'data'=>Department::queryAllDepartment(),
    'options' => ['placeholder' => '请选择 ...'],
]);$teacherID = $form->field($model, 'teacherID')->widget(Select2::className(),[
    'data'=>Teacher::queryAllTeacher(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$useArea = $form->field($model, 'useArea')->textInput(['maxlength' => true]);
$buildingArea = $form->field($model, 'buildingArea')->textInput(['maxlength' => true]);
$galleryful = $form->field($model, 'galleryful')->textInput(['maxlength' => true]);
$status = $form->field($model, 'status')->dropDownList(['Y' => '在用','N' => '未用',],['prompt'=>' ']);
$application = $form->field($model, 'application')->textInput(['maxlength' => true]);
$description = $form->field($model, 'description')->textarea(['rows'=>3]);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);
if($model->isNewRecord){
    $html = [
        $code,
        $name,
        $type,
        $buildingID,
        $departmentID,
        $teacherID,
        $useArea,
        $buildingArea,
        $galleryful,
        $status,
        $application,
        $description,
        $remark,
    ];
}else{
    $html = [
        $code,
        $name,
        $type,
        $buildingID,
        $departmentID,
        $teacherID,
        $useArea,
        $buildingArea,
        $galleryful,
        $status,
        $application,
        $description,
        $remark,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();

