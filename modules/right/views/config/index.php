<?php

use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Config Manage');
$this->params['breadcrumbs'][] = $this->title;

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
        'attribute' => 'roleCode',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ], [
        'attribute' => 'remark',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'sort',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ], [
        'class' => 'kartik\grid\ActionColumn',
        'header' => '操作',
        'template' => '{user-config} {function-config}',
        'buttons' => [
            'user-config' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-user"></span>', $url, ['title' => '人员配置'] );
            },
            'function-config' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-cog"></span>', $url, ['title' => '功能配置'] );
            },
        ],
    ],
];

$url = [
];
$content = UserFunction::queryFunctionRightsByUser($url);

echo SimpleDynaGrid::widget([
    'dynaGridId' => 'dy-right-role-index',
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
    ]
]);
?>


