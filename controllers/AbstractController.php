<?php
/**
 * 抽象的控制层
 */

namespace app\controllers;

use yii\helpers\Url;
use yii\web\Controller;
use Yii;

abstract class AbstractController extends Controller
{
    /**
     * 记住当前地址
     * @param string $url
     * @param null $name
     */


    public function rememberUrl($url = '', $name = null) {
        Url::remember($url, $name);
    }

    /**
     * 操作完成后跳转，也可以直接发起请求
     * 如果是 ajax 请求，返回跳转地址
     * 否则直接重定向
     * @param null $name
     * @return string|\yii\web\Response
     */
    public function actionPreviousRedirect($name = null) {
        if (Yii::$app->request->isAjax && !Yii::$app->request->isPjax) {
            return Url::previous($name);
        } else {
            return $this->redirect(Url::previous($name));
        }
    }
}