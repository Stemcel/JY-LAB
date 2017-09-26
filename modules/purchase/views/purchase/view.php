<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Purchase */
/* @var $searchModel app\models\search\MyPurchaseSearch */

$this->title = Yii::t('app', 'Detail Purchase');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Purchase Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$attributes = [
    [
        'columns' => [
             [
                'attribute' => 'title',
            ], [
                'attribute' => 'createDate',
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
                'attribute' => 'purchaseFile',
            ],[
                'attribute' => 'status',
                'value' => $model->status == 'OP'?'执行':($model->status == 'NA'?'初始':
                          ($model->status == 'PR'?'批准':'验收通过'))
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
    'updateAction' => ['update', 'id' => $model->purchaseID]
]);
?>

