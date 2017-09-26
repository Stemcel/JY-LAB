<?php

use app\models\Laboratory;
use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = Yii::t('app','Detail Achievement');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app','Achievement Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$attributes = [
    [
        'columns' => [
            [
                'attribute' => 'name',
                'value' => $model['teacher']['name']
            ],[
                'attribute' => 'laboratoryID',
                'value' => $model['laboratory']['name']
            ]
        ]
    ],[
        'columns' => [
            [
                'attribute' => 'achieveDate',
            ],[
                'attribute' => 'type',
//                'value'=> $model->type == '0'?'教学':($model->type == '1'?'科研':'其他')
            ]
        ]
    ],[
        'columns' => [
            [
                'attribute' => 'level',
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
    'updateAction' => ['update', 'id' => $model->teacherAchievementID]
]);

?>