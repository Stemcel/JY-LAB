<?php

use app\models\UserFunction;
use yii\helpers\Html;
use app\models\Teacher;
use app\models\EquipmentMaintain;
use app\widgets\SimpleDynaGrid;
use app\models\Equipment;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EquipApplySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app' , 'Equipment Apply Manage');
$this->params['breadcrumbs'][] = $this->title;
$url = [
	'addFun'=>[
		'name' => '新增',
		'icon' => 'fa fa-plus',
		'url' => ['/equipment/equip-apply/create'],
	],
	'deleteFun'=>[
		'name' => '删除',
		'icon' => 'fa fa-plus',
		'url' => ['/equipment/equip-apply/delete'],
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

	'update' => function ($url) {
		return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
			$url, [
				'title' => '修改'
			]
		);
	},
];

$templete = "{view} {update}";
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
//	 	'value' => 'equipment.code',
		'hAlign' => 'center',
		'vAlign' => 'middle',
//		'filter' => Html::activeDropDownList($searchModel, 'equipmentID',Equipment::queryAllEquipment(),[
//			'prompt' => ' '
//		]),
	],[
		'attribute' => 'applier',
		'hAlign' => 'center',
		'vAlign'=>'middle',
//		'filter' => Html::activeDropDownList($searchModel, 'applier',Teacher::queryAllTeacher(),[
//			'prompt' => ' '
//		]),
	],[
		'attribute' => 'applyDate',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	],[
		'attribute' => 'description',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	],/*[
		'attribute' => 'checker',
		'value' => 'teacher.name',
		'hAlign' => 'center',
		'vAlign'=>'middle',
		'filter' => Html::activeDropDownList($searchModel, 'checker',Teacher::queryAllTeacher(),[
			'prompt' => ' '
		]),
	],[
		'attribute' => 'checkDate',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	],*/
	[
		'attribute' => 'status',
		'format' => 'raw',
		'value' => function ($model) {
			$bk = new EquipmentMaintain();
			if ($bk->nameRP($model->status) == 'RP') {
				return Html::tag("b","维修",["class" => 'red']);
			}elseif($bk->nameRP($model->status) == 'CL'){
				return Html::tag("b","验收",["class" => 'blue']);
			}
		},
		'hAlign' => 'center',
		'vAlign'=>'middle',
		'filter' => Html::activeDropDownList($searchModel, 'status',['RP'=>'维修','CL' => '验收'], ['prompt'=>' ']),

	],[
		'attribute' => 'remark',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	],[
		'class' => 'kartik\grid\ActionColumn',
		'header' => '操作',
		'template' => $templete,
		'buttons' => $button
	],
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

