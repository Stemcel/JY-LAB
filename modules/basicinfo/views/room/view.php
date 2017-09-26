<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Room */
/* @var $searchModel app\models\search\RoomSearch */

$this->title = Yii::t('app', 'Detail Room');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Room Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$attributes = [
    [
        'columns' => [
             [
                'attribute' => 'code',
            ],[
                'attribute' => 'buildingID',
                'value' => $model['building']['name']
            ]
        ],
    ],[
        'columns' => [
              [
                'attribute' => 'name',
            ],[
                'attribute' => 'departmentID',
                'value' => $model['department']['name']
            ]
        ]
    ],[
        'columns' => [
              [
                'attribute' => 'type',
            ],[
                'attribute' => 'teacherID',
                'value' => $model['teacher']['name']
            ]
        ]
    ],[
        'columns' => [
              [
                'attribute' => 'useArea',
            ],[
                'attribute' => 'buildingArea',
            ],
        ]
    ],[
        'columns' => [
              [
                'attribute' => 'galleryful',
            ],[
                'attribute' => 'status',
                'value' => $model->status=='Y'?'是':'否',
            ],
        ]
    ],[
        'columns' =>[
              [
                'attribute' => 'application',
            ],[
                'attribute' => 'description',
            ]
        ]
    ],[
        'columns' =>[
              [
                'attribute' => 'remark',
            ],
        ]
    ]
];

echo SimpleDetailView::widget([
    'model' => $model,
    'attributes' => $attributes,
    'title' => $this->title,
    'type' => SimpleDetailView::TYPE_VIEW,
    'updateAction' => ['update', 'id' => $model->roomID]
]);

?>
