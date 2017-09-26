<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\FeeType */
/* @var $searchModel app\models\search\FeeTypeSearch */

$this->title = Yii::t('app', 'Detail Fee');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Fee Manage'),
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
                'attribute' => 'feeTypeID',
                'value' => $model['fee_type']['name']
            ]
        ],
    ],[
        'columns' => [
             [
                'attribute' => 'amount',
            ], [
                'attribute' => 'userAmount',
            ],
        ]
    ],[
        'columns' => [
            [
                'attribute' => 'teacherID',
                'value' => $model['teacher']['name']
            ],[
                'attribute' => 'createDate',
            ]
        ]
    ],[
        'columns' => [
            [
                'attribute' => 'status',
                'value' => $model->status == 'OP'?'批准':'结束'
            ],[
                'attribute' => 'description',
            ]
        ]
    ],[
        'columns' => [
              [
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
