<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;

/**
 * This is the model class for table "{{%user_function}}".
 *
 * @property int $userFunctionID
 * @property int $functionID
 * @property int $userID
 * @property string $addFun
 * @property string $modifyFun
 * @property string $deleteFun
 * @property string $queryFun
 * @property string $importFun
 * @property string $exportFun
 * @property string $printFun
 * @property string $otherFun1
 * @property string $otherFun2
 * @property string $otherFun3
 * @property string $remark
 */
class UserFunction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_function}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userFunctionID'], 'required'],
            [['userFunctionID', 'functionID', 'userID'], 'integer'],
            [['addFun', 'modifyFun', 'deleteFun', 'queryFun', 'importFun', 'exportFun', 'printFun', 'otherFun1', 'otherFun2', 'otherFun3'], 'string', 'max' => 1],
            [['remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userFunctionID' => Yii::t('app', 'User Function ID'),
            'functionID' => Yii::t('app', 'Function ID'),
            'userID' => Yii::t('app', 'User ID'),
            'addFun' => Yii::t('app', 'Add Fun'),
            'modifyFun' => Yii::t('app', 'Modify Fun'),
            'deleteFun' => Yii::t('app', 'Delete Fun'),
            'queryFun' => Yii::t('app', 'Query Fun'),
            'importFun' => Yii::t('app', 'Import Fun'),
            'exportFun' => Yii::t('app', 'Export Fun'),
            'printFun' => Yii::t('app', 'Print Fun'),
            'otherFun1' => Yii::t('app', 'Other Fun1'),
            'otherFun2' => Yii::t('app', 'Other Fun2'),
            'otherFun3' => Yii::t('app', 'Other Fun3'),
            'remark' => Yii::t('app', 'Remark'),
        ];
    }

    public function getFunction()
    {
        return UserFunction::hasOne(Functions::className(), ["functionID" => "functionID"]);
    }

    /**
     * 根据人员添加到userFunction表中
     * @param $id
     * @param $roleID
     */
    public static function insertUserFunctionByUser($id,$roleID){
        $roleFunction = RoleFunction::find()->where(['roleID' => $roleID])->asArray()->all();
        foreach ($roleFunction as $vale){
            $userFunction = new UserFunction();
            $userFunction->userID = $id;
            $userFunction->functionID = $vale['functionID'];
            $userFunction->addFun = $vale['addFun'];
            $userFunction->modifyFun = $vale['modifyFun'];
            $userFunction->deleteFun = $vale['deleteFun'];
            $userFunction->queryFun = $vale['queryFun'];
            $userFunction->importFun = $vale['importFun'];
            $userFunction->exportFun = $vale['exportFun'];
            $userFunction->printFun = $vale['printFun'];
            $userFunction->otherFun1 = $vale['otherFun1'];
            $userFunction->otherFun2 = $vale['otherFun2'];
            $userFunction->otherFun3 = $vale['otherFun3'];
            $userFunction->remark = $vale['remark'];
            $userFunction->save(false);
            UserModule::insertUserModule($id,$vale['functionID']);
        }
    }

    /**
     * 根据方法添加人员到UserFunction中
     * @param $id
     * @param $roleID
     */
    public static function insertUserFunctionByFunction($id,$roleID){
        $userRole = UserRole::find()->where(['roleID' => $roleID])->asArray()->all();
        foreach ($userRole as $value){
            $userFunction = new UserFunction();
            $userFunction->userID = $value['userID'];
            $userFunction->functionID = $id;
            $userFunction->addFun = 0;
            $userFunction->modifyFun = 0;
            $userFunction->deleteFun = 0;
            $userFunction->queryFun = 0;
            $userFunction->importFun = 0;
            $userFunction->exportFun = 0;
            $userFunction->printFun = 0;
            $userFunction->otherFun1 = 0;
            $userFunction->otherFun2 = 0;
            $userFunction->otherFun3 = 0;
            $userFunction->save(false);
            UserModule::insertUserModule($value['userID'],$id);
        }
    }

    /**
     * 根据人员把所有该角色下的冗余表中的相应的人员- - - - - - - - 方法删除
     * @param $ids
     * @param $roleID
     */
    public static function removeUserFunctionByUser($ids,$roleID){
        $roleFunction = RoleFunction::find()->where(['roleID' => $roleID])->asArray()->all();
        $functionIDs = ArrayHelper::getColumn($roleFunction,"functionID");
        foreach ($functionIDs as $functionID){
            UserFunction::deleteAll([
                'and',
                'functionID = :functionID',
                ['in','userID',$ids]
            ],[
                ':functionID' => $functionID
            ]);
        }
    }

    /**
     * 根据功能把所有该功能下的冗余表中的相应的人员- - - - - - - - 方法删除
     * @param $ids
     * @param $roleID
     */
    public static function removeUserFunctionByFunction($ids,$roleID){
        $userRole = UserRole::find()->where(['roleID' => $roleID])->asArray()->all();
        $userIDs = ArrayHelper::getColumn($userRole,"userID");
        foreach ($userIDs as $userID){
            UserFunction::deleteAll([
                'and',
                'userID = :userID',
                ['in','functionID',$ids]
            ],[
                ':userID' => $userID
            ]);
        }
    }

    /**
     * 异步需改具体的某一项增删改查的功能
     * @param $funArr
     */
    public static function updateUserFunction($funArr,$roleFunctionID){
        $roleFunction = RoleFunction::find()->where(['roleFunctionID' => $roleFunctionID])->asArray()->one();
        $users = UserRole::find()->where(['roleID' => $roleFunction['roleID']])->asArray()->all();
        foreach ($users as $user){
            $userFunction = UserFunction::find()->where(['userID' => $user['userID'],'functionID' => $roleFunction['functionID']])->one();
            foreach ($funArr as $k=> $v){
                $userFunction->$k = $v;
            }
            $userFunction->save(false);
        }
    }

    /**
     * 获取当前用户的增删改等权限
     * @param $urlArray
     * @return string
     */
    public static function queryFunctionRightsByUser($urlArray)
    {
        // 获取当前功能路径
        $url = "/" . Yii::$app->controller->module->id . "/" . Yii::$app->controller->id . "/";
        /** @var User $user */
        $user = Yii::$app->user->identity;
        // 存储列表上侧按钮列表
        $rightButton['data'] = "";
        // 是否显示导出按钮
        $rightButton['canExport'] = false;
        // 是否有修改权限
        $rightButton['canModify'] = false;
        $functions = Functions::find()->where(["like","url",$url."%",false])->one();
        if (!count($functions)) {
            return $rightButton;
        }
        $userRights = self::find()->where([
            "functionID" => $functions->functionID,
            "userID" => $user->userID
        ])->asArray()->one();
        if (isset($userRights["exportFun"]) && $userRights["exportFun"]) {
            $rightButton['canExport'] = true;
            unset($userRights["exportFun"]);
        }
        if (isset($userRights["modifyFun"]) && $userRights["modifyFun"]) {
            $rightButton['canModify'] = true;
        }
        foreach ($userRights as $key => $value) {
            if (isset($userRights[$key]) && $userRights[$key] && isset($urlArray[$key])) {
                $url = Url::to($urlArray[$key]['url']);
                if ($key == "modifyFun" || $key == "deleteFun"|| $key == "queryFun") {
                    $rightButton['data'] .= "<button type=\"button\" class=\"btn btn-default simple_check_operate\" data-type=" . $key . " data-url=" . $url . "><i class=\"" . $urlArray[$key]['icon'] . "\"></i>" . $urlArray[$key]['name'] . "</button>";
                } else {
                    $rightButton['data'] .= "<a class=\"btn btn-default\" href=" . $url . "><i class=\"" . $urlArray[$key]['icon'] . "\"></i>" . $urlArray[$key]['name'] . "</a>";
                }
            }
        }
        return $rightButton;
    }
}
