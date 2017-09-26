<?php

use app\components\ActiveForm;
use kartik\select2\Select2;
use app\models\teacher;
use app\models\department;
use app\models\Laboratory;
use app\models\Room;
use app\models\Fee;
use app\models\FeeType;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */

$this->title = ($model->isNewRecord ? Yii::t('app','Create Equipment') : Yii::t('app','Update Equipment')) . '信息';
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app','Equipment Manage'),
		'url' => ['index']
	],
	$this->title,
];

$form = ActiveForm::begin([
	'renderWrap' => true,
	'title' => $this->title
]);

$code = $form->field($model, 'code')->textInput(['maxlength' => true]);
$name = $form->field($model, 'name')->textInput(['maxlength' => true]);
$modell = $form->field($model, 'modell')->textInput(['maxlength' => true]);
$specification = $form->field($model, 'specification')->textInput(['maxlength' => true]);
$purchaseDate = $form->field($model, 'modell')->textInput(['maxlength' => true]);
$purchaseDate = $form->field($model, 'purchaseDate')->widget(\kartik\widgets\DatePicker::classname(), [
	'options' => ['placeholder' => '请选择购买时间'],
	'removeButton' => false,
	'pluginOptions' => [
		'autoclose'=>true,
		'format' => 'yyyy-mm-dd'
	]
]);
//$feeSubject = $form->field($model, 'feeSubject')->textInput(['maxlength' => true]);
$feeSubject = $form->field($model, 'feeSubject')->widget(Select2::className(),[
	'data'=>Fee::queryAllFee(),
	'options' => ['placeholder' => '请选择 ...'],
]);
$teacherID = $form->field($model, 'teacherID')->widget(Select2::className(),[
	'data'=>Teacher::queryAllTeacher(),
	'options' => ['placeholder' => '请选择 ...'],
]);
$endDate = $form->field($model, 'endDate')->widget(\kartik\widgets\DatePicker::classname(), [
	'options' => ['placeholder' => '请选择保修日期'],
	'removeButton' => false,
	'pluginOptions' => [
		'autoclose'=>true,
		'format' => 'yyyy-mm-dd'
	]
]);
$checkPeriod = $form->field($model, 'checkPeriod')->textInput(['maxlength' => true]);
$purchasePerson = $form->field($model, 'purchasePerson')->widget(Select2::className(),[
	'data'=>Teacher::queryAllTeacher(),
	'options' => ['placeholder' => '请选择 ...'],
]);
$nation = $form->field($model, 'nation')->textInput(['maxlength' => true]);
$sourceFrom = $form->field($model, 'sourceFrom')->textInput(['maxlength' => true]);
//$feeCode = $form->field($model, 'feeCode')->textInput(['maxlength' => true]);
$feeCode = $form->field($model, 'feeCode')->widget(Select2::className(),[
	'data'=>FeeType::queryAllFees(),
	'options' => ['placeholder' => '请选择 ...'],
]);
$price = $form->field($model, 'price')->textInput(['maxlength' => true]);
$purpose = $form->field($model, 'purpose')->textInput(['maxlength' => true]);
$transptation = $form->field($model, 'transptation')->textInput(['maxlength' => true]);
$foreignPrice = $form->field($model, 'foreignPrice')->textInput(['maxlength' => true]);
$picture = $form->field($model, 'picture')->textInput(['maxlength' => true]);
$maker = $form->field($model, 'maker')->textInput(['maxlength' => true]);
$makeDate = $form->field($model, 'makeDate')->widget(\kartik\widgets\DatePicker::classname(), [
	'options' => ['placeholder' => '请选择出厂日期'],
	'removeButton' => false,
	'pluginOptions' => [
		'autoclose'=>true,
		'format' => 'yyyy-mm-dd'
	]
]);
$makeCode = $form->field($model, 'makeCode')->textInput(['maxlength' => true]);
$supplier = $form->field($model, 'supplier')->textInput(['maxlength' => true]);
$description = $form->field($model, 'description')->textInput(['maxlength' => true]);
$departmentID = $form->field($model, 'departmentID')->widget(Select2::className(),[
	'data'=>Department::queryAllDepartment(),
	'options' => ['placeholder' => '请选择 ...'],
]);
$user = $form->field($model, 'user')->widget(Select2::className(),[
	'data'=>Teacher::queryAllTeacher(),
	'options' => ['placeholder' => '请选择 ...'],
]);
$managerID = $form->field($model, 'managerID')->widget(Select2::className(),[
	'data'=>Teacher::queryAllTeacher(),
	'options' => ['placeholder' => '请选择 ...'],
]);
$laboratoryID = $form->field($model, 'laboratoryID')->widget(Select2::className(),[
	'data'=>Laboratory::queryAllLaboratory1(),
	'options' => ['placeholder' => '请选择 ...'],
]);
$roomID = $form->field($model, 'roomID')->widget(Select2::className(),[
	'data'=>Room::queryAllRoom(),
	'options' => ['placeholder' => '请选择 ...'],
]);
$status = $form->field($model, 'status')->dropDownList(['RU' => '运行','CL'=>'报废','CR'=>'报废再利用','RP'=>'维修'],['prompt' => ' ']);
$remark = $form->field($model, 'remark')->textInput(['maxlength' => true]);
if($model->isNewRecord){
	$html = [
		$code,
		$name,
		$modell,
		$specification,
		$purchaseDate,
		$feeSubject,
		$teacherID,
		$endDate,
		$checkPeriod,
		$purchasePerson,
		$nation,
		$sourceFrom,
		$feeCode,
		$price,
		$purpose,
		$transptation,
		$foreignPrice,
		$picture,
		$maker,
		$makeDate,
		$makeCode,
		$supplier,
		$description,
		$departmentID,
		$user,
		$managerID,
		$laboratoryID,
		$roomID,
		$status,
		$remark,
	];
}else{
	$html = [
		$code,
		$name,
		$modell,
		$specification,
		$purchaseDate,
		$feeSubject,
		$teacherID,
		$endDate,
		$checkPeriod,
		$purchasePerson,
		$nation,
		$sourceFrom,
		$feeCode,
		$price,
		$purpose,
		$transptation,
		$foreignPrice,
		$picture,
		$maker,
		$makeDate,
		$makeCode,
		$supplier,
		$description,
		$departmentID,
		$user,
		$managerID,
		$laboratoryID,
		$roomID,
		$status,
		$remark,
	];
}
$html = array_merge($html, [
	$form->renderFooterButtons(),
]);

echo implode("\n",$html);
$form->end();


