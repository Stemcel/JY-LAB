<?php

use app\models\AnnualBudget;
use app\models\PurchaseDetail;
use app\models\PurchaseCatalogue;
use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MyPurchaseDetailSearch */
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
        return Html::a('<span class="btn btn-primary">查看</span>',
            $url,
            ['title' => '查看',
            ]

        );
    },
    'update' => function ($url) {
        return Html::a('<span class="btn btn-primary">批准</span>',
            $url, ['title' => '批准']);

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
    /*[
        'attribute' => 'annualBudgetID',
        'value' => 'annualBudget.annualBudgetCode',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'annualBudgetID',AnnualBudget::queryAllAnnualBudget(),[
            'prompt' => ' '
        ]),
    ],*/
    [
        'attribute' => 'purchaseID',
        'value' => 'purchase.title',
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
    ]/*,[
        'attribute' => 'description',
        'format' => 'raw',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'specification',
        'format' => 'raw',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ]*/,[
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
        'attribute' => 'status',
        'format' => 'raw',
        'value' => function ($model) {
            $status = new PurchaseDetail();
            switch($status->nameCN($model->status)){
                case 'NA' : return Html::tag("b","初始",["class" => 'red']);break;
                case 'PR' : return Html::tag("b","批准",["class" => 'blue']);break;
                case 'OP' : return Html::tag("b","签约",["class" => 'blue']);break;
                case 'CL' : return Html::tag("b","验收通过",["class" => 'blue']);break;
                default : return Html::tag("b","验收未通过",["class" => 'yellow']);break;
            }
        },
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'filter' => Html::activeDropDownList($searchModel, 'status',['NA'=>'申请','PR' => '批准','OP'=>'签约','CL'=>'验收通过','NCL'=>'验收未通过'], ['prompt'=>' ']),

    ],[
        'class' => 'kartik\grid\ActionColumn',
        'header' => '操作',
        'template' => $templete,
        'buttons' => $button,
        'width' => '150px'
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