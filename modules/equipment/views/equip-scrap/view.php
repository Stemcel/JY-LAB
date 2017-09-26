<?php

use app\widgets\SimpleDetailView;
/* @var $model app\models\EquipmentScrap */

$this->title = Yii::t('app', 'Detail Equipment Scrap');
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app','Equipment Scrap Manage'),
		'url' => ['index'],
	],
	$this->title,
];
$attributes = [
	[
		'columns' =>  [
			[
				'attribute' => 'equipmentID',
			],[
				'attribute' => 'brokerage',
//				'value' => $model['teacher']['name']
			]
		]
	],[
		'columns' =>  [
			[
				'attribute' => 'brokerageDate',
			],[
				'attribute' => 'description',
			]
		]
	],[
		'columns' =>  [
			[
				'attribute' => 'status',
				'value' => $model->status == 'CL'?'报废' : ($model->status == 'CR'?'报废再利用':'报失')
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
	'updateAction' => ['update', 'id' => $model->equipmentScrapID]
]);

?>