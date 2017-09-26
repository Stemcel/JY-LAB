<?php

use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;
use app\models\Teacher;
use app\models\FeeType;
use app\models\Fee;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\FeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Fee Manage');
$this->params['breadcrumbs'][] = $this->title;
$url = [
    'addFun' => [
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/budget/school-fees/create'],
    ],
//    'modifyFun' => [
//        'name' => '修改',
//        'icon' => 'fa fa-plus',
//        'url' => ['/budget/fee-type/update'],
//    ],
    'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/budget/school-fees/delete'],
    ],
//    'importFun' => [
//        'name' => '导入',
//        'icon' => 'fa fa-plus',
//        'url' => ['/budget/school-fees/import'],
//    ],
//    'printFun' => [
//        'name' => '打印',
//        'icon' => 'fa fa-plus',
//        'url' => ['/budget/school-fees/create'],
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
        'attribute' => 'feeTypeID',
        'value' => 'fee_type.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'feeTypeID',FeeType::queryAllFeeType(),[
            'prompt' => ' '
        ]),
    ],  [
        'attribute' => 'amount',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ], [
        'attribute' => 'userAmount',
        'hAlign' => 'center',
        'vAlign'=>'middle',
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
            $sex = new Fee();
            if ($sex->nameCN($model->status) == 'OP') {
                return Html::tag("b","批准",["class" => 'blue']);
            } else {
                return Html::tag("b","结束",["class" => 'red']);
            }
        },
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'status',['OP' => '批准','CL'=>'结束'], ['prompt'=>' ']),

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