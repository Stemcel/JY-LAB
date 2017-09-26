<?php

use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ModuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Module Manage');
$this->params['breadcrumbs'][] = $this->title;

$url = [
    'addFun' => [
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/right/module/create'],
    ],
/*    'modifyFun' => [
        'name' => '修改',
        'icon' => 'fa fa-plus',
        'url' => ['/right/module/update'],
    ],*/
    'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/right/module/delete'],
    ],
//    'importFun' => [
//        'name' => '导入',
//        'icon' => 'fa fa-plus',
//        'url' => ['/right/user/create'],
//    ],
//    'printFun' => [
//        'name' => '打印',
//        'icon' => 'fa fa-plus',
//        'url' => ['/right/user/create'],
//    ],
];

$content = UserFunction::queryFunctionRightsByUser($url);
$button = [
    'view' => function ($url) {
        return Html::a('<span class="glyphicon glyphicon-search"></span>',
            $url,
            ['title' => '查看',
            ]

        );
    },
    'update' => function ($url) {
        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
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
        'attribute' => 'name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ], [
        'attribute' => 'moduleCode',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ], /*[
        'attribute' => 'remark',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'sort',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],*/[
        'class' => 'kartik\grid\ActionColumn',
        'header' => '操作',
        'template' => $templete,
        'buttons' => $button
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
    ]
]);
?>


