<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Vendor */
/* @var $searchModel app\models\search\VendorSearch */

$this->title = Yii::t('app', 'Detail Vendor');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Vendor Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$attributes = [
    [
        'columns' => [
             [
                'attribute' => 'code',
            ], [
                'attribute' => 'name',
            ]
        ],
    ],[
        'columns' => [
             [
                'attribute' => 'password',
            ], [
                'attribute' => 'address',
            ],
        ]
    ],[
        'columns' => [
              [
                'attribute' => 'contacts',
            ],[
                'attribute' => 'phone',
            ]
        ]
    ],[
        'columns' => [
            [
                'attribute' => 'email',
            ],[
                'attribute' => 'fax',
            ]
        ]
    ],[
        'columns' => [
            [
                'attribute' => 'depositBank',
            ],[
                'attribute' => 'bankNumber',
            ]
        ]
    ],[
        'columns' => [
            [
                'attribute' => 'licenseNumber',
            ],[
                'attribute' => 'website',
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
    'updateAction' => ['update', 'id' => $model->vendorID]
]);

?>
