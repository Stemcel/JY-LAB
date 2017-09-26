<?php

use app\components\ActiveForm;
use app\widgets\SimpleUEditor;
use app\models\Room;
use app\models\Laboratory;
use app\models\LaboratoryRoom;
use app\functions\CommonFunctions;
use app\models\LaboratoryTeacher;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Campus */
/* @var $model app\models\Building */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create Laboratory Room') : Yii::t('app', 'Update Laboratory Room')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'LaboratoryRoom Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title
]);
$room = $form->field($model, 'roomID')->widget(Select2::className(),[
    'data'=>Room::queryAllRoom(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$laboratoryID =$form->field($model, 'laboratoryID')->widget(Select2::className(),[
    'data'=>Laboratory::queryAlllaboratory1(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);

if($model->isNewRecord){
    $html = [
        $laboratoryID,
        $room,
        $remark,
    ];
}else{
    $html = [
        $laboratoryID,
        $room,
        $remark,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();

