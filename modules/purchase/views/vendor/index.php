<?php

use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\VendorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Vendor Manage');
$this->params['breadcrumbs'][] = $this->title;
$url = [
    'addFun' => [
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/vendor/create'],

    ],
  /*  'modifyFun' => [
        'name' => '修改',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/vendor/des'],
    ],*/
    'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/vendor/delete'],
    ],
/*    'importFun' => [
        'name' => '导入',
        'icon' => 'fa fa-plus',
        'url' => ['/budget/annual-budget/import'],
    ],
    'printFun' => [
        'name' => '打印',
        'icon' => 'fa fa-plus',
        'url' => ['/budget/annual-budget/create'],
    ],*/
];
$content = UserFunction::queryFunctionRightsByUser($url);
$button = [
    'view' => function ($url) {
        return Html::a('<span class="btn btn-primary">查看</span>',
            $url,
            ['title' => '查看',
            ]

        );
    },
    'update' => function ($url) {
        return Html::a('<span class="btn btn-primary">修改</span>',
            $url, ['title' => '修改']);

    },
];
$templete = "{view} {update}";
if($content['canModify'] == false){
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
        'attribute' => 'code',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ], [
        'attribute' => 'name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],  [
        'attribute' => 'contacts',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ], [
        'attribute' => 'phone',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'fax',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'class' => 'kartik\grid\ActionColumn',
        'header' => '操作',
        'template' => $templete,
        'buttons' => $button,
        'width' => '150px'
    ],
];

echo SimpleDynaGrid::widget([
    'dynaGridId' => 'dy-right-module-index',
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
    ],
]);
?>