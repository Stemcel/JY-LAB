<?php

use app\models\Fee;
use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;
use app\models\AnnualBudget;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AllAnnualBudgetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'All Annual Budget Manage');
$this->params['breadcrumbs'][] = $this->title;
$url = [
    'addFun' => [
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/budget/all-annual-budget/create'],

    ],
    'modifyFun' => [
        'name' => '修改',
        'icon' => 'fa fa-plus',
        'url' => ['/budget/all-annual-budget/des'],
    ],
    'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/budget/all-annual-budget/delete'],
    ],
//    'importFun' => [
//        'name' => '导入',
//        'icon' => 'fa fa-plus',
//        'url' => ['/budget/annual-budget/import'],
//    ],
//    'printFun' => [
//        'name' => '打印',
//        'icon' => 'fa fa-plus',
//        'url' => ['/budget/annual-budget/create'],
//    ],
];
$content = UserFunction::queryFunctionRightsByUser($url);

$button = [
    'view' => function ($url) {
        return Html::a('<span class="glyphicon glyphicon-search"></span>',
            $url,
            ['title' => '查看']
        );
    },
   /* 'update' => function ($url) {
        return Html::a('<span>审核</span> ',
            $url, ['title' => '审核']);
    },*/
];
$templete = "{view} ";
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
        'attribute' => 'annualBudgetCode',
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
        'attribute' => 'years',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ], [
        'attribute' => 'feeID',
        'value' => 'fee.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'feeID',Fee::queryAllFee(),[
            'prompt' => ' '
        ]),
    ],/*  [
        'attribute' => 'purpose',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],*/[
        'attribute' => 'amount',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ], [
        'attribute' => 'approveAmount',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'useAmount',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ]/*,[
        'attribute' => 'handlerName',
        'value' => 'teacher.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'handlerName',Teacher::queryAllTeacher(),[
            'prompt' => ' '
        ]),
    ],[
        'attribute' => 'handlerDate',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'approver',
        'value' => 'teacher.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'approver',Teacher::queryAllTeacher(),[
            'prompt' => ' '
        ]),
    ],[
        'attribute' => 'approveDate',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ]*/,[
        'attribute' => 'type',
        'value' => function ($model) {
            $type = new AnnualBudget();
            if ($type->nameCNS($model->type) == '0') {
                return "正常";
            } else {
                return "追加";
            }
        },
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'type',['0' => '正常','1'=>'追加'], ['prompt'=>' ']),

    ],[
        'attribute' => 'status',
        'format' => 'raw',
        'value' => function ($model) {
            $sex = new AnnualBudget();
            if ($sex->nameCN($model->status) == 'NA') {
                return Html::tag("b","申请",["class" => 'red']);
            } elseif($sex->nameCN($model->status) == 'OP') {
                return Html::tag("b","批准",["class" => 'blue']);
            }else{
                return Html::tag("b","结束",["class" => 'red']);
            }
        },
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'status',['NA'=>'申请','OP' => '批准','CL'=>'结束'], ['prompt'=>' ']),

    ],[
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
    ],
]);

?>