<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Functions */

$this->title = Yii::t('app', 'Detail Function');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Function Manage'),
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
                'attribute' => 'functionCode',
            ],
        ],
    ], [
        'columns' => [
            [
                'attribute' => 'icon',
            ], [
                'attribute' => 'url',
            ],
        ],
    ], [
        'columns' => [
            [
                'attribute' => 'remark',
            ],[
                'attribute' => 'sort',
            ],
        ],
    ],
];

echo SimpleDetailView::widget([
    'model' => $model,
    'attributes' => $attributes,
    'title' => $this->title,
    'type' => SimpleDetailView::TYPE_VIEW,
    'updateAction' => ['update', 'id' => $model->functionID]
]);

?>
