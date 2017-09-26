<?php
/* @var $this \yii\web\View */
/* @var $content string */
/* @var $directoryAsset string */

use yii\widgets\Breadcrumbs;
use kriss\beyond\widgets\Alert;

?>
<div class="page-content">
    <div class="page-header position-relative">
        <div class="page-breadcrumbs">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>
        <div class="header-buttons">
            <a class="sidebar-toggler" href="javascript:void(0);">
                <i class="fa fa-arrows-h"></i>
            </a>
            <a class="refresh" id="refresh-toggler" href="javascript:document.location.reload();">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
            <a class="fullscreen" id="fullscreen-toggler" href="javascript:void(0);">
                <i class="glyphicon glyphicon-fullscreen"></i>
            </a>
        </div>
    </div>
    <div class="page-body">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
