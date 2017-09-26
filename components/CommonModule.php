<?php
/**
 * 基本通用的 module 方法
 */

namespace app\components;

use yii\base\Module;
use yii\filters\AccessControl;
use Yii;

class CommonModule extends Module
{
    public function behaviors() {
        return [
            /**
             * 访问控制
             * 需要登录
             */
            [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ],
            ]
        ];
    }

    public function init() {
        $this->layoutPath = '@app/views/layouts';
        parent::init();
    }

}