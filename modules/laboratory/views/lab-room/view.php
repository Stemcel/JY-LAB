<?php

use app\models\Laboratory;
use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = Yii::t('app','Detail LaboratoryRoom');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app','LaboratoryRoom Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$attributes = [
    [
        'columns' => [
            [
                'attribute' => 'laboratoryID',
                'value' => $model['laboratory']['name']
            ],[
                'attribute' => 'roomID',
                'value' => $model['room']['name']
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
    'updateAction' => ['update', 'id' => $model->laboratoryRoomID]
]);

?>