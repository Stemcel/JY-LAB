<?php

use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use app\models\Teacher;
use yii\helpers\Html;
use app\models\Department;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Teacher Manage');
$this->params['breadcrumbs'][] = $this->title;

$url = [
    'addFun' => [
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/basicinfo/teacher/create'],
    ],
//    'modifyFun' => [
//        'name' => '修改',
//        'icon' => 'fa fa-plus',
//        'url' => ['/basicinfo/teacher/update'],
//    ],
    'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/basicinfo/teacher/delete'],
    ],
//    'importFun' => [
//        'name' => '导入',
//        'icon' => 'fa fa-plus',
//        'url' => ['/basicinfo/teacher/create'],
//    ],
//    'printFun' => [
//        'name' => '打印',
//        'icon' => 'fa fa-plus',
//        'url' => ['/basicinfo/teacher/create'],
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
   /* [
        'attribute' => 'teacherID',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],*/ [
        'attribute' => 'code',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'name',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'attribute' => 'sex',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'value' => function($model){
            $Sex = new Teacher();
            if($Sex->nameSex($model->sex) == '1'){
                return '男';
            }else if($Sex->nameSex($model->sex) == '2'){
                return '女';
            }else{
                return '未知';
            }
        },
        'format' => 'raw',
       'filter' => Html::activeDropDownList($searchModel, 'sex',['1'=>'男','2'=>'女','3'=>'未知'], ['prompt'=>' ']),
    ],[
        'attribute' => 'departmentID',
       'value' => 'department.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
       'filter' => Html::activeDropDownList($searchModel, 'departmentID',Department::queryAllDepartment(),[
            'prompt' => ' '
        ]),
    ], [
        'attribute' => 'title',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'degree',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'value' => function($model){
            $DG = new Teacher();
            if($DG->nameDegree($model->degree) == '1'){
                return '博士';
           }else if($DG->nameDegree($model->degree) == '2'){
               return '硕士';
           }else if($DG->nameDegree($model->degree) == '3'){
               return '本科';
           }else{
                return '其他';
            }
        },
        'format' => 'raw',
       'filter' => Html::activeDropDownList($searchModel, 'degree',['1'=>'博士','2'=>'硕士','3'=>'本科','4'=>'其他'], ['prompt'=>' ']),
    ],/* [
        'attribute' => 'remark',
        'hAlign' => 'center',
        'vAlign' => 'middle',
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
