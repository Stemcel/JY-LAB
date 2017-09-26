<?php

use app\widgets\SimpleDetailView;
/* @var $model app\models\EquipmentMaintain */

$this->title = Yii::t('app', 'Detail Equipment Apply');
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app','Equipment Apply Manage'),
		'url' => ['index'],
	],
	$this->title,
];
$attributes = [
	[
		'columns' => [
			[
				'attribute' => 'equipmentID',
			],[
				'attribute' => 'applier',
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'applyDate',
			],[
				'attribute' => 'description',
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'status',
				'value' => $model->status == 'RP'?'维修' : '验收'
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
	'updateAction' => ['update', 'id' => $model->equipmentMaintainID]
]);

?>
