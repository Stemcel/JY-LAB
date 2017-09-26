<?php

use app\components\ActiveForm;
use kartik\select2\Select2;
use app\models\teacher;
use app\functions\CommonFunctions;
use app\models\Equipment;

/* @var $this yii\web\View */
/* @var $model app\models\EquipmentScrap */

$this->title = ($model->isNewRecord ? Yii::t('app','Create Scrap Equipment') : Yii::t('app','Update Scrap Equipment')) . '信息';
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app','Equipment Scrap Manage'),
		'url' => ['index']
	],
	$this->title,
];

$form = ActiveForm::begin([
	'renderWrap' => true,
	'title' => $this->title
]);

//$mo = Teacher::queryAllTeachers();
//print_r($mo);die;
$equipmentID = $form->field($model, 'equipmentID')->widget(Select2::className(),[
	'data'=>Equipment::queryAllEquipmentID(),
	'options' => ['placeholder' => '请选择 ...'],
]);
//$brokerage = $form->field($model, 'brokerage')->widget(Select2::className(),[
//	'data'=>Teacher::queryAllTeacher(),
//	'options' => ['placeholder' => '请选择 ...'],
//]);
$brokerage = $form->field($model, 'brokerage')->textInput(['maxlength' => true,'value' => Teacher::queryAllTeachers(),'readonly' => 'true', 'style' => 'background:#EED']);
$brokerageDate = $form->field($model, 'brokerageDate')->textInput(['value' => CommonFunctions::getCurrentDateTime(),'readonly' => 'true']);
$description = $form->field($model, 'description')->textInput(['maxlength' => true]);
$status = $form->field($model, 'status')->dropDownList(['CL'=>'报废','CR'=>'报废再利用','MISS'=>'报失'],['prompt' => ' ']);
$remark = $form->field($model, 'remark')->textInput(['maxlength' => true]);

if($model->isNewRecord){
	$html = [
		$equipmentID,
		$brokerage,
		$brokerageDate,
		$description,
		$status,
		$remark,
	];
}else{
	$html = [
		$equipmentID,
		$brokerage,
		$brokerageDate,
		$description,
		$status,
		$remark,
	];
}

$html = array_merge($html, [
	$form->renderFooterButtons(),
]);

echo implode("\n",$html);
$form->end();
