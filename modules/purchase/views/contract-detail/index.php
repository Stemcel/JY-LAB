<?php

use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\FunctionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '合同明细');
$this->params['breadcrumbs'][] = $this->title;

$url = [
    'addFun' => [
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/contract-detail/create'],
    ],
    'modifyFun' => [
        'name' => '修改',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/contract-detail/update'],
    ],
    'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/contract-detail/delete'],
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
        return Html::a('<span class="glyphicon glyphicon-search"></span>',
            $url,
            ['title' => '明细',]);
    },
    'update' => function ($url) {
        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
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
        'attribute' => 'contractID',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'attribute' => 'purchaseDetailID',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'attribute' => 'annualBudgetID',
        'value' => 'annualBudget.annualBudgetCode',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'filter' => Html::activeDropDownList($searchModel, 'annualBudgetID', \app\models\AnnualBudget::queryAllAnnualBudget(), [
            'prompt' => ' '
        ]),
    ],[
        'attribute' => 'purchaseCatalogueID',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'description',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'specification',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'attribute' => 'quantity',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'unit',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'attribute' => 'price',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'amount',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'deliveryTime',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'deliveryTeacher',
        'value' => 'teacher.name',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'attribute' => 'checkTime',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'checkTeacher',
        'value' => 'teacher.name',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'attribute' => 'closeTime',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'closeTeacher',
        'value' => 'teacher.name',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'filter' => Html::activeDropDownList($searchModel, 'closeTeacher', \app\models\Teacher::queryAllTeacher(), [
            'prompt' => ' '
        ]),
    ],[
        'attribute' => 'status',
        'format' => 'raw',
//        'value' => function ($model) {
//            $sta = new \app\models\Contract();
//            if ($sta->nameCN($model->status) == 'OP') {
//                return Html::tag("b","执行",["class" => 'blue']);
//            } else {
//                return Html::tag("b","结束",["class" => 'red']);
//            }
//        },
        'hAlign' => 'center',
        'vAlign'=>'middle',
       // 'filter' => Html::activeDropDownList($searchModel, 'status',['OP' => '执行','CL'=>'结束'], ['prompt'=>' ']),

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
