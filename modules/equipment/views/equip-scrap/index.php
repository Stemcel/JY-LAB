<?php

use app\models\UserFunction;
use yii\helpers\Html;
use app\models\Teacher;
use app\models\EquipmentScrap;
use app\widgets\SimpleDynaGrid;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EquipmentScrapSearch*/
/* @var $dataProvider yii\data\ActiveDataProvider */
error_reporting(0);
$this->title = Yii::t('app' , 'Equipment Scrap Manage');
$this->params['breadcrumbs'][] = $this->title;
$url = [
	'addFun'=>[
		'name' => '新增',
		'icon' => 'fa fa-plus',
		'url' => ['/equipment/equip-scrap/create'],
	],
	'deleteFun'=>[
		'name' => '删除',
		'icon' => 'fa fa-plus',
		'url' => ['/equipment/equip-scrap/delete'],
	],
];
$content = UserFunction::queryFunctionRightsByUser($url);

$button = [
	'view' => function ($url) {
		return Html::a('<span class="glyphicon glyphicon-search"></span>',
			$url,
			[
				'title' => '查看',
			]
		);
	},

//	'update' => function ($url) {
//		return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
//			$url, [
//				'title' => '修改'
//			]
//		);
//	},
];

$templete = "{view}";
if($content['canModify'] == false){
	unset($button["update"]);
	$templete = "{view}";
}

$columns = [
	[
		'class' => '\app\components\CheckboxColumn',
		'rowSelectedClass' => 'success'
	],
	['class' => 'kartik\grid\SerialColumn'],
	[
		'attribute' => 'equipmentID',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	],[
		'attribute' => 'brokerage',
		'hAlign' => 'center',
		'vAlign'=>'middle',
//		'filter' => Html::activeDropDownList($searchModel, 'brokerage',Teacher::queryAllTeacher(),[
//			'prompt' => ' '
//		]),
	],[
		'attribute' => 'brokerageDate',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	],[
		'attribute' => 'description',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	],[
		'attribute' => 'status',
		'format' => 'raw',
		'value' => function ($model) {
			$es = new EquipmentScrap();
			if ($es->nameES($model->status) == 'CL') {
				return Html::tag("b","报废",["class" => 'red']);
			}if($es->nameES($model->status) == 'CR'){
				return Html::tag("b","报废再利用",["class" => 'blue']);
			}if($es->nameES($model->status) == 'MISS'){
				return Html::tag("b","报失",["class" => 'red']);
			}
		},
		'hAlign' => 'center',
		'vAlign'=>'middle',
		'filter' => Html::activeDropDownList($searchModel, 'status',['CL'=>'报废','CR' => '报废再利用','MISS' => '报失'], ['prompt'=>' ']),
	],[
		'attribute' => 'remark',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	],[

		'class' => 'kartik\grid\ActionColumn',
		'header' => '操作',
		'template' => $templete,
		'buttons' => $button
	]
];

echo SimpleDynaGrid::widget([
	'dynaGridId' => 'dy-right-module-index',
	'columns' => $columns,
	'dataProvider' => $dataProvider,
	'searchModel' => $searchModel,
	'title' => $this->title,
	'isDynagrid' => true,
	'isExport' => $content['canExport'],
	'extraToolbar' => [
		[
			'content' => $content['data']
		],
	],
]);
?>