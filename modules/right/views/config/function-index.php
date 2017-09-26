<?php

use app\models\Functions;
use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use kartik\editable\Editable;
use yii\bootstrap\Modal;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $role \app\models\Roles */

$this->title = $role->name . Yii::t('app', 'Function Config');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Config Manage'),
        'url' => ['/right/config/index']
    ],
    $this->title,
];

$columns = [
    [
        'class' => '\app\components\CheckboxColumn',
        'rowSelectedClass' => 'success'
    ],
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'attribute' => 'functions.name',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'filter' => Html::activeTextInput($searchModel, 'functions_name', [
            'class' => 'form-control'
        ]),
    ], [
        'attribute' => 'functions.functionCode',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'filter' => Html::activeTextInput($searchModel, 'functions_functionCode', [
            'class' => 'form-control'
        ]),
    ], [
        'class' => 'kartik\grid\EditableColumn',
        'pageSummary' => true,
        // 可编辑单元格
        'editableOptions' => function () {
            return [
                'header' => '功能权限',
                'inputType' => Editable::INPUT_DROPDOWN_LIST,
                'data' => ["0" => "否", "1" => "是"],
                'size' => 'sm',
            ];
        },
        'attribute' => 'addFun',
        'value' => function ($data) {
            return Functions::queryFunCN($data->addFun);
        },
        'filter' => Html::activeDropDownList($searchModel, 'addFun', ["" => "", "0" => "否", "1" => "是"], [
            'class' => 'form-control'
        ]),
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'class' => 'kartik\grid\EditableColumn',
        'pageSummary' => true,
        // 可编辑单元格
        'editableOptions' => function () {
            return [
                'header' => '功能权限',
                'inputType' => Editable::INPUT_DROPDOWN_LIST,
                'data' => ["0" => "否", "1" => "是"],
                'size' => 'sm',
            ];
        },
        'attribute' => 'modifyFun',
        'value' => function ($data) {
            return Functions::queryFunCN($data->modifyFun);
        },
        'filter' => Html::activeDropDownList($searchModel, 'modifyFun', ["" => "", "0" => "否", "1" => "是"], [
            'class' => 'form-control'
        ]),
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'class' => 'kartik\grid\EditableColumn',
        'pageSummary' => true,
        // 可编辑单元格
        'editableOptions' => function () {
            return [
                'header' => '功能权限',
                'inputType' => Editable::INPUT_DROPDOWN_LIST,
                'data' => ["0" => "否", "1" => "是"],
                'size' => 'sm',
            ];
        },
        'attribute' => 'deleteFun',
        'value' => function ($data) {
            return Functions::queryFunCN($data->deleteFun);
        },
        'filter' => Html::activeDropDownList($searchModel, 'deleteFun', ["" => "", "0" => "否", "1" => "是"], [
            'class' => 'form-control'
        ]),
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'class' => 'kartik\grid\EditableColumn',
        'pageSummary' => true,
        // 可编辑单元格
        'editableOptions' => function () {
            return [
                'header' => '功能权限',
                'inputType' => Editable::INPUT_DROPDOWN_LIST,
                'data' => ["0" => "否", "1" => "是"],
                'size' => 'sm',
            ];
        },
        'attribute' => 'importFun',
        'value' => function ($data) {
            return Functions::queryFunCN($data->importFun);
        },
        'filter' => Html::activeDropDownList($searchModel, 'importFun', ["" => "", "0" => "否", "1" => "是"], [
            'class' => 'form-control'
        ]),
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'class' => 'kartik\grid\EditableColumn',
        'pageSummary' => true,
        // 可编辑单元格
        'editableOptions' => function () {
            return [
                'header' => '功能权限',
                'inputType' => Editable::INPUT_DROPDOWN_LIST,
                'data' => ["0" => "否", "1" => "是"],
                'size' => 'sm',
            ];
        },
        'attribute' => 'exportFun',
        'value' => function ($data) {
            return Functions::queryFunCN($data->exportFun);
        },
        'filter' => Html::activeDropDownList($searchModel, 'exportFun', ["" => "", "0" => "否", "1" => "是"], [
            'class' => 'form-control'
        ]),
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],
];

$url = [
    'addFun' => [
        'name' => '添加功能',
        'icon' => 'fa fa-plus',
        'url' => ['/right/config/add-function-index', 'id' => $role->roleID],
    ],
    'deleteFun' => [
        'name' => '移除功能',
        'icon' => 'fa fa-plus',
        'url' => ['/right/config/delete-function', 'roleID' => $role->roleID],
    ],
];
$content = UserFunction::queryFunctionRightsByUser($url);

echo SimpleDynaGrid::widget([
    'dynaGridId' => 'dy-right-function-index',
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
    ]
]);
?>


