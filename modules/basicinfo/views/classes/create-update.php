<?php

use app\components\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;
use app\models\Major;
use app\models\Campus;

/* @var $this yii\web\View */
/* @var $model app\models\Classes */

$this->title = ($model->isNewRecord ? Yii::t('app','Create classes') : Yii::t('app','Update classes')) . '信息';
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app','Classes Manage'),
		'url' => ['index'],
	],
	$this->title,
];

$form = ActiveForm::begin([
	'renderWrap' => true,
	'title' => $this->title
]);

$code = $form->field($model, 'code')->textInput(['maxlength' => true]);
$name = $form->field($model, 'name')->textInput(['maxlength' => true]);
$campusID = $form->field($model, 'campusID')->widget(Select2::className(),[
		'data'=>Campus::queryAllCampus(),
		'options' => ['placeholder' => '请选择 ...'],
]);
$majorID = $form->field($model, 'majorID')->widget(Select2::className(),[
		'data'=>Major::queryAllMajor(),
		'options' => ['placeholder' => '请选择 ...'],
]);
$grade = $form->field($model, 'grade')->dropDownList(['1' => '大一','2'=>'大二','3'=>'大三','4'=>'大四','5'=>'大五','0'=>'其他'],['prompt'=>' ']);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);

if($model->isNewRecord){
	$html = [
		$code,
		$name,
		$campusID,
		$majorID,
		$grade,
		$remark,
	];
}else{
	$html = [
		$code,
		$name,
		$campusID,
		$majorID,
		$grade,
		$remark,
	];
}

$html = array_merge($html, [
	$form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();
