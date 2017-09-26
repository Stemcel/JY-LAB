<?php

use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\FunctionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contract Manage');
$this->params['breadcrumbs'][] = $this->title;

$url = [
    'addFun' => [
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/contract/create'],
    ],
//    'modifyFun' => [
//         'name' => '修改',
//         'icon' => 'fa fa-plus',
//         'url' => ['/purchase/contract/update'],
//     ],
    'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/contract/delete'],
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
        return Html::a('<span class="">明细</span>',
            $url,
            ['title' => '明细',]);
    },
    'dload' => function ($url) {
        return Html::a('<span class="">附件</span>',
            $url, ['title' => '下载']);
    },
];
$templete = "{view} {dload}";
//if ($content['canModify'] == false) {
//    unset($button["update"]);
//    $templete = "{view}";
//}

$columns = [
    [
        'class' => '\app\components\CheckboxColumn',
        'rowSelectedClass' => 'success'
    ],
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'attribute' => 'vendorID',
        'value'=>'vendor.name',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'filter' => Html::activeDropDownList($searchModel, 'vendorID',\app\models\Vendor::queryAllVender(),[
            'prompt' => ' '
        ]),
    ], [
        'attribute' => 'code',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'attribute' => 'title',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'amount',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'createDate',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'deliveryTime',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'attribute' => 'paymentType',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'status',
        'format' => 'raw',
        'value' => function ($model) {
            $sta = new \app\models\Contract();
            if ($sta->nameCN($model->status) == 'OP') {
                return Html::tag("b","执行",["class" => 'blue']);
            } else {
                return Html::tag("b","结束",["class" => 'red']);
            }
        },
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'status',['OP' => '执行','CL'=>'结束'], ['prompt'=>' ']),

    ],[
        'attribute' => 'contractFile',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],  [
        'class' => 'kartik\grid\ActionColumn',
        'header' => '操作',
        'template' => $templete,
        'buttons' => $button
    ],
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
