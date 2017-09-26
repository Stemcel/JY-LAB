<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/11 0011
 * Time: 13:54
 */

use app\components\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;
use app\models\Classes;

/* @var $this yii\web\View */
/* @var $model app\models\Student */

	$this->title = ($model->isNewRecord ? Yii::t('app','Create Student') : Yii::t('app','Update Student')) . '信息';
	$this->params['breadcrumbs'] = [
		[
		'label' => Yii::t('app','Student Manage'),
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
	$sex = $form->field($model, 'sex')->dropDownList(['1' => '男','2'=>'女','0' => '未知'],['prompt'=>' ']);
	$type = $form->field($model, 'type')->dropDownList(['1' => '博士','2'=>'硕士','3'=>'本科','4'=>'大专','5'=>'其他'],['prompt'=>' ']);
	$classesID = $form->field($model, 'classesID')->widget(Select2::className(),[
					'data'=>Classes::queryAllClasses(),
					'options' => ['placeholder' => '请选择 ...'],
			]);
	$password = $form->field($model, 'password')->passwordInput(['maxlength' => true]);
	$email = $form->field($model, 'email')->textInput(['maxlength' => true]);
	$status = $form->field($model, 'status')->dropDownList(['1' => '在读','2' => '休学','3' => '毕业',],['prompt'=>' ']);
	$phone = $form->field($model, 'phone')->textInput(['maxlength' => true]);
	$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);

if($model->isNewRecord){
	$html = [
		$code,
		$name,
		$password,
		$sex,
		$classesID,
		$type,
		$status,
		$phone,
		$email,
		$remark,

	];
}else{
	$html = [
		$code,
		$name,
		$password,
		$sex,
		$classesID,
		$type,
		$status,
		$phone,
		$email,
		$remark,
	];
}
	$html = array_merge($html, [
	$form->renderFooterButtons(),
]);
	echo implode("\n",$html);
	$form->end();
