<?php

use app\models\UserFunction;
use yii\helpers\Html;
use app\widgets\SimpleDynaGrid;
use app\models\Teacher;
use app\models\LaboratoryTeacher;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MyLabsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app','Laboratory Teacher');
$this->params['breadcrumbs'][] = $this->title;
$url = [
    'addFun' => [
        'name' => '分配',
        'icon' => 'fa fa-plus',
        'url' => ['/laboratory/lab-tea/create'],
    ],
    'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/laboratory/lab-tea/delete'],
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
    'update' => function ($url) {
        return Html::a('<span>修改</span> ',
            $url,
            ['title' => '修改']);
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
//	[
//		'attribute' => 'laboratoryID',
//		'hAlign' => 'center',
//		'vAlign'=>'middle',
//	],
    [
        'attribute' => 'laboratoryID',
        'value' => 'laboratory.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'teacherID',
        'value' => 'teacher.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],
    [
        'attribute' => 'type',
        'value' => function($model) {
            $type = new LaboratoryTeacher();
            if ($type->nameCNS($model->type) == '0'){
                return "专职";
            }elseif($type->nameCNS($model->type) == '1') {
                return "兼职";
            }else{
                return "其他";
            }
        },
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'position',
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
