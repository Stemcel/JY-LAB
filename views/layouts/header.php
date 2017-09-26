<?php
/* @var $this \yii\web\View */
/* @var $directoryAsset string */

use app\models\Modules;
use yii\helpers\Html;
use kartik\editable\Editable;
use yii\helpers\Url;

/** @var \app\models\User $user */
$user = Yii::$app->user->getIdentity();
$nickname = $user->userCode ?: $user->userCode;

?>

<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <div class="navbar-header pull-left">
                <a href="<?= Url::home() ?>" class="navbar-brand">
                    <small>
                        <?= Html::img($directoryAsset . '/img/logo.png', ['alt' => Yii::$app->name, 'title' => Yii::$app->name]) ?>
                    </small>
                </a>
            </div>
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <a href="javascript:history.back()" class="sidebar-collapse" id="sidebar-return">
                <i class="collapse-icon fa fa-angle-left"></i>返回
            </a>

            <div class="nav-bar-right pull-right">
                <?php
                $html = [];
                array_push($html,
                    Html::tag('div', '<i class="fa fa-user"></i> ' . $nickname, ['class' => 'user-info'])
                );
                array_push($html,
                    Html::tag('div', Editable::widget([
                        'model' => $user,
                        'attribute' => 'currentModule',
                        'displayValue' => '<i class="fa fa-flag"></i> ' . Modules::queryModulesNameByUser($user->currentModule),
                        'placement' => 'bottom',
                        'preHeader' => '<i class="glyphicon glyphicon-edit"></i> 切换',
                        'buttonsTemplate' => '{submit}',
                        'submitButton' => [
                            'label' => '切换',
                            'icon' => false,
                            'class' => 'btn btn-primary btn-sm',
                        ],
                        'showButtonLabels' => true,
                        'submitOnEnter' => false,
                        'formOptions' => [
                            'action' => ['/site/change-module']
                        ],
                        'inputType' => Editable::INPUT_DROPDOWN_LIST,
                        'data' => Modules::queryModulesNamesByUser(),
                        'pluginEvents' => [
                            "editableSuccess" => "function(event, val, form, data) { window.location.reload(); }",
                        ],
                    ]), ['class' => 'user-level-btn'])
                );
                array_push($html,
                    Html::tag('div', Html::a('<i class="fa fa-sign-out"></i> 退出登录', ['/site/logout'], ['data-method' => 'post']), ['class' => 'log-out'])
                );
                echo implode("\n", $html);
                ?>
            </div>
        </div>
    </div>
</div>

