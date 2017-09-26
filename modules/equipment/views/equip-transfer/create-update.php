<?php

use app\components\ActiveForm;
use kartik\select2\Select2;
use app\models\Teacher;
use app\models\Laboratory;
use app\models\Room;
use app\models\Equipment;
use app\functions\CommonFunctions;

/* @var $this yii\web\View */
/* @var $model app\models\EquipmentTransfer */

$this->title = ($model->isNewRecord ? Yii::t('app','Create Transfer Equipment') : Yii::t('app','Update Transfer Equipment')) . '信息';
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app', 'Equipment Transfer Manage'),
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
//$brokerage = $form->field($model, 'brokerage')->widget(Select2::className(),[
//	'data'=>Teacher::queryAllTeacher(),
//	'options' => ['placeholder' => '请选择 ...'],
//]);
$brokerage = $form->field($model, 'brokerage')->textInput(['maxlength' => true,'value' => $mo,'readonly' => 'true', 'style' => 'background:#EED']);
$brokerageDate = $form->field($model, 'brokerageDate')->textInput(['value' => CommonFunctions::getCurrentDateTime(),'readonly' => 'true']);
//$oldLaboratoryID = $form->field($model, 'oldLaboratoryID')->widget(Select2::className(),[
//	'data'=>Laboratory::queryAllLaboratory(),
//	'options' => ['placeholder' => '请选择 ...'],
//]);
$newLaboratoryID = $form->field($model, 'newLaboratoryID')->widget(Select2::className(),[
	'data'=>Laboratory::queryAllLaboratory1(),
	'options' => ['placeholder' => '请选择 ...'],
]);
$newRoomID = $form->field($model, 'newRoomID')->widget(Select2::className(),[
	'data'=>Room::queryAllRoom(),
	'options' => ['placeholder' => '请选择 ...'],
]);
//$oldRoomID = $form->field($model, 'oldRoomID')->widget(Select2::className(),[
//	'data'=>Room::queryAllRoom(),
//	'options' => ['placeholder' => '请选择 ...'],
//]);
$description = $form->field($model, 'description')->textInput(['maxlength' => true]);
$remark = $form->field($model, 'remark')->textInput(['maxlength' => true]);

if($model->isNewRecord){
	$html = [
		$equipmentID,
		$brokerage,
		$brokerageDate,
//		$oldLaboratoryID,
		$newLaboratoryID,
		$newRoomID,
//		$oldRoomID,
		$description,
		$remark,
	];
}else{
	$html = [
		$equipmentID,
		$brokerage,
		$brokerageDate,
//		$oldLaboratoryID,
		$newLaboratoryID,
		$newRoomID,
//		$oldRoomID,
		$description,
		$remark,
	];
}

$html = array_merge($html, [
	$form->renderFooterButtons(),
]);

echo implode("\n",$html);
$form->end();
