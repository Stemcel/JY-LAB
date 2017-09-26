<?php

namespace app\modules\right\controllers;

use app\models\ActLog;
use app\models\Functions;
use app\models\RoleFunction;
use app\models\search\FunctionSearch;
use app\models\search\RoleFunctionSearch;
use app\models\search\RoleSearch;
use app\models\search\UserRoleSearch;
use app\models\search\UserSearch;
use app\models\User;
use app\models\UserFunction;
use app\models\UserRole;
use Yii;
use app\models\Roles;
use yii\base\ErrorException;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Default controller for the `right` module
 */
class ConfigController extends Controller
{
    const MODULE_NAME = "权限配置";
    const MODULE_CHILD_NAME_USER = "用户角色配置";
    const MODULE_CHILD_NAME_Function = "用户功能配置";

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
     * 获取该权限下所有人员
     * @param $id
     * @return string
     */
    public function actionUserConfig($id)
    {
        $role = Roles::find()->where(['roleID' => $id])->one();
        $searchModel = new UserRoleSearch();
        $searchModel->roleID = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('user-index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'role' => $role
        ]);
    }

    /**
     * 获取该权限下所有功能
     * @param $id
     * @return string
     */
    public function actionFunctionConfig($id)
    {
        $role = Roles::find()->where(['roleID' => $id])->one();
        $searchModel = new RoleFunctionSearch();
        $searchModel->roleID = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // 异步单项修改
        // Check if there is an Editable ajax request
        if (Yii::$app->request->post('hasEditable')) {
            $id = Yii::$app->request->post('editableKey');

            $model = RoleFunction::findOne(['roleFunctionID' => $id]);
            $posted = current($_POST['RoleFunction']);
            $post = ['RoleFunction' => $posted];
            if ($model->load($post)) {
                $model->save();
                UserFunction::updateUserFunction($posted,$id);
                $value = Functions::queryFunCN($posted[$_POST['editableAttribute']]);
                return Json::encode(['output'=>$value, 'message'=>'']);
            }
            else {
                return Json::encode(['output'=>"", 'message'=>'']);
            }
        }

        return $this->render('function-index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'role' => $role
        ]);
    }

    /**
     * 获取所有非该权限下人员
     * @param $id
     * @return string
     */
    public function actionAddUserIndex($id)
    {
        $role = Roles::find()->where(['roleID' => $id])->one();
        // 获取所有已配有该权限的人
        $userRole = UserRole::find()->where(["roleID" => $id])->asArray()->all();

        $searchModel = new UserSearch();
        $searchModel->query = User::find()->where(['not in', 'userID', ArrayHelper::getColumn($userRole, "userID")]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('add-user-index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'role' => $role
        ]);
    }

    /**
     * 获取所有非该权限下功能
     * @param $id
     * @return string
     */
    public function actionAddFunctionIndex($id)
    {
        $role = Roles::find()->where(['roleID' => $id])->one();
        // 获取所有已配有该权限的功能
        $roleFunction = RoleFunction::find()->where(["roleID" => $id])->asArray()->all();

        $searchModel = new FunctionSearch();
        $searchModel->query = Functions::find()->where(['not in', 'functionID', ArrayHelper::getColumn($roleFunction, "functionID")]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('add-function-index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'role' => $role
        ]);
    }

    /**
     * 为角色配置人员
     * @param $id
     * @param $roleID
     * @return \yii\web\Response
     * @throws ErrorException
     */
    public function actionAddUser($id, $roleID)
    {
        $userRoles = UserRole::find()->where([
            'roleID' => $roleID
        ])->asArray()->all();

        // 前台勾选的人员ID数组
        $idsArr = explode(",", $id);
        // 所有该权限下人员的ID
        $userIDs = ArrayHelper::getColumn($userRoles, "userID");
        $ids = []; // 保存成功保存的ID
        try {
            foreach ($idsArr as $id) {
                if (in_array($id, $userIDs)) {
                    throw new ErrorException("该人员已有权限");
                } else {
                    // 插入
                    $userRole = new UserRole();
                    $userRole->roleID = $roleID;
                    $userRole->userID = $id;
                    $userRole->save();
                    UserFunction::insertUserFunctionByUser($id,$roleID);
                    array_push($ids, $id);
                }
            }
        } catch (Exception $e) {
        } finally {
            $actLog = new ActLog();
            $actLog->addLog(ConfigController::MODULE_CHILD_NAME_USER, "角色人员添加", implode(",", $ids));
            Yii::$app->session->setFlash("success", "成功添加" . count($ids) . "条");
            return $this->redirect(['user-config', "id" => $roleID]);
        }
    }

    /**
     * 为角色配置功能
     * @param $id
     * @param $roleID
     * @return \yii\web\Response
     * @throws ErrorException
     */
    public function actionAddFunction($id, $roleID)
    {
        $roleFunctions = RoleFunction::find()->where([
            'roleID' => $roleID
        ])->asArray()->all();

        // 前台勾选的人员ID数组
        $idsArr = explode(",", $id);
        // 所有该权限下人员的ID
        $functionIDs = ArrayHelper::getColumn($roleFunctions, "functionID");
        $ids = []; // 保存成功保存的ID
        try {
            foreach ($idsArr as $id) {
                if (in_array($id, $functionIDs)) {
                    throw new ErrorException("该功能已配置");
                } else {
                    // 插入
                    $roleFunction = new RoleFunction();
                    $roleFunction->roleID = $roleID;
                    $roleFunction->functionID = $id;
                    $roleFunction->addFun = 0;
                    $roleFunction->modifyFun = 0;
                    $roleFunction->deleteFun = 0;
                    $roleFunction->queryFun = 0;
                    $roleFunction->importFun = 0;
                    $roleFunction->exportFun = 0;
                    $roleFunction->printFun = 0;
                    $roleFunction->otherFun1 = 0;
                    $roleFunction->otherFun2 = 0;
                    $roleFunction->otherFun3 = 0;
                    $roleFunction->save(false);
                    UserFunction::insertUserFunctionByFunction($id,$roleID);
                    array_push($ids, $id);
                }
            }
        } catch (Exception $e) {
        } finally {
            $actLog = new ActLog();
            $actLog->addLog(ConfigController::MODULE_CHILD_NAME_Function, "角色功能添加", implode(",", $ids));
            Yii::$app->session->setFlash("success", "成功添加" . count($ids) . "条");
            return $this->redirect(['function-config', "id" => $roleID]);
        }
    }

    /**
     * 移除人员
     * @param $id
     * @param $roleID
     * @return \yii\web\Response
     */
    public function actionDeleteUser($id, $roleID)
    {
        $ids = explode(",", $id);// 前台传过来的要移除的userID
        $model = new UserRole();
        // 为了删除冗余表中的数据
        $userRole = UserRole::find()->where(['in','userRoleID',$ids])->asArray()->all();
        $userIDs = ArrayHelper::getColumn($userRole,"userID");

        $result = $model->deleteBatch($ids, ConfigController::MODULE_CHILD_NAME_USER);
        if ($result['type'] == "success"){
            UserFunction::removeUserFunctionByUser($userIDs,$roleID);
        }
        Yii::$app->session->setFlash($result['type'], $result['msg']);
        return $this->redirect(['user-config', "id" => $roleID]);
    }

    /**
     * 移除功能
     * @param $id
     * @param $roleID
     * @return \yii\web\Response
     */
    public function actionDeleteFunction($id, $roleID)
    {
        $ids = explode(",", $id);// 前台传过来的要移除的userID
        $model = new RoleFunction();
        // 为了删除冗余表中的数据
        $roleFunction = RoleFunction::find()->where(['in','roleFunctionID',$ids])->asArray()->all();
        $functionIDs = ArrayHelper::getColumn($roleFunction,"functionID");

        $result = $model->deleteBatch($ids, ConfigController::MODULE_CHILD_NAME_Function);
        if ($result['type'] == "success"){
            UserFunction::removeUserFunctionByFunction($functionIDs,$roleID);
        }
        Yii::$app->session->setFlash($result['type'], $result['msg']);
        return $this->redirect(['function-config', "id" => $roleID]);
    }
}
