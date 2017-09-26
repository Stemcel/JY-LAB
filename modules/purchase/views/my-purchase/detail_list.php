<?php

use app\models\AnnualBudget;
use app\models\PurchaseCatalogue;
use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PurchaseDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'PurchaseDetail Manage');
$this->params['breadcrumbs'][] = $this->title;
$url = [
    'addFun' => [
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/purchase-detail/create'],
    ],
    /*  'modifyFun' => [
          'name' => '修改',
          'icon' => 'fa fa-plus',
          'url' => ['/purchase/purchase-detail/des'],
      ],*/
    'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/purchase-detail/delete'],
    ],
    /*    'importFun' => [
            'name' => '导入',
            'icon' => 'fa fa-plus',
            'url' => ['/purchase/purchase-detail/import'],
        ],
        'printFun' => [
            'name' => '打印',
            'icon' => 'fa fa-plus',
            'url' => ['/purchase/purchase-detail/create'],
        ],*/
];
$content = UserFunction::queryFunctionRightsByUser($url);
$button = [
    'view' => function ($url) {
        return Html::a('<span class="glyphicon glyphicon-search"></span>',
            $url,
            ['title' => '查看',
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
        'attribute' => 'annualBudgetID',
        'value' => 'annualBudget.annualBudgetCode',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'annualBudgetID',AnnualBudget::queryAllAnnualBudget(),[
            'prompt' => ' '
        ]),
    ],[
        'attribute' => 'purchaseCatalogueID',
        'value' => 'purchaseCatalogue.name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'purchaseCatalogueID',PurchaseCatalogue::queryAllPurchaseCatalogue(),[
            'prompt' => ' '
        ]),
    ],[
        'attribute' => 'description',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'specification',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'unit',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'quantity',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'price',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'amount',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'amount',
        'hAlign' => 'center',
        'vAlign'=>'middle',
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