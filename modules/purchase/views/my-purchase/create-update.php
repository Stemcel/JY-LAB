<?php

use app\components\ActiveFormSpecial;
use app\functions\CommonFunctions;
use kartik\select2\Select2;
use app\models\Department;
use app\models\Teacher;
/* @var $this yii\web\View */
/* @var $model app\models\Purchase */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Purchase') : Yii::t('app', 'Update Purchase')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Purchase Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveFormSpecial::begin([
    'renderWrap' => true,
    'title' => $this->title
]);

$title= $form->field($model, 'title')->textarea(['rows'=>3]);
$departmentID = $form->field($model, 'departmentID')->widget(Select2::className(),[
    'data'=>Department::queryAllDepartment(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$teacherID = $form->field($model, 'teacherID')->widget(Select2::className(),[
    'data'=>Teacher::queryAllTeacher(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$createDate = $form->field($model, 'createDate')->textInput(['value' => CommonFunctions::getCurrentDateTime(),'readonly' => 'true']);
$purchaseFile = $form->field($model, 'purchaseFile')->fileInput();
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);
if($model->isNewRecord){
    $html = [
        $title,
        $departmentID,
        $teacherID,
        $createDate,
        $purchaseFile,
        $remark,
    ];
}else{
    $html = [
        $title,
        $departmentID,
        $teacherID,
        $createDate,
        $purchaseFile,
        $remark,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();

