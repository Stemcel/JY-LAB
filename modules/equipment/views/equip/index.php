<?php

use app\models\UserFunction;
use yii\helpers\Html;
use app\models\Department;
use app\models\Teacher;
use app\models\Room;
use app\models\Equipment;
use app\widgets\SimpleDynaGrid;
use app\models\Laboratory;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EquipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app' , 'Equipment Manage');
$this->params['breadcrumbs'][] = $this->title;
$url = [
	'addFun'=>[
		'name' => '新增',
		'icon' => 'fa fa-plus',
		'url' => ['/equipment/equip/create'],
	],
//	 'modifyFun'=>[
//		 'name' => '修改',
//		 'icon' => 'fa fa-plus',
//		 'url' => ['/basicinfo/classes/update'],
//	 ],
	'deleteFun'=>[
		'name' => '删除',
		'icon' => 'fa fa-plus',
		'url' => ['/equipment/equip/delete'],
	],
//    'importFun' => [
//        'name' => '导入',
//        'icon' => 'fa fa-plus',
//        'url' => ['/right/user/create'],
//    ],
//    'printFun' => [
//        'name' => '打印',
//        'icon' => 'fa fa-plus',
//        'url' => ['/right/user/create'],
//    ],
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
	['class' => 'kartik\grid\SerialColumn'],[
		'attribute' => 'equipmentID',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	],[
		'attribute' => 'code',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	],[
		'attribute' => 'name',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	],[
		'attribute' => 'purchaseDate',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	],[
		'attribute' => 'checkPeriod',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	],[
		'attribute' => 'price',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	],[
		'attribute' => 'departmentID',
		'value' => 'department.name',
		'hAlign' => 'center',
		'vAlign'=>'middle',
		'filter' => Html::activeDropDownList($searchModel, 'departmentID',Department::queryAllDepartment(),[
			'prompt' => ' '
		]),
	],
//	[
//		'attribute' => 'managerID',
//		'value' => 'teacher.name',
//		'hAlign' => 'center',
//		'vAlign'=>'middle',
//		'filter' => Html::activeDropDownList($searchModel, 'managerID',Teacher::queryAllTeacher(),[
//			'prompt' => ' '
//		]),
//	],
	[
		'attribute' => 'laboratoryID',
		'value' => 'laboratory.name',
		'hAlign' => 'center',
		'vAlign'=>'middle',
		'filter' => Html::activeDropDownList($searchModel, 'laboratoryID',Laboratory::queryAllLaboratory1(),[
			'prompt' => ' '
		]),
	],[
		'attribute' => 'roomID',
		'value' => 'room.name',
		'hAlign' => 'center',
		'vAlign'=>'middle',
		'filter' => Html::activeDropDownList($searchModel, 'roomID',Room::queryAllRoom(),[
			'prompt' => ' '
		]),
	],[
		'attribute' => 'status',
		'format' => 'raw',
		'value' => function ($model) {
			$bk = new Equipment();
			if ($bk->nameBK($model->status) == 'RU') {
				return Html::tag("b","运行",["class" => 'red']);
			} elseif($bk->nameBK($model->status) == 'CL') {
				return Html::tag("b","报废",["class" => 'blue']);
			}elseif($bk->nameBK($model->status) == 'CR') {
				return Html::tag("b", "报废再利用", ["class" => 'blue']);
			}elseif($bk->nameBK($model->status) == 'RP') {
				return Html::tag("b", "维修", ["class" => 'blue']);
			}else{
				return Html::tag("b","报失",["class" => 'red']);
			}
		},
		'hAlign' => 'center',
		'vAlign'=>'middle',
		'filter' => Html::activeDropDownList($searchModel, 'status',['RU'=>'运行','CL' => '报废','CR'=>'报废再利用','RP'=>'维修','MISS'=>'报失'], ['prompt'=>' ']),

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