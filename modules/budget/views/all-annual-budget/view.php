<?php

use app\widgets\SimpleDetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AnnualBudget */
/* @var $searchModel app\models\search\FeeTypeSearch */

$this->title = Yii::t('app', 'Detail All Annual Budget');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'All Annual Budget Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$attributes = [
    [
        'columns' => [
            [
                'attribute' => 'annualBudgetCode',
            ]
        ]
    ], [
        'columns' => [
             [
                'attribute' => 'departmentID',
                 'value' => $model['department']['name']
            ], [
                'attribute' => 'years',
            ]
        ],
    ],[
        'columns' => [
             [
                'attribute' => 'feeID',
                 'value' => $model['fee']['name']
            ], [
                'attribute' => 'amount',
            ],
        ]
    ],[
        'columns' => [
            [
                'attribute' => 'approveAmount',
            ],[
                'attribute' => 'useAmount',

            ]
        ]
    ],[
        'columns' => [
            [
                'attribute' => 'handlerName',
                'value' => $model->teacherName($model->handlerName),

            ],[
                'attribute' => 'handlerDate',
            ]
        ]
    ],[
        'columns' => [
            [
                'attribute' => 'approver',
                'value' => $model->teacherName($model->approver)
            ],[
                'attribute' => 'approveDate',
            ]
        ]
    ],[
        'columns' => [
            [
                'attribute' => 'type',
                'value' => $model->type == '0'?'正常':'追加'
            ],[
                'attribute' => 'status',
                'value' => $model->status == 'OP'?'批准':($model->status == 'NA'?'申请':'结束')
            ]
        ]
    ],[
        'columns' => [
            [
                'attribute' => 'purpose',
                'format'=>['raw']
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
    'updateAction' => ['update', 'id' => $model->annualBudgetID]
]);

?>
