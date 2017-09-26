<?php

use app\widgets\SimpleDetailView;
/* @var $model app\models\EquipmentMaintain */

$this->title = Yii::t('app', 'Detail Equipment Maintain');
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app','Equipment Maintain Manage'),
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
//				'value' => $model->teacherName($model->applier),
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
				'attribute' => 'checker',
//				'value' => $model->teacherName($model->checker),
			],[
				'attribute' => 'checkDate',
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

