<?php

use app\components\ActiveForm;
use app\functions\CommonFunctions;
use app\models\PurchaseCatalogue;
use kartik\select2\Select2;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\PurchaseCatalogue */

$this->title = ($model->isNewRecord ? Yii::t('app', 'Create PurchaseCatalogue') : Yii::t('app', 'Update PurchaseCatalogue')) . '信息';
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'PurchaseCatalogue Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$form = ActiveForm::begin([
    'renderWrap' => true,
    'title' => $this->title,
]);

$code= $form->field($model, 'code')->textInput();
$parentCode = $form->field($model, 'parentCode')->widget(Select2::className(),[
    'data'=>PurchaseCatalogue::queryAllPurchaseCatalogue(),
    'options' => ['placeholder' => '请选择 ...'],
]);
$name = $form->field($model, 'name')->textInput();
$type = $form->field($model, 'type')->dropDownList(
    [
        1 =>'1-政府集中采购',
        2 =>'2-部门集中采购',
        3 =>'3-单位分散自行采购',
        4 =>'4-单位分散委托代理采购',
        5 =>'5-定点采购',
        6 =>'6-协议供货'
    ]
);
if ($model->isNewRecord){$model->isCollection = 1; }
$isCollection = $form->field($model,'isCollection')->radioList([1 =>'汇总',0 => '不汇总']);
$description= $form->field($model, 'description')->textarea(['rows'=>3]);
$remark = $form->field($model, 'remark')->textarea(['rows'=>3]);
if($model->isNewRecord){
    $html = [
        //$parentCode,
        $code,
        $name,
        $isCollection,
        $type,
        $description,
        $remark,
    ];
}else{
    $html = [
        $parentCode,
        $code,
        $name,
        $isCollection,
        $type,
        $description,
        $remark,
    ];
}
$html = array_merge($html, [
    $form->renderFooterButtons(),
]);
echo implode("\n",$html);
$form->end();

