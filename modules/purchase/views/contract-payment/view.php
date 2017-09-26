<?php

use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\FunctionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '合同付款');
$this->params['breadcrumbs'][] = $this->title;

$url = [
    'addFun' => [
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/contract-payment/create-detail','id' => $model->contractPaymentID],
    ],
//    'modifyFun' => [
//        'name' => '修改',
//        'icon' => 'fa fa-plus',
//        'url' => ['/purchase/contract-payment/update'],
//    ],
    'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/contract-payment/delete-detail'],
    ],
//    'importFun' => [
//        'name' => '导入',
//        'icon' => 'fa fa-plus',
//        'url' => ['/purchase/contract/create'],
//    ],
//    'printFun' => [
//        'name' => '打印',
//        'icon' => 'fa fa-plus',
//        'url' => ['/purchase/contract/create'],
//    ],
];

$content = UserFunction::queryFunctionRightsByUser($url);
$button = [
    'view' => function ($url) {
        return Html::a('<span class=""></span>',
            $url,
            ['title' => '明细',]);
    },
    'update' => function ($url) {
        return Html::a('<span class=""></span>',
            $url, ['title' => '修改']);
    },
];
$templete = "{view} {update}";
if ($content['canModify'] == false) {
    unset($button["update"]);
    $templete = "{view}";
}

$columns = [
    [
        'class' => '\app\components\CheckboxColumn',
        'rowSelectedClass' => 'success'
    ],
    ['class' => 'kartik\grid\SerialColumn'],
      [
        'attribute' => 'paymentDate',
        'hAlign' => 'center',
        'vAlign' => 'middle',

    ],[
        'attribute' => 'amount',
        'hAlign' => 'center',
        'vAlign' => 'middle',
   ], [
        'attribute' => 'paymentTeacherID',
        'value' => 'teacher.name',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'filter' => Html::activeDropDownList($searchModel, 'paymentTeacherID',\app\models\Teacher::queryAllTeacher(),[
            'prompt' => ' '
        ]),
    ],
// [
//        'class' => 'kartik\grid\ActionColumn',
//        'header' => '操作',
//        'template' => $templete,
//        'buttons' => $button
//    ],
];

echo SimpleDynaGrid::widget([
    'dynaGridId' => 'dy-right-functions-index',
    'columns' => $columns,
    'dataProvider' => $dataProvider,
    'searchModel' => $searchModel,
    'title' => $this->title,
    'isDynagrid' => true,
    'isExport' => $content['canExport'],
    'extraToolbar' => [
        [
            'content' => $content['data']
        ],
    ]
]);
?>
