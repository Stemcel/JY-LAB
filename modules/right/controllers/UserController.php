<?php

namespace app\modules\right\controllers;

use app\models\search\UserSearch;
use app\models\UserFunction;
use Yii;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `right` module
 */
class UserController extends Controller
{
    const MODULE_NAME = "人员管理";
    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {
            $model->setPassword($model->password);
//            $model->userCode = "001";
            $result = $model->createOrUpdateOne(UserController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index', 'id' => $model->userID]);
        } else {
            return $this->render('create-update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $result = $model->createOrUpdateOne(UserController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index', 'id' => $model->userID]);
        } else {
            return $this->render('create-update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $errorStr = "";
        $model = new User();
        $userIdsArr =  explode(",",$id);
        foreach ($userIdsArr as $userId){
            $userFunctionSize = UserFunction::find()->where(['userID' => $userId])->count();
            // 如果人员在已配置权限，则无法删除
            if ($userFunctionSize){
                unset($userIdsArr[array_search($userId,$userIdsArr)]);
                $errorStr .= ",".User::find()->where(['userID' => $userId])->asArray()->one()['name'];
            }
        }
        $result = $model->deleteBatch($userIdsArr,UserController::MODULE_NAME);
        if (!$errorStr == ""){
            $errorStr .= "删除失败，已分配权限";
        }
        Yii::$app->session->setFlash($result['type'], $result['msg'] .$errorStr);
        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id))!== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}