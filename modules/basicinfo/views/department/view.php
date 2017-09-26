<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = Yii::t('app', 'Detail Department');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Department Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$attributes = [
    [
        'columns' => [
            [
                'attribute' => 'name',
            ], [
                'attribute' => 'code',
            ],
        ]
    ], [
        'columns' => [
            [
                'attribute' => 'parentDepartmentID',
                'value' => $model->nameLa($model->parentDepartmentID)['name']
            ], [
                'attribute' => 'isLaboratory',
                'value' =>$model->isLaboratory = 'Y'? '是':'不是'
            ],
        ]
    ], [
        'columns' => [
            [
                'attribute' => 'remark',
            ],[
                'attribute' => 'remark',
            ]
        ]
    ]

];

echo SimpleDetailView::widget([
    'model' => $model,
    'attributes' => $attributes,
    'title' => $this->title,
    'type' => SimpleDetailView::TYPE_VIEW,
    'updateAction' => ['update', 'id' => $model->departmentID],
]);

?>
