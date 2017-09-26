<?php
use app\models\PurchaseCatalogue;
use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PurchaseCatalogueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'PurchaseCatalogue Manage');
$this->params['breadcrumbs'][] = $this->title;
$url = [
    'addFun' => [
        'name' => '添加第一级',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/purchase-catalogue/create'],

    ],
    /*  'modifyFun' => [
          'name' => '修改',
          'icon' => 'fa fa-plus',
          'url' => ['/purchase/purchase-catalogue/des'],
      ],*/
    'deleteFun' => [
        'name' => '删除',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/purchase-catalogue/delete'],
    ],
    /*    'importFun' => [
            'name' => '导入',
            'icon' => 'fa fa-plus',
            'url' => ['/purchase/purchase-catalogue/import'],
        ],
        'printFun' => [
            'name' => '打印',
            'icon' => 'fa fa-plus',
            'url' => ['/purchase/purchase-catalogue/create'],
        ],*/
];
$content = UserFunction::queryFunctionRightsByUser($url);
$button = [
    'createe' => function ($url) {
        return Html::a('<span class="btn btn-primary"> 添加下一级</span>',
            $url, [
                'title' => '修改',
            ]);

    },
    'view' => function ($url) {
        return Html::a('<span class="btn btn-primary">查看</span>',
            $url,
            ['title' => '查看',
            ]

        );
    },
    'update' => function ($url) {
        return Html::a('<span class="btn btn-primary">修改</span>',
            $url, ['title' => '修改']);

    },

];
$templete = "{createe} {view} {update} ";
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
        'vAlign'=>'middle',
    ],[
        'attribute' => 'name',
        'hAlign' => 'center',
        'vAlign'=>'middle',
    ],[
        'attribute' => 'isCollection',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'format' => 'raw',
        'value' => function ($model) {
            $isCollection = new PurchaseCatalogue();
            switch($isCollection->nameCN($model->isCollection)){
                case '1' : return Html::tag("b","√",["class" => 'blue']);break;
                default : return Html::tag("b","○",["class" => 'red']);break;
            }
        },
        'filter' => Html::activeDropDownList($searchModel, 'isCollection',['1'=>'√','0' => '○'], ['prompt'=>' ']),

    ],[
        'attribute' => 'type',
        'hAlign' => 'center',
        'vAlign'=>'middle',
        'format' => 'raw',
        'value' => function ($model) {
            $type = new PurchaseCatalogue();
            switch($type ->typeCN($model->type)){
            case '1' : return '1-政府集中采购';break;
            case '2' : return '2-部门集中采购';break;
            case '3' : return  '3-单位分散自行采购';break;
            case '4' : return  '4-单位分散委托代理采购';break;
            case '5' : return  '5-定点采购';break;
            default : return '6-协议供货';break;
            }
        },
        'filter' => Html::activeDropDownList($searchModel, 'isCollection',
                [
                    1 =>'1-政府集中采购',
                    2 =>'2-部门集中采购',
                    3 =>'3-单位分散自行采购',
                    4 =>'4-单位分散委托代理采购',
                    5 =>'5-定点采购',
                    6 =>'6-协议供货'
                ], ['prompt'=>' ']),


    ],[
        'class' => 'kartik\grid\ActionColumn',
        'header' => '操作',
        'template' => $templete,
        'buttons' => $button,
        'width' => '250px'
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


