<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\School */

$this->title = Yii::t('app', 'Detail School');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'School Manage'),
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
                'attribute' => 'remark',
            ],
        ],
    ]
];

echo SimpleDetailView::widget([
    'model' => $model,
    'attributes' => $attributes,
    'title' => $this->title,
    'type' => SimpleDetailView::TYPE_VIEW,
    'updateAction' => ['update', 'id' => $model->schoolID]
]);

?>
