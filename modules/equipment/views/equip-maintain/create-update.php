<?php

use app\components\ActiveForm;
use kartik\select2\Select2;
use app\models\Teacher;
use app\models\EquipmentMaintain;
use app\functions\CommonFunctions;

/* @var $this yii\web\View */
/* @var $model app\models\EquipmentMaintain */

$this->title = ($model->isNewRecord ? Yii::t('app','Create Maintain Equipment') : Yii::t('app','Update Maintain Equipment')) . '信息';
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app', 'Equipment Maintain Manage'),
		'url' => ['index'],
	],
	$this->title,
];
$form = ActiveForm::begin([
	'renderWrap' => true,
	'title' => $this->title
]);
/** @var \app\models\User $user */
$mo = Teacher::queryAllTeachers();
$equipmentID = $form->field($model, 'equipmentID')->textInput(['maxlength' => true,'readonly' => 'true', 'style' => 'background:#EED']);
//$applier = $form->field($model,'applier')->textInput(['maxlength' => true,'value'=>$foo->teacherName($model->applier),'readonly' => 'true', 'style' => 'background:#EED']);
$applier = $form->field($model,'applier')->textInput(['maxlength' => true,'readonly' => 'true', 'style' => 'background:#EED']);
$applyDate = $form->field($model,'applyDate')->textInput(['maxlength' => true,'readonly' => 'true', 'style' => 'background:#EED']);
$description = $form->field($model, 'description')->textInput(['maxlength' => true,'readonly' => 'true', 'style' => 'background:#EED']);
//$checker = $form->field($model, 'checker')->widget(Select2::className(),[
//	'data'=>Teacher::queryAllTeacher(),
//	'options' => ['placeholder' => '请选择 ...'],
//]);
$checker = $form->field($model, 'checker')->textInput(['maxlength' => true,'value' => $mo,'readonly' => 'true', 'style' => 'background:#EED']);
$checkDate = $form->field($model, 'checkDate')->textInput(['value' => CommonFunctions::getCurrentDateTime(),'readonly' => 'true']);
$remark = $form->field($model,'remark')->textInput(['maxlength' => true,'readonly' => 'true', 'style' => 'background:#EED']);

if($model->isNewRecord){
	$html = [
		$equipmentID,
		$description,
		$checker,
		$checkDate,
	];
}else{
	$html = [
		$equipmentID,
		$applier,
		$applyDate,
		$description,
		$checker,
		$checkDate,
		$remark,
	];
}

$html = array_merge($html, [
	$form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();
?>