<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\PurchaseCatalogue */
/* @var $searchModel app\models\search\PurchaseCatalogueSearch */

$this->title = Yii::t('app', 'Detail PurchaseCatalogue');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'PurchaseCatalogue Manage'),
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
                'attribute' => 'parentCode',
                'value' => $model->nameLa($model->parentCode)['name']
            ]
        ],
    ],[
        'columns' => [
             [
                'attribute' => 'name',
            ], [
                'attribute' => 'type',
                'value' => $model->type = 1 ? '1-政府集中采购'
                            : ( $model->type = 2 ? '2-部门集中采购'
                            : ( $model->type = 3 ? '3-单位分散自行采购'
                            : ( $model->type = 4 ? '4-单位分散委托代理采购'
                            : ( $model->type = 5 ? '5-定点采购': '6-协议供货'
                             ))))
            ],
        ]
    ],[
        'columns' => [
              [
                'attribute' => 'description',
            ],[
                'attribute' => 'isCollection',
                'value' => $model->isCollection == '1'?'√': '○',
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
    'updateAction' => ['update', 'id' => $model->purchaseCatalogueID]
]);

?>
