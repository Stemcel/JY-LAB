<?php

use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use app\models\Student;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ClassesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Student Manage');
$this->params['breadcrumbs'][] = $this->title;

$url = [
	'addFun' => [
		'name' => '新增',
		'icon' => 'fa fa-plus',
		'url' => ['/basicinfo/student/create'],
	],
	/*'modifyFun' => [
		'name' => '修改',
		'icon' => 'fa fa-plus',
		'url' => ['/basicinfo/student/update'],
	],*/
	'deleteFun' => [
		'name' => '删除',
		'icon' => 'fa fa-plus',
		'url' => ['/basicinfo/student/delete'],
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
		$url, ['title' => '修改']);
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
		'attribute' => 'code',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	], [
		'attribute' => 'name',
		'hAlign' => 'center',
		'vAlign' => 'middle',
	], [
		'attribute' => 'sex',
		'hAlign' => 'center',
		'vAlign' => 'middle',
		'value' => function ($model) {
			$sex = new Student();

			if ($sex->nameCN($model->sex) == '1') {
				return "男";
			} elseif ($sex->nameCN($model->sex) == '2') {
				return "女";
			} else {
				return "其他";
			}
		},
		'format' => 'raw',
		'filter' => Html::activeDropDownList($searchModel, 'sex',['1' => '男','2'=>'女','0'=>'未知'], ['prompt'=>' ']),
	], [
		'label' => Yii::t('app', 'Classes.name'),
		'attribute' => 'classes_name',
		'value' => 'classes.name',
		'hAlign' => 'center',
		'vAlign' => 'middle',
		'filter' => Html::activeTextInput($searchModel, 'classes_name', [
			'class' => 'form-control'
		]),
	], [
		'attribute' => 'type',
		'hAlign' => 'center',
		'vAlign' => 'middle',
		'value' => function ($model) {
			$type = new Student();
			if ($type->nameTP($model->type) == '1') {
				return "博士";
			} elseif ($type->nameTP($model->type) == '2') {
				return "硕士";
			} elseif ($type->nameTP($model->type) == '3') {
				return "本科";
			} elseif ($type->nameTP($model->type) == '4') {
				return "大专";
			} else {
				return "其他";
			}
		},
		'filter' => Html::activeDropDownList($searchModel, 'type',['1' => '博士','2'=>'硕士','3'=>'本科','4'=>'大专','5'=>'其他'], ['prompt'=>' ']),
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
	'isDynagrid' => false,
	'isExport' => $content['canExport'],
	'extraToolbar' => [
		[
			'content' => $content['data']
		],
	],
]);

