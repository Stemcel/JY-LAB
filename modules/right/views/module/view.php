<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Modules */

$this->title = Yii::t('app', 'Detail Module');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Module Manage'),
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
                'attribute' => 'moduleCode',
            ],
        ],
    ], [
        'columns' => [
            [
                'attribute' => 'remark',
            ], [
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
    'updateAction' => ['update', 'id' => $model->moduleID]
]);

?>
