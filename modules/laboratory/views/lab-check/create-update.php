<?php

use app\components\ActiveForm;
use app\widgets\SimpleUEditor;
use kartik\select2\Select2;
use app\models\Teacher;
use app\models\Department;
use app\models\Laboratory;
use app\functions\CommonFunctions;

$this->title = ($model->isNewRecord ? Yii::t('app','Create My Lab') :  Yii::t('app','Check My Lab')) . '信息';
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app','My Lab Manage'),
		'url' => ['index'],
	],
	$this->title,
];

$form = ActiveForm::begin([
	'renderWrap' => true,
	'title' => $this->title,
]);
$f = new Laboratory();
$code = $form->field($model,'code')->textInput(['maxlength' => true,'readonly' => 'true']);
$name = $form->field($model,'name')->textInput(['maxlength' => true,'readonly' => 'true']);
$manager = $form->field($model, 'manager')->textInput(['maxlength' => true,
'value'=>$f->teacherName($model->manager),'readonly' => 'true', 'style' => 'background:#EED']);

//$handler = $form->field($model,'handlerName')->textInput(['maxlength' => true,
//'value'=>$handlerName->teacherName($model->handlerName),'readonly' => 'true', 'style' => 'background:#EED']);

$type = $form->field($model, 'type')->textInput(['maxlength' => true,
	'value'=>$f->typeName($model->type),'readonly' => 'true', 'style' => 'background:#EED']);
$departmentID = $form->field($model, 'departmentID')->textInput(['maxlength' => true,
	'value'=>$f->departmentName($model->department),'readonly' => 'true', 'style' => 'background:#EED']);
$createDate = $form->field($model, 'createDate')->textInput(['maxlength' => true,'placeholder'=>'未填写','readonly' => 'true']);
$approveDate = $form->field($model,'approveDate')->textInput(['maxlength' => true,'placeholder'=>'未填写','readonly' => 'true']);
$buildDate = $form->field($model,'buildDate')->textInput(['maxlength' => true,'placeholder'=>'未填写','readonly' => 'true']);
$budget = $form->field($model,'budget')->textInput(['maxlength' => true,'readonly' => 'true']);
$description = $form->field($model, 'description')->widget(SimpleUEditor::className(), [
	'type' => SimpleUEditor::TYPE_TWO
]);
$phone = $form->field($model,'phone')->textInput(['maxlength' => true,'readonly' => 'true']);
$handlerName = $form->field($model,'handlerName')->textInput(['maxlength' => true,
'value'=>$f->teacherName($model->handlerName),'readonly' => 'true', 'style' => 'background:#EED']);

$remark = $form->field($model, 'remark')->textarea(['rows'=>3,'readonly' => 'true']);
$approveName =$form->field($model,'approveName')->textInput(['maxlength' => true,
	'value'=>$f->teacherName($model->approveName),'readonly' => 'true', 'style' => 'background:#EED']);

//$checkName =  $form->field($model, 'checkName')->widget(Select2::className(),[
//	'data'=>Teacher::queryAllTeacher(),
//	'options' => ['placeholder' => '请选择 ...'],
//]);
$tips = (" <font  style=\"padding-left: 17%;color:red;font-size: large \" >若确认验收通过，请选择验收人，并点击确认按钮，否则请返回</font>");
$checkName =$form->field($model, 'checkName')->widget(Select2::className(),[
'data'=>Teacher::queryAllTeacher(),
	'options' => ['placeholder' => '请选择 ...'],
]);
if($model->isNewRecord){
	$html = [
		$code,
		$name,
		$manager,
		$type,
		$departmentID,
		$createDate,
		$approveDate,
		$buildDate,
		$budget,
		$description,
		$handlerName,
		$phone,
		$remark,
		$approveName,
		$tips,
		$checkName
	];
}else{
	$html = [
		$code,
		$name,
		$manager,
		$type,
		$departmentID,
		$createDate,
		$approveDate,
		$buildDate,
		$budget,
		$description,
		$handlerName,
		$phone,
		$remark,
		$approveName,
		$tips,
		$checkName
	];
}
$html = array_merge($html, [
	$form->renderFooterButtons(),
]);

echo implode("\n",$html);
$form->end();

