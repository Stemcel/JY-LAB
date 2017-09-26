<?php

use app\models\Laboratory;
use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = Yii::t('app','Detail My Lab');
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app','My Lab Manage'),
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
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'manager',
				'value' => $model['teacher']['name']
			],[
				'attribute' => 'type',
				'value'=> $model->type == '0'?'教学':($model->type == '1'?'科研':'其他')
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'departmentID',
				'value' => $model['department']['name']
			],[
				'attribute' => 'createDate',
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'approveDate',
			],[
				'attribute' => 'buildDate',
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'phone',
			],[
				'attribute' => 'description',
				'format'=>['raw'],
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'budget',
			],[
				'attribute' => 'status',
				'value' => $model->status == 'OP'?'批准':($model->status == 'NA'?'申请':($model->status == 'RU'?'验收':'结束'))
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'remark',
				'format'=>['raw'],
			]
		]
	]
];

echo SimpleDetailView::widget([
	'model' => $model,
	'attributes' => $attributes,
	'title' => $this->title,
	'type' => SimpleDetailView::TYPE_VIEW,
	'updateAction' => ['update', 'id' => $model->laboratoryID]
]);

?>