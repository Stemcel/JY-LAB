<?php

use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $role \app\models\Roles */

$this->title = Yii::t('app', 'Add FunctionRole');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Config Manage'),
        'url' => ['/right/config/index']
    ],[
        'label' => $role->name.Yii::t('app', 'Function Config'),
        'url' => ['/right/config/function-config','id' => $role->roleID]
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
        'attribute' => 'name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ], [
        'attribute' => 'functionCode',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],
];

echo SimpleDynaGrid::widget([
    'dynaGridId' => 'dy-right-add-function-index',
    'columns' => $columns,
    'dataProvider' => $dataProvider,
    'searchModel' => $searchModel,
    'title' => $this->title,
    'isDynagrid' => false,
    'isExport' => false,
    'extraToolbar' => [
        [
            'content' => Html::button('<i class="fa fa-cloud-upload"></i>保存', [
                'class' => 'btn btn-default simple_check_operate',
                'data-type' => 'deleteFun',  // 为了可以多选暂时选用deleteFun
                'data-url' => Url::to(['add-function','roleID' => $role->roleID])
            ])
        ],
    ]
]);
?>


