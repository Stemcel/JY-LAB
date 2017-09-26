<?php

use app\components\ActiveForm;
use app\models\Major;
use kartik\select2\Select2;
use yii\helpers\Html;
use app\models\Department;
/* @var $this yii\web\View */
/* @var $model app\models\Major */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Major') : Yii::t('app', 'Update Major')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Major Manage'),
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
$type = $form->field($model, 'type')->dropDownList(['1' => '博士','2' => '硕士','3' => '本科','4' => '大专','5' => '其他',],['prompt'=>' ']);
$englishName = $form->field($model, 'englishName')->textInput(['maxlength' => true]);
$departmentID = $form->field($model, 'departmentID')->widget(Select2::className(),[
    'data'=>Department::queryAllDepartment(),
    'options' => ['placeholder' => '请选择 ...'],
]);$discipline = $form->field($model, 'discipline')->textInput(['maxlength' => true]);
$isEnroll = $form->field($model, 'isEnroll')->dropDownList(['Y' => '招生','N' => '不招',],['prompt'=>' ']);
$description = $form->field($model, 'description')->textarea(['rows'=>3]);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);
if($model->isNewRecord){
    $html = [
        $code,
        $name,
        $type,
        $englishName,
        $departmentID,
        $discipline,
        $isEnroll,
        $description,
        $remark,
    ];
}else{
    $html = [
        $code,
        $name,
        $type,
        $englishName,
        $departmentID,
        $discipline,
        $isEnroll,
        $description,
        $remark,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();

