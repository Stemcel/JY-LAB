<?php

use app\models\Department;
use app\models\Purchase;
use app\models\Teacher;
use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PurchaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Purchase Manage');
$this->params['breadcrumbs'][] = $this->title;
$url = [
   /* 'addFun' => [
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/my-purchase/create'],

    ],*/
      'modifyFun' => [
          'name' => '修改',
          'icon' => 'fa fa-plus',
          'url' => ['/purchase/my-purchase/des'],
      ],
   /* 'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/my-purchase/delete'],
    ],*/
    /*    'importFun' => [
            'name' => '导入',
            'icon' => 'fa fa-plus',
            'url' => ['/purchase/my-purchase/import'],
        ],
        'printFun' => [
            'name' => '打印',
            'icon' => 'fa fa-plus',
            'url' => ['/purchase/my-purchase/create'],
        ],*/
];
$content = UserFunction::queryFunctionRightsByUser($url);
$mod = new Purchase();
$button = [
   /* 'detail' => function ($url) {
        return Html::a('<span> 查看明细</span>',
            $url, [
                'title' => '明细管理',
            ]);

    },*/
    'view' => function ($url) {
        return Html::a('<span class="btn btn-primary">查看</span>',
            $url,
            ['title' => '查看',
            ]

        );
    },
    'update' => function ($url) {
        return Html::a('<span class="btn btn-primary">批准</span>',
            $url, ['title' => '批准']);

    },
];
$templete = "{detail} {view} {update}";
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
        'attribute' => 'title',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'departmentID',
        'value' => 'department.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'departmentID',Department::queryAllDepartment(),[
            'prompt' => ' '
        ]),
    ],[
        'attribute' => 'teacherID',
        'value' => 'teacher.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'teacherID',Teacher::queryAllTeacher(),[
            'prompt' => ' '
        ]),
    ],[
        'attribute' => 'createDate',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'status',
        'format' => 'raw',
        'value' => function ($model) {
            $status = new Purchase();
            switch($status->nameCN($model->status)){
                case 'NA' : return Html::tag("b","初始",["class" => 'red']);break;
                case 'PR' : return Html::tag("b","批准",["class" => 'blue']);break;
                case 'OP' : return Html::tag("b","执行",["class" => 'blue']);break;
                default : return Html::tag("b","验收通过",["class" => 'blue']);break;
            }
        },
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'status',['NA'=>'申请','PR' => '批准','OP'=>'执行','CL'=>'验收通过'], ['prompt'=>' ']),

    ],[
        'class' => 'kartik\grid\ActionColumn',
        'header' => '操作',
        'template' => $templete,
        'buttons' => $button,
         'width' => '200px'
        ]

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