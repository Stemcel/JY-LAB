<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/11 0011
 * Time: 13:54
 */

use app\models;
use app\widgets\SimpleDetailView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\classes */

$this->title = Yii::t('app', 'Detail Classes');
$this->params['breadcrumbs'] = [
	[
		'label' => Yii::t('app', 'Classes Manage'),
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
				'attribute' => 'name',
			]
	],
	],
	[
		'columns' => [
			[
				'attribute' => 'campusID',
				'value' => $model['campus']['name'],
			],[
				'attribute' => 'majorID',
				'value' => $model['major']['name'],
			]
		],
	],[
		'columns' => [
			[
				'attribute' => 'grade',
				'value' => $model->grade == '1'?'大一':($model->grade == '2'?'大二':($model->grade == '3'?'大三':($model->grade == '4'?'大四':($model->grade == '5'?'大五':'未知'))))
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
	'updateAction' => ['update', 'id' => $model->classesID]
]);

?>
