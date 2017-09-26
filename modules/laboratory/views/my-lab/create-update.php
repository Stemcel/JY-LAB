<?php

use app\components\ActiveForm;
use app\widgets\SimpleUEditor;
use kartik\select2\Select2;
use app\models\Teacher;
use app\models\Department;
use app\functions\CommonFunctions;

$this->title = ($model->isNewRecord ? Yii::t('app','Create My Lab') :  Yii::t('app','Update My Lab')) . '信息';
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app','My Lab Manage'),
		'url' => ['index'],
	],
	$this->title,
];

$form = ActiveForm::begin([
	'renderWrap' => true,
	'title' => $this->title
]);

$code = $form->field($model,'code')->textInput(['maxlength' => true]);
$name = $form->field($model,'name')->textInput(['maxlength' => true]);
$manager = $form->field($model, 'manager')->widget(Select2::className(),[
	'data'=>Teacher::queryAllTeachernn(),
	'options' => ['placeholder' => '请选择 ...'],
]);
$type = $form->field($model,'type')->dropDownList(['0' => '教学','1'=>'科研','2'=>'其他'],['prompt' => ' ']);
$departmentID = $form->field($model, 'departmentID')->widget(Select2::className(),[
	'data'=>Department::queryAllDepartment(),
	'options' => ['placeholder' => '请选择 ...'],
]);
$createDate = $form->field($model, 'createDate')->textInput(['value' => CommonFunctions::getCurrentDateTime(),'readonly' => 'true']);
//$approveDate = $form->field($model,'approveDate')->textInput(['maxlength' => true,'placeholder'=>'例：2017年1月1日']);
//$buildDate = $form->field($model,'buildDate')->textInput(['maxlength' => true,'placeholder'=>'例：2017年1月1日']);
$budget = $form->field($model,'budget')->textInput(['maxlength' => true]);
$description = $form->field($model, 'description')->widget(SimpleUEditor::className(), [
	'type' => SimpleUEditor::TYPE_TWO
]);
$phone = $form->field($model,'phone')->textInput(['maxlength' => true]);
$handlerName = $form->field($model, 'handlerName')->widget(Select2::className(),[
	'data'=>Teacher::queryAllTeachernn(),
	'options' => ['placeholder' => '请选择 ...'],
]);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);

if($model->isNewRecord){
	$html = [
		$code,
		$name,
		$manager,
		$type,
		$departmentID,
		$createDate,
//		$approveDate,
//		$buildDate,
		$budget,
		$description,
		$handlerName,
		$phone,
		$remark,
	];
}else{
	$html = [
		$code,
		$name,
		$manager,
		$type,
		$departmentID,
		$createDate,
//		$approveDate,
//		$buildDate,
		$budget,
		$description,
		$handlerName,
		$phone,
		$remark,
	];
}
$html = array_merge($html, [
	$form->renderFooterButtons(),
]);

echo implode("\n",$html);
$form->end();

