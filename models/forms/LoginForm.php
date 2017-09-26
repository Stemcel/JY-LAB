<?php

namespace app\models\forms;

use Yii;
use app\models\User;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $verifyCode;
    public $rememberMe = true;

    public function rules() {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'string', 'min' => 5, 'max' => 50],
            [['password'], 'string', 'min' => 5, 'max' => 50],
            [['verifyCode'], 'captcha'],
            ['rememberMe', 'boolean'],
        ];
    }

    public function attributeLabels() {
        return [
            'username' => '用户名',
            'password' => '密码',
            'verifyCode' => '验证码',
            'rememberMe' => '记住我（一周）',
        ];
    }

    public function login() {
        $user = User::find()->where(['userCode' => $this->username])->one();
        if ($user) {
            if (!$user->validatePassword($this->password)) {
                $this->addError('password', '密码错误');
                return false;
            }
            $cookieTime = $this->rememberMe ? 3600 * 24 * 7 : 0;
            Yii::$app->user->login($user, $cookieTime);
            return true;
        } else {
            $this->addError('username', '用户不存在');
            return false;
        }
    }
}