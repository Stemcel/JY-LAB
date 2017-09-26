<?php

namespace app\controllers;

use app\models\forms\LoginForm;
use app\models\Modules;
use app\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

class SiteController extends Controller
{
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::className()
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'height' => 38,
                'minLength' => 4,
                'maxLength' => 5
            ],
        ];
    }

    public function actionIndex() {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }
        return $this->redirect(['/home']);
    }

    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main-login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->login()) {
            return $this->redirect(['index']);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->redirect(['login']);
    }

    public function actionChangeModule() {
        if (isset($_POST['hasEditable'])) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            /** @var User $user */
            $user = Yii::$app->user->getIdentity();
            $user->load(Yii::$app->request->post());
            if ($user->currentModule === "") {
                return ['output' => '', 'message' => '不存在该等级'];
            }
            $user->save(false);
            return ['output' => Modules::queryModulesNameByUser($user->currentModule), 'message' => ''];
        }
        throw new ForbiddenHttpException('非法访问');
    }
}
