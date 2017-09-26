<?php

use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $role \app\models\Roles */

$this->title = Yii::t('app', 'Add UserRole');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Config Manage'),
        'url' => ['/right/config/index']
    ],[
        'label' => $role->name.Yii::t('app', 'User Config'),
        'url' => ['/right/config/user-config','id' => $role->roleID]
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
        'value' => 'teacher.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ], [
        'attribute' => 'userCode',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],
];

echo SimpleDynaGrid::widget([
    'dynaGridId' => 'dy-right-add-user-index',
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
                'data-url' => Url::to(['add-user','roleID' => $role->roleID])
            ])
        ],
    ]
]);
?>


