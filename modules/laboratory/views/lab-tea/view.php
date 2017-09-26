<?php

use app\models\Laboratory;
use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = Yii::t('app','Detail LaboratoryTeacher');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app','LaboratoryTeacher Manage'),
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
                'attribute' => 'teacherID',
                'value' => $model['teacher']['name']
            ]
        ]
    ],[
        'columns' => [
            [
                'attribute' => 'type',
                'value'=> $model->type == '0'?'专职':($model->type == '1'?'兼职':'其他')
            ],[
                'attribute' => 'position',
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
    'updateAction' => ['update', 'id' => $model->laboratoryTeacherID]
]);

?>