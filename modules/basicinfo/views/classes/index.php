<?php

use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use app\models\Classes;
use yii\helpers\Html;
use app\models\Campus;
use app\models\Major;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ClassesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app' , 'Classes Manage');
$this->params['breadcrumbs'][] = $this->title;

$url = [
    'addFun'=>[
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/basicinfo/classes/create'],
    ],
   /* 'modifyFun'=>[
        'name' => '修改',
        'icon' => 'fa fa-plus',
        'url' => ['/basicinfo/classes/update'],
    ],*/
    'deleteFun'=>[
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/basicinfo/classes/delete'],
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
            [
                'title' => '查看',
            ]
        );
    },

    'update' => function ($url) {
        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
            $url, [
                'title' => '修改'
            ]);
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
//    [
//        'attribute' => 'classesID',
//        'hAlign' => 'center',
//        'vAlign' => 'middle',
//    ],
    [
        'attribute' => 'code',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'name',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'campusID',
        'value' => 'campus.name',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'filter' => Html::activeDropDownList($searchModel, 'campusID', Campus::queryAllCampus(),[
            'prompt' => '  '
        ]),
    ],[
        'attribute' => 'majorID',
        'value' => 'major.name',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'filter' => Html::activeDropDownList($searchModel, 'majorID', Major::queryAllMajor(),[
            'prompt' => '  '
        ]),
    ],[
        'attribute' => 'grade',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'value' => function($model){
            $grade = new Classes();
            if($grade->nameGD($model->grade) == '1'){
                return "大一";
            }elseif($grade->nameGD($model->grade) == '2'){
                return "大二";
            }elseif($grade->nameGD($model->grade) == '3'){
                return "大三";
            }elseif($grade->nameGD($model->grade) == '4'){
                return "大四";
            }elseif($grade->nameGD($model->grade) == '5'){
                return "大五";
            }else{
                return "其他";
            }
        },
        'format' => 'raw',
        'filter' => Html::activeDropDownList($searchModel, 'grade',['1' => '大一','2'=>'大二','3'=>'大三','4'=>'大四','5'=>'大五','0'=>'其他'], ['prompt'=>' ']),
    ],[
        'class' => 'kartik\grid\ActionColumn',
        'header' => '操作',
        'template' => $templete,
        'buttons' => $button
    ],
//    [
//        'attribute' => 'remark',
//        'hAlign' => 'center',
//        'vAlign' => 'middle',
//    ],
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

