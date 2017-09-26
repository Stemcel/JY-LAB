<?php

namespace app\modules\right\controllers;

use app\models\RoleFunction;
use app\models\search\RoleSearch;
use app\models\UserRole;
use Yii;
use app\models\Roles;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `right` module
 */
class RoleController extends Controller
{
    const MODULE_NAME = "角色管理";
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RoleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Roles model.
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
     * Creates a new Roles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Roles();

        if ($model->load(Yii::$app->request->post())) {
//            $model->roleCode = "001";
            $result = $model->createOrUpdateOne(RoleController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index', 'id' => $model->roleID]);
        } else {
            return $this->render('create-update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Roles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $result = $model->createOrUpdateOne(RoleController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index', 'id' => $model->roleID]);
        } else {
            return $this->render('create-update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Roles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $errorStr = "";
        $model = new Roles();
        $roleIdsArr =  explode(",",$id);
        foreach ($roleIdsArr as $roleID){
            $roleFunctionSize = RoleFunction::find()->where(['roleID' => $roleID])->count();
            $userRole = UserRole::find()->where(['roleID' => $roleID])->count();
            // 如果功能在已配置权限，则无法删除
            if ($roleFunctionSize || $userRole){
                unset($roleIdsArr[array_search($roleID,$roleIdsArr)]);
                $errorStr .= ",".Roles::find()->where(['roleID' => $roleID])->asArray()->one()['name'];
            }
        }
        $result = $model->deleteBatch($roleIdsArr,RoleController::MODULE_NAME);
        if (!$errorStr == ""){
            $errorStr .= "删除失败，该角色已分配人员或功能";
        }
        Yii::$app->session->setFlash($result['type'], $result['msg'] .$errorStr);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Roles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Roles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Roles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
