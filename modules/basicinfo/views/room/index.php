<?php

use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;
use app\models\Room;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Room Manage');
$this->params['breadcrumbs'][] = $this->title;
$url = [
    'addFun' => [
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/basicinfo/room/create'],
    ],
//    'modifyFun' => [
//        'name' => '修改',
//        'icon' => 'fa fa-plus',
//        'url' => ['/basicinfo/room/update'],
//    ],
    'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/basicinfo/room/delete'],
    ],
//    'importFun' => [
//        'name' => '导入',
//        'icon' => 'fa fa-plus',
//        'url' => ['/basicinfo/room/create'],
//    ],
//    'printFun' => [
//        'name' => '打印',
//        'icon' => 'fa fa-plus',
//        'url' => ['/basicinfo/room/create'],
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
    ], [
        'attribute' => 'departmentID',
        'value' => 'department.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'departmentID',Department::queryAllDepartment(),[
            'prompt' => ' '
        ]),
    ], [
        'attribute' => 'status',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'value' => function($model){
            $LL = new Room();
            if($LL->nameCN($model->status) == 'Y'){
                return '是';
            }else{
                return '否';
            }
        },
        'filter' => Html::activeDropDownList($searchModel, 'status',['Y' => '是','N'=>'否'], ['prompt'=>' ']),
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