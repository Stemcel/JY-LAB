<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\PurchaseDetail */
/* @var $searchModel app\models\search\PurchaseDetailSearch */

$this->title = Yii::t('app', 'Detail PurchaseDetail');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'PurchaseDetail Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$attributes = [
    [
        'columns' => [
            [
                'attribute' => 'purchaseID',
                'value' => $model['purchase']['title']
            ], [
                'attribute' => 'status',
                'value' => $model->status == 'OP'?'执行':
                    ($model->status == 'NA'?'初始':
                        ($model->status == 'PR'?'批准':
                            ($model->status == 'NCL'?'验收未通过':
                                ($model->status == 'CL'?'验收通过':''))))
            ]
        ],
    ],
    [
        'columns' => [
             [
                'attribute' => 'annualBudgetID',
                 'value' => $model['annualBudget']['annualBudgetCode']
            ], [
                'attribute' => 'purchaseCatalogueID',
                'value' => $model['purchaseCatalogue']['name']
            ]
        ],
    ],[
        'columns' => [
            [
                'attribute' => 'description',
                'format' => 'raw'
            ], [
                'attribute' => 'specification',
                'format' => 'raw'
            ],
        ]
    ],[
        'columns' => [
            [
                'attribute' => 'quantity',
            ], [
                'attribute' => 'unit',
            ],
        ]
    ],[
        'columns' => [
            [
                'attribute' => 'price',
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
    'updateAction' => ['update', 'id' => $model->purchaseDetailID]
]);

?>
