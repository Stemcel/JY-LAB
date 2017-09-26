<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Building */

$this->title = Yii::t('app', 'Detail Building');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Building Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$attributes = [
    [
        'columns' => [
            [
                'attribute' => 'code',

            ], [
                'attribute' => 'name',

            ],
        ],
    ],
    [
        'columns' => [
            [
                'attribute' => 'campusID',
                'value' => $model['campus']['name'],

            ], [
                'attribute' => 'departmentID',
                'value' => $model['department']['name'],

            ],
        ]
    ],
    [
        'columns' => [
            [
                'attribute' => 'description',

            ], [
                'attribute' => 'remark',

            ],
        ]

    ],

];

echo SimpleDetailView::widget([
    'model' => $model,
    'attributes' => $attributes,
    'title' => $this->title,
    'type' => SimpleDetailView::TYPE_VIEW,
]);
?>
