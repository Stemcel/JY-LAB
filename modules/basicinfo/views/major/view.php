<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Major */

$this->title = Yii::t('app', 'Detail Major');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Major Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$attributes = [
    [
        'columns' => [
            [
                'attribute' => 'majorID',
            ], [
                'attribute' => 'code',
            ]
        ],
    ],[
        'columns' => [
            [
                'attribute' => 'name',
            ], [
                'attribute' => 'englishName',
            ],
        ],
    ],[
        'columns' =>[
            [
                'attribute' => 'departmentID',
                'value' => $model['department']['name']
            ], [
                'attribute' => 'discipline',
            ],
        ]
    ],[
        'columns' =>[
            [
                'attribute' => 'isEnroll',
                'value' => $model->isEnroll=='Y'?'是':'否'
            ], [
                'attribute' => 'description',
            ],
        ]
    ],[
        'columns' =>[
            [
                'attribute' => 'remark',
            ],
        ]
    ]
];

echo SimpleDetailView::widget([
    'model' => $model,
    'attributes' => $attributes,
    'title' => $this->title,
    'type' => SimpleDetailView::TYPE_VIEW,
    'updateAction' => ['update', 'id' => $model->majorID]
]);

?>
