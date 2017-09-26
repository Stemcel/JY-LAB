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
<div class="login-container animated fadeIn">
    <?= $content ?>
</div>
<footer class="footer"style="height: 135px;">
    <div class="container" style="padding-top: 50px;">
        <p class="text-align-center">
            版权所有：
            <?= Yii::$app->params['company'] ?>@<?= date('Y') ?> |
            <a href="<?= Yii::$app->params['copyRightUrl'] ?>"><?= Yii::$app->params['copyRight'] ?></a>
        </p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
