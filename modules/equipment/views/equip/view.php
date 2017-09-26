<?php

use app\widgets\SimpleDetailView;
/* @var $model app\models\Equipment */

$this->title = Yii::t('app', 'Detail Equipment');
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app', 'Equipment Manage'),
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
				'attribute' => 'modell',
			],[
				'attribute' => 'specification',
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'purchaseDate',
			],[
				'attribute' => 'feeSubject',
				'value' => $model->feeName($model->feeSubject)
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'teacherID',
				'value' => $model['teacher']['name']
			],[
				'attribute' => 'endDate',
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'checkPeriod',
			],[
				'attribute' => 'purchasePerson',
				'value' => $model['teacher']['name']
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'nation',
			],[
				'attribute' => 'sourceFrom',
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'feeCode',
				'value' => $model->feeTypeName($model->feeCode),
			],[
				'attribute' => 'price',
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'purpose',
			],[
				'attribute' => 'transptation',
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'foreignPrice',
			],[
				'attribute' => 'picture',
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'maker',
			],[
				'attribute' => 'makeDate',
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'makeCode',
			],[
				'attribute' => 'supplier',
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'description',
			],[
				'attribute' => 'departmentID',
				'value' => $model['department']['name']
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'user',
				'value' => $model['teacher']['name']
			],[
				'attribute' => 'managerID',
				'value' => $model['teacher']['name']
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'laboratoryID',
				'value' => $model['laboratory']['name']
			],[
				'attribute' => 'roomID',
				'value' => $model['room']['name']
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'status',
				'value' => $model->status == 'RU'?'运行':($model->status == 'CL'?'报废':($model->status == 'CR'?'报废再利用':($model->status == 'MISS'?'报失':'维修')))
			],[
				'attribute' => 'remark',
			]
		]
	],
];

echo SimpleDetailView::widget([
	'model' => $model,
	'attributes' => $attributes,
	'title' => $this->title,
	'type' => SimpleDetailView::TYPE_VIEW,
	'updateAction' => ['update', 'id' => $model->equipmentID]
]);

?>