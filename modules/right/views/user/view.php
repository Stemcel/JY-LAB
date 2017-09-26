<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = Yii::t('app', 'Detail User');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'User Manage'),
        'url' => ['index'],
    ],
    [
        'label' => $this->title,
    ]
];

$attributes = [
    [
        'columns' => [
            [
                'attribute' => 'userCode',
            ], [
                'attribute' => 'name',
                'value' =>$model['teacher']['name']
            ], [
                'attribute' => 'remark',
            ],
        ],
    ],
];

echo SimpleDetailView::widget([
    'model' => $model,
    'attributes' => $attributes,
    'title' => $this->title,
    'type' => SimpleDetailView::TYPE_VIEW,
    'updateAction' => ['update', 'id' => $model->userID]
]);

?>
