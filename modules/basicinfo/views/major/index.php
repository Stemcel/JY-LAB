<?php

use app\models\Major;
use app\models\Department;
use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MajorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Building Manage');
$this->params['breadcrumbs'][] = $this->title;
$url = [
    'addFun' => [
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/basicinfo/major/create'],
    ],
//    'modifyFun' => [
//        'name' => '修改',
//        'icon' => 'fa fa-plus',
//        'url' => ['/basicinfo/major/update'],
//    ],
    'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/basicinfo/major/delete'],
    ],
    'importFun' => [
        'name' => '导入',
        'icon' => 'fa fa-plus',
        'url' => ['/basicinfo/major/create'],
    ],
//    'printFun' => [
//        'name' => '打印',
//        'icon' => 'fa fa-plus',
//        'url' => ['/basicinfo/major/create'],
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
        'attribute' => 'code',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ], [
        'attribute' => 'type',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'value' => function ($model) {
            $type = new Major();
            if ($type->nameCN($model->type) == '1') {
                return "博士";
            } elseif ($type->nameCN($model->type) == '2') {
                return "硕士";
            } elseif ($type->nameCN($model->type) == '3') {
                return "本科";
            } elseif ($type->nameCN($model->type) == '4') {
                return "大专";
            } else {
                return "其他";
            }
        },
        'filter' => Html::activeDropDownList($searchModel, 'type',['1' => '博士','2'=>'硕士','3'=>'本科','4'=>'大专','5'=>'其他'], ['prompt'=>' ']),

    ],[
        'attribute' => 'departmentID',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'value'=>'department.name',
        'filter' => Html::activeDropDownList($searchModel, 'departmentID',Department::queryAllDepartment(),[
            'prompt' => ' '
        ]),
    ],/*[
        'attribute' => 'remark',
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
    'isDynagrid' => false,
    'isExport' => $content['canExport'],
    'extraToolbar' => [
        [
            'content' => $content['data']
        ],
    ],
]);
?>