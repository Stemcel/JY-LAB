<?php

use app\models\UserFunction;
use yii\helpers\Html;
use app\models\Laboratory;
use app\models\Department;
use app\widgets\SimpleDynaGrid;
use app\models\Teacher;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MyLabsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app','My Lab Apply');
$this->params['breadcrumbs'][] = $this->title;
$url = [
    'addFun' => [
        'name' => '申请',
        'icon' => 'fa fa-plus',
        'url' => ['/laboratory/my-lab/create'],
    ],
    'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/laboratory/my-lab/delete'],
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
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'manager',
        'value' => 'teacher.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'manager',Teacher::queryAllTeacher(),[
            'prompt' => ' ']),
    ],[
        'attribute' => 'type',
        'value' => function($model) {
            $type = new Laboratory();
            if ($type->nameCNS($model->type) == '0'){
                return "教学";
            }elseif($type->nameCNS($model->type) == '1') {
                return "科研";
            }else{
                return "其他";
            }
        },
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter'=>Html::activeDropDownList($searchModel, 'type',['0' => '教学','1'=>'科研','3' => '其他'], ['prompt'=>' ']),
    ],[
        'attribute' => 'departmentID',
        'value' => 'department.name',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'filter' => Html::activeDropDownList($searchModel,'departmentID',Department::queryAllDepartment(),[
            'prompt' => ' '
        ]),
    ],[
        'attribute' => 'createDate',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'budget',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'status',
        'format' => 'raw',
        'value' => function ($model) {
            $status = new Laboratory();
            if ($status->nameCN($model->status) == 'NA') {
                return Html::tag("b","申请",["class" => 'red']);
            }elseif($status->nameCN($model->status) == 'OP') {
                return Html::tag("b","批准",["class" => 'blue']);
            }elseif($status->nameCN($model->status) == 'RU'){
                return Html::tag("b","验收",["class" => 'blue']);
            }else{
                return Html::tag("b","结束",["class" => 'red']);
            }
        },
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'filter' => Html::activeDropDownList($searchModel, 'status',['NA'=>'申请','OP' => '批准','RU' => '验收','CL'=>'结束'], ['prompt'=>' ']),
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
