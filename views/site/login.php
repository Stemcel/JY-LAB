<?php
/* @var $this yii\web\View */
/* @var $model \app\models\forms\LoginForm */

use yii\widgets\ActiveForm;
use kriss\beyond\helpers\Html;
use yii\captcha\Captcha;

$this->title = '用户登录';

?>
<div class="body">
<div class="login-header"style="width: 600px; height: 100px;margin-left: 15%;">

</div>

<div class="login-content" style="margin-top: 1%;">

    <div class="loginImg pull-left"   style="margin-left: 0%; width: 600px;height: 400px;"></div>
    <div class="loginbox pull-right bg-white">
        <div class="loginbox-title">
            <h4>登录</h4>
        </div>
        <?php $form = ActiveForm::begin([
            'fieldConfig' => [
                'template' => "{input}{error}",
            ],
        ]); ?>
        <div class="loginbox-textbox">
            <?= $form->field($model, 'username')->textInput(['placeholder' => '用户名']) ?>
        </div>
        <div class="loginbox-textbox">
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => '密码']) ?>
        </div>
        <div class="loginbox-textbox">
            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-sm-6">{image}</div><div class="col-sm-6">{input}</div></div>',
            ]); ?>
        </div>
        <div class="loginbox-submit">
            <input type="submit" class="btn btn-primary btn-block" value="登录">
        </div>
        <div class="loginbox-forgot">
            <?= Html::activeCheckbox($model, 'rememberMe') ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="clearfix"></div>
</div>
</div>