<?php

use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models;

/* @var $this yii\web\View */
/* @var $model app\models\School */

$this->title = Yii::t('app', 'Detail Student');
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app', 'Student Manage'),
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
				'attribute' => 'password',
			],
	],
	],
	[
		'columns' => [
			[
				'attribute' => 'name',
			],[
				'attribute' => 'sex',
				'value' => $model->sex == '1'?'男':($model->sex == '2'?'女':'未知')
			],
	],
	],
	[
		'columns' =>[
			[
//				'label' => Yii::t('app', 'Classes.name'),
				'attribute' => 'classesID',
				'value' => $model['classes']['name'],
			],[
				'attribute' => 'type',
				'value' => $model->type == '1'?'博士':($model->degree == '2'?'硕士':($model->degree == '3'?'本科':'未知'))
		],
	],
	],
	[
		'columns' =>[
			[
				'attribute' => 'status',
			],[
				'attribute' => 'email',
			],
	],
	],
	[
		'columns' =>[
			[
				'attribute' => 'phone',
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
	'updateAction' => ['update', 'id' => $model->studentID]
]);

?>
