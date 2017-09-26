<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/kriss/yii2-beyond-admin-asset/assets');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?php //避免IE使用兼容模式?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php //默认使用webkit模式?>
    <meta name="renderer" content="webkit">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= $this->render('header.php', [
    'directoryAsset' => $directoryAsset
]) ?>

<div class="main-container container-fluid">
    <div class="page-container">
        <?= $this->render('left', [
            'directoryAsset' => $directoryAsset
        ]) ?>

        <?= $this->render('content', [
            'content' => $content,
            'directoryAsset' => $directoryAsset
        ]) ?>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="text-align-center">
            版权所有：
            <?= Yii::$app->params['company'] ?>@<?= date('Y') ?> |
            <a href="<?= Yii::$app->params['copyRightUrl'] ?>"><?= Yii::$app->params['copyRight'] ?></a>
        </p>
    </div>
</footer>
<div class="actGoTop hidden-xs"><a href="javascript:void(0);" title="返回顶部"><i class="fa fa-angle-up"></i></a></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
