<?php

use app\components\ActiveForm;
use kartik\select2\Select2;
use app\models\Teacher;
use app\functions\CommonFunctions;
use app\models\Equipment;
use app\models\EquipmentMaintain;
/* @var $this yii\web\View */
/* @var $model app\models\EquipmentMaintain */

$this->title = ($model->isNewRecord ? Yii::t('app','Create Apply Equipment') : Yii::t('app','Update Apply Equipment')) . '信息';
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app','Equipment Apply Manage'),
		'url' => ['index'],
	],
	$this->title,
];

$form = ActiveForm::begin([
	'renderWrap' => true,
	'title' => $this->title
]);
$mo = Teacher::queryAllTeachers();
$equipmentID = $form->field($model, 'equipmentID')->widget(Select2::className(),[
	'data'=>Equipment::queryAllEquipmentID(),
	'options' => ['placeholder' => '请选择 ...'],
]);
//$applier = $form->field($model, 'applier')->widget(Select2::className(),[
//	'data'=>Teacher::queryAllTeacher(),
//	'options' => ['placeholder' => '请选择 ...'],
//	'value'=>Teacher::queryAllTeachers(),
//]);
$applier = $form->field($model, 'applier')->textInput(['maxlength' => true,'value' => $mo,'readonly' => 'true', 'style' => 'background:#EED']);
//$applier = $form->field($model, 'applier')->textInput(['maxlength' => true,'value'=>$fx->teacherName($nickname),'readonly' => 'true', 'style' => 'background:#EED']);
$applyDate = $form->field($model, 'applyDate')->textInput(['value' => CommonFunctions::getCurrentDateTime(),'readonly' => 'true']);
$description = $form->field($model, 'description')->textInput(['maxlength' => true]);
//$checker = $form->field($model, 'checker')->widget(Select2::className(),[
//	'data'=>Teacher::queryAllTeacher(),
//	'options' => ['placeholder' => '请选择 ...'],
//]);
//$checkDate = $form->field($model, 'checkDate')->textInput(['maxlength' => true]);
//$status = $form->field($model, 'status')->dropDownList(['OP' => '维修','CL'=>'验收'],['prompt' => ' ']);
$remark = $form->field($model, 'remark')->textInput(['maxlength' => true]);

if($model->isNewRecord){
	$html = [
		$equipmentID,
		$applier,
		$applyDate,
		$description,
//		$checker,
//		$checkDate,
//		$status,
		$remark,
	];
}else{
	$html = [
		$equipmentID,
		$applier,
		$applyDate,
		$description,
//      $checker,
//		$checkDate,
//		$status,
		$remark,
	];
}

$html = array_merge($html, [
	$form->renderFooterButtons(),
]);

echo implode("\n",$html);
$form->end();
