<?php
/** @var $this \yii\web\View */
/** @var $model \app\modules\teacher\models\UploadExcelForm */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use app\models\User;

$this->title = '导入用户信息';
$this->params['breadcrumbs'] = [
    [
        'label' => '用户信息列表',
        'url' => ['/right/user/index'],
    ],
    $this->title,
];
?>

<div class="well with-header">
    <div class="header bordered-<?= Yii::$app->params['color'] ?>">
        <p class="panel-title"><span class="fa fa-cloud-upload"></span> <?= $this->title ?></p>
    </div>
    <a href="<?= Url::to(['download']) ?>"
       class="btn btn-<?= Yii::$app->params['color'] ?> pull-right">用户信息导入模板下载</a>
    <div class="clearfix"></div>
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'excel')->widget(FileInput::className(), [
        'options' => [
            'accept' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel'
        ],
        'pluginOptions' => [
            'showUpload' => false,
            'showPreview' => false,
        ]
    ]) ?>

    <?= Html::a('取消返回', Yii::$app->request->referrer, ['class' => 'btn btn-default']) ?>
    <?= Html::submitButton('确认上传', ['class' => 'btn btn-' . Yii::$app->params['color']]) ?>

    <?php ActiveForm::end() ?>
    <p>&nbsp;</p>
    <div class="alert alert-info">
        <p>导入说明：</p>
        <?php
/*        $usedLevels = Level::getUsedLevels();
        $types = [
            User::TYPE_STUDENT => '学生',
            User::TYPE_TEACHER => '老师',
        ];
        $usedLevelsArr = [];
        $usedTypesArr = [];
        foreach ($usedLevels as $levelID => $levelName) {
            array_push($usedLevelsArr, '&nbsp;&nbsp;&nbsp;&nbsp;' . $levelID . ' => ' . $levelName);
        }
        foreach ($types as $typeID => $typeName) {
            array_push($usedTypesArr, '&nbsp;&nbsp;&nbsp;&nbsp;' . $typeID . ' => ' . $typeName);
        }
        $messages = [
            '请下载使用右上角的导入模板进行导入',
            '请不要修改模板的第一栏的标题信息，按照模板的标题对应填写Excel',
            '序号列在出现导入错误时使用，请填写不重复递增编号',
            '用户名、密码、等级为必填项，其余的为选填',
            '用户名只可包含字母和数字',
            '等级请参照以下对应关系的填写（编号=>名称，Excel中只需要填写编号）：<br>' . implode('<br>', $usedLevelsArr),
            '身份请参照以下对应关系的填写（编号=>身份，Excel中只需要填写编号）：<br>' . implode('<br>', $usedTypesArr),
            '导入前请使用Excel中的“清除格式”功能将格式清除，避免未知的导入出错',
            'Excel中的sheet页有且只能存在一个（使用 WPS 的用户注意，WPS会默认创建三个sheet页）',
        ];
        foreach ($messages as $i => $message) {
            echo Html::tag('p', ($i + 1) . '、' . $message);
        }
        */?>
    </div>
</div>

