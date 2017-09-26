<?php

use app\models\UserFunction;
use yii\helpers\html;
use app\models\Teacher;
use app\models\Laboratory;
use app\models\Room;
use app\widgets\SimpleDynaGrid;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EquipmentTransferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','Equipment Transfer Manage');
$this->params['breadcrumbs'][] = $this->title;
$url = [
    'addFun'=>[
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/equipment/equip-transfer/create'],
    ],
    /* 'modifyFun'=>[
		 'name' => '修改',
		 'icon' => 'fa fa-plus',
		 'url' => ['/basicinfo/classes/update'],
	 ],*/
    'deleteFun'=>[
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/equipment/equip-transfer/delete'],
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
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'attribute' => 'equipmentID',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'brokerage',
//        'value' => 'teacher.name',
        'hAlign' => 'center',
        'vAlign' => 'middle',
//        'filter' => Html::activeDropDownList($searchModel, 'brokerage',Teacher::queryAllTeacher(),[
//            'prompt' => ' '
//        ]),
    ],[
        'attribute' => 'brokerageDate',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'newLaboratoryID',
        'value' => 'laboratory.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'newLaboratoryID',Laboratory::queryAllLaboratory(),[
            'prompt' => ' '
        ]),
    ],[
        'attribute' => 'newRoomID',
        'value' => 'room.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'newRoomID',Room::queryAllRoom(),[
            'prompt' => ' '
        ]),
    ], [
        'attribute' => 'description',
        'hAlign' => 'center',
        'vAlign' => 'middle',
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