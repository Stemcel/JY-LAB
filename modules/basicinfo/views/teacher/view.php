<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Teacher */

$this->title = Yii::t('app', 'Detail Teacher');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Teacher Manage'),
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
                'attribute' => 'name',
            ],
        ],
    ],
    [
         'columns' => [
             [
                'attribute' => 'sex',
                'value' => $model->sex == '1'?'男':($model->sex == '2'?'女':'未知')
             ],[
                'attribute' => 'departmentID',
                'value' => $model['department']['name'],
             ],
         ],
     ],
    [
        'columns' => [
            [
                'attribute' => 'title',
            ], [
                'attribute' => 'degree',
                'value' => $model->degree == '1'?'博士':($model->degree == '2'?'硕士':($model->degree == '3'?'本科':'未知')),
            ],
        ]
    ],

    [
        'columns' => [
            [
                'attribute' => 'remark',
            ],[
                'attribute' => 'titleDate',
            ],
        ],
    ],
    [
        'columns' => [
            [
                'attribute' => 'status',
            ],[
                'attribute' => 'background',
            ],
        ],
     ],
    [
        'columns' =>[
            [
                'attribute' => 'backgroundDate',
            ],[
                'attribute' => 'backgroundSchool',
            ],
        ],
    ],
    [
        'columns' =>[
            [
                'attribute' => 'workDate',
            ], [
                'attribute' => 'teacherID',
            ],
        ],
    ],
];

echo SimpleDetailView::widget([
    'model' => $model,
    'attributes' => $attributes,
    'title' => $this->title,
    'type' => SimpleDetailView::TYPE_VIEW,
]);
?>
