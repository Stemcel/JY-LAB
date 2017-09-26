<?php
use app\components\ActiveForm;
use app\functions\CommonFunctions;
use app\models\AnnualBudget;
use app\models\Fee;
use app\models\Teacher;
use app\models\Department;
use app\widgets\SimpleUEditor;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Fee */


$this->title = ($model->isNewRecord ? Yii::t('app', 'Create My Annual Budget') : Yii::t('app', 'Update My Annual Budget')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'My Annual Budget Manage'),
        'url' => ['index'],
    ],
    $this->title,
];
/** @var \app\models\User $user */
$user = Yii::$app->user->getIdentity();
$nickname = $user->name;

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title
]);
$handlerName = new AnnualBudget();
$departmentID = $form->field($model, 'departmentID')->widget(Select2::className(),[
    'data'=>Department::queryAllDepartment(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$years = $form->field($model, 'years')->textInput(['maxlength' => true,'placeholder'=>'例：2017']) ;
$feeID = $form->field($model, 'feeID')->widget(Select2::className(),[
    'data'=>Fee::queryAllFee(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$amount = $form->field($model, 'amount')->textInput(['maxlength' => true]);
$approveAmount = $form->field($model, 'approveAmount')->textInput(['maxlength' => true]);
$handlerName = $form->field($model, 'handlerName')->widget(Select2::className(),[
    'data'=>Teacher::queryAllTeachernn(),
    'options' => ['placeholder' => '请选择 ...'],
]);

/*$handlerName = $form->field($model, 'handlerName')->textInput(['maxlength' => true,'value'=>$handlerName->teacherName($nickname),'readonly' => 'true', 'style' => 'background:#EED']);*/

$approver = $form->field($model, 'approver')->widget(Select2::className(),[
    'data'=>Teacher::queryAllTeachernn(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$handlerDate = $form->field($model, 'handlerDate')->textInput(['value' => CommonFunctions::getCurrentDateTime(),'readonly' => 'true']);
if ($model->isNewRecord){$model->type = 0; }
$type = $form->field($model, 'type')->radioList(['0' => '正常','1'=>'追加']);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);
$purpose = $form->field($model, 'purpose')->widget(SimpleUEditor::className(), [
    'type' => SimpleUEditor::TYPE_TWO
]);

if($model->isNewRecord){
    $html = [
        $departmentID,
        $years,
        $feeID,
        $amount,
        $handlerName,
        $purpose,
        $handlerDate,
        $type,
        $remark,
    ];
}else{
    $html = [
        $departmentID,
        $years,
        $feeID,
        $amount,
        $handlerName,
        $purpose,
        $handlerDate,
        $type,
        $remark,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);

echo implode("\n",$html);
$form->end();



