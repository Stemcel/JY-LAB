<?php
use app\widgets\SimpleDetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Purchase */
/* @var $searchModel app\models\search\PurchaseSearch */

$this->title = Yii::t('app', 'Detail Purchase');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Purchase Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$attributes = [
    [
        'columns' => [
            [
                'attribute' => 'vendorID',
            ], [
                'attribute' => 'code',
            ]
        ],
    ],[
        'columns' => [
            [
                'attribute' => 'title',

            ], [
                'attribute' => 'amount',

            ],
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
//    'updateAction' => ['update', 'id' => $model->purchaseID]
]);
?>

