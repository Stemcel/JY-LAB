<?php
/* @var $this \yii\web\View */
use app\models\Functions;

/* @var $directoryAsset string */

/** @var \app\models\User $user */
$user = Yii::$app->user->getIdentity();
?>

<div class="page-sidebar" id="sidebar">
    <div class="sidebar-header-wrapper">
        <i class="searchicon"></i>
        <div class="searchhelper"></div>
    </div>
    <?= kriss\beyond\widgets\Menu::widget([
        'options' => ['class' => 'nav sidebar-menu'],
        'items' => Functions::queryUserFunctionByUser()
    ]) ;
    ?>
</div>
