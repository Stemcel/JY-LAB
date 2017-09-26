<?php
use app\models\UserFunction;
use app\widgets\SimpleDynaGrid;
use yii\helpers\Html;
use app\widgets\SimpleDetailView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\FunctionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '合同明细');
$this->params['breadcrumbs'][] = $this->title;

$url = [
    'addFun' => [
        'name' => '新增',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/contract/create-detail','id' => $model->contractID],
    ],
    'modifyFun' => [
        'name' => '修改',
        'icon' => 'fa fa-plus',
        'url' => ['/purchase/contract/update-detail'],
    ],
//    'deleteFun' => [
//        'name' => '删除',
//        'icon' => 'fa fa-plus',
//        'url' => ['/purchase/contract/delete-detail'],
//    ],
//    'importFun' => [
//        'name' => '导入',
//        'icon' => 'fa fa-plus',
//        'url' => ['/purchase/contract/create'],
//    ],
//    'printFun' => [
//        'name' => '打印',
//        'icon' => 'fa fa-plus',
//        'url' => ['/purchase/contract/create'],
//    ],
];

$content = UserFunction::queryFunctionRightsByUser($url);
$button = [
    'view' => function ($url) {
        return Html::a('<span class=""></span>',
            $url,
            ['title' => '查看',]);
    },
    'update-detail' => function ($url) {
        return Html::a('<span class="">审核</span>',
            $url, ['title' => '修改']);
    },
];
$templete = "{view} {update-detail}";
if ($content['canModify'] == false) {
    unset($button["update-detail"]);
    $templete = "{view}";
}

$columns = [
    [
        'class' => '\app\components\CheckboxColumn',
        'rowSelectedClass' => 'success'
    ],
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'attribute' => 'purchaseDetailID',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'attribute' => 'annualBudgetID',
        'value' => 'annualBudget.annualBudgetCode',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'filter' => Html::activeDropDownList($searchModel, 'annualBudgetID', \app\models\AnnualBudget::queryAllAnnualBudget(), [
            'prompt' => ' '
        ]),
    ], [
        'attribute' => 'purchaseCatalogueID',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'description',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'specification',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'attribute' => 'quantity',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'unit',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'attribute' => 'price',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'amount',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'deliveryTime',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ], [
        'attribute' => 'checkTime',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'checkTeacher',
       'value' => 'teacher.name',
        'hAlign' => 'center',
        'vAlign' => 'middle',
        'filter' => Html::activeDropDownList($searchModel, 'checkTeacher', \app\models\Teacher::queryAllTeacher() , [
            'prompt' => ' '
        ]),
    ], [
        'attribute' => 'closeTime',
        'hAlign' => 'center',
        'vAlign' => 'middle',
    ],[
        'attribute' => 'status',
        'format' => 'raw',
        'value' => function ($model) {
            $status = new \app\models\ContractDetail();
            switch($status->nameCN($model->status)){
                case 'OP' : return Html::tag("b","签约",["class" => 'blue']);break;
                case 'DE' : return Html::tag("b","交货",["class" => 'blue']);break;
                case 'CL' : return Html::tag("b","验收通过",["class" => 'red']);break;
                default : return Html::tag("b","验收未通过",["class" => 'red']);break;
            }
        },
        'hAlign' => 'center',
        'vAlign'=>'middle',
         'filter' => Html::activeDropDownList($searchModel, 'status',['OP' => '执行','DE'=>'交货','CL'=>'验收通过','NCL'=>'验收未通过'], ['prompt'=>' ']),

    ],  [
        'class' => 'kartik\grid\ActionColumn',
        'header' => '操作',
        'template' => $templete,
        'buttons' => $button
    ],
];

echo SimpleDynaGrid::widget([
    'dynaGridId' => 'dy-right-functions-index',
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
    ]
]);
?>
