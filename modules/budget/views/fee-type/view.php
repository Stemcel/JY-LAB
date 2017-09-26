<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\FeeType */
/* @var $searchModel app\models\search\FeeTypeSearch */

$this->title = Yii::t('app', 'Detail FeeType');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'FeeType Manage'),
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
            ]
        ],
    ],[
        'columns' => [
             [
                'attribute' => 'departmentID',
                'value' => $model['department']['name']
            ], [
                'attribute' => 'teacherID',
                'value' => $model['teacher']['name']
            ],
        ]
    ],[
        'columns' => [
              [
                'attribute' => 'description',
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
    'updateAction' => ['update', 'id' => $model->feeTypeID]
]);

?>
