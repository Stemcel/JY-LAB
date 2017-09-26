<?php

use app\widgets\SimpleDetailView;
/* @var $model app\models\EquipmentTransfer */

$this->title = Yii::t('app', 'Detail Equipment Transfer');
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app','Equipment Transfer Manage'),
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
				'attribute' => 'brokerage',
//				'value' => $model['teacher']['name']
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'brokerageDate',
			],[
				'attribute' => 'oldLaboratoryID',
				'value' => $model->labName($model->oldLaboratoryID)
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'newLaboratoryID',
				'value' => $model->labName($model->newLaboratoryID)
			],[
				'attribute' => 'oldRoomID',
				'value' => $model->roomName($model->oldRoomID),
			]
		]
	],[
		'columns' => [
			[
				'attribute' => 'newRoomID',
				'value' => $model->roomName($model->newRoomID),
			],[
				'attribute' => 'description',
			],
		]
	],[
		'columns' => [
			[
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
	'updateAction' => ['update', 'id' => $model->equipmentTransferID]
]);

?>

