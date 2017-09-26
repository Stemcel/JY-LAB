<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Roles */

$this->title = Yii::t('app', 'Detail Role');
$this->params['breadcrumbs'] = [
    [
        'label' => Yii::t('app', 'Role Manage'),
        'url' => ['index'],
    ],
    $this->title,
];

$attributes = [
    [
        'columns' => [
            [
                'attribute' => 'name',
            ], [
                'attribute' => 'roleCode',
            ],[
                'attribute' => 'remark',
            ],
        ],
    ],
];

echo SimpleDetailView::widget([
    'model' => $model,
    'attributes' => $attributes,
    'title' => $this->title,
    'type' => SimpleDetailView::TYPE_VIEW,
    'updateAction' => ['update', 'id' => $model->roleID]
]);

?>
