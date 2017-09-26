<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Campus */

$this->title = Yii::t('app', 'Detail Campus');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Campus Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$attributes = [
    [
        'columns' => [
             [
                'attribute' => 'name',
            ],[
                'attribute' => 'code',
            ]
        ],
    ],[
        'columns' => [
            [
                'attribute' => 'description',
            ],[
                'attribute' => 'remark',
            ]
        ],
    ]
];

echo SimpleDetailView::widget([
    'model' => $model,
    'attributes' => $attributes,
    'title' => $this->title,
    'type' => SimpleDetailView::TYPE_VIEW,
    'updateAction' => ['update', 'id' => $model->campusID]
]);

?>
