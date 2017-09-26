<?php

use app\models\UserFunction;
use yii\helpers\Html;
use app\models\Laboratory;
use app\models\TeacherAchievement;
use app\models\Department;
use app\models\Teacher;
use app\widgets\SimpleDynaGrid;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MyLabsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app','Teacher Achievement');
$this->params['breadcrumbs'][] = $this->title;
$url = [
    'addFun' => [
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/laboratory/tea-ach/create'],
    ],
    'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/laboratory/tea-ach/delete'],
    ],
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
//    'update' => function ($url) {
//        return Html::a('<span>验收</span> ',
//            $url,
//            ['title' => '']);
//    },
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
//	[
//		'attribute' => 'laboratoryID',
//		'hAlign' => 'center',
//		'vAlign'=>'middle',
//	],
    [
        'attribute' => 'name',
        'value' => 'teacher.name',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'laboratoryID',
        'value' => 'laboratory.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'type',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'level',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'remark',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'class' => 'kartik\grid\ActionColumn',
        'header' => '操作',
        'template' => $templete,
        'buttons' => $button,
    ],
];

echo SimpleDynaGrid::widget([
    'dynaGridId' => 'dy-right-module-index',
    'columns' => $columns,
    'dataProvider' => $dataProvider,
    'searchModel' => $searchModel,
    'title' => $this->title,
    'isDynagrid' =>true,
    'isExport' => $content['canExport'],
    'extraToolbar' => [
        [
            'content' => $content['data']
        ],
    ],
]);
?>
