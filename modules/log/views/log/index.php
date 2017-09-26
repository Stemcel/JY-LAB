<?php

use app\models\UserFunction;
use app\models\Teacher;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','Log Manage');
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    [
        'class'=>'\app\components\CheckboxColumn',
        'rowSelectedClass'=>'success'
    ],
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'attribute' => 'name',
        'value' => 'teacher.name',
//        'value' => function ($model) {
//            return Html::a($model->name, ['basicinfo/teacher/view','id' => $model->id], ['target' => '_blank']);
//
//        },
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'name',Teacher::queryAllTeachernn(),[
            'prompt' => ' '
        ])
    ],[
        'attribute'=>'moduleName',
        'hAlign'=>'center',
        'vAlign' => 'middle',
    ],[
        'attribute'=>'id',
        'hAlign'=>'center',
        'vAlign' => 'middle',
    ],[
        'attribute'=>'functionName',
        'hAlign'=>'center',
        'vAlign' => 'middle',
    ],[
        'attribute'=>'date',
        'hAlign'=>'center',
        'vAlign' => 'middle',
    ],
];

$url = [
    'queryFun'=>[
        'name'=>'查看',
        'icon'=>'fa fa-plus',
        'url'=>['/log/log/view'],
    ],
];

$content = UserFunction::queryFunctionRightsByUser($url);

echo \app\widgets\SimpleDynaGrid::widget([
    'dynaGridId'=>'dy-right-actlog-index',
    'columns'=>$columns,
    'dataProvider'=>$dataProvider,
    'searchModel'=>$searchModel,
    'title'=>$this->title,
    'isDynagrid' => false,
    'isExport' => $content['canExport'],
    'extraToolbar' => [
        [
            'content' => $content['data']
        ],
    ]
]);
?>













