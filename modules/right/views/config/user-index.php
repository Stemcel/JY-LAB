<?php

use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $role \app\models\Roles */

$this->title = $role->name.Yii::t('app', 'User Config');
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
        'attribute' => 'user.name',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'filter' => Html::activeTextInput($searchModel, 'user_name', [
            'class' => 'form-control'
        ]),
    ], [
        'attribute' => 'user.userCode',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'filter' => Html::activeTextInput($searchModel, 'user_userCode', [
            'class' => 'form-control'
        ]),
    ], [
        'attribute' => 'user.remark',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'filter' => Html::activeTextInput($searchModel, 'user_remark', [
            'class' => 'form-control'
        ]),
    ],
];

$url = [
    'addFun' => [
        'name' => '添加人员',
        'icon' => 'fa fa-plus',
        'url' => ['/right/config/add-user-index','id' => $role->roleID],
    ],
    'deleteFun' => [
        'name' => '移除人员',
        'icon' => 'fa fa-plus',
        'url' => ['/right/config/delete-user','roleID' => $role->roleID],
    ],
];
$content = UserFunction::queryFunctionRightsByUser($url);

echo SimpleDynaGrid::widget([
    'dynaGridId' => 'dy-right-user-index',
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


