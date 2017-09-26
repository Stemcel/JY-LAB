<?php

namespace app\models;

use app\functions\CommonFunctions;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%functions}}".
 *
 * @property int $functionID
 * @property int $moduleID
 * @property string $functionCode 编号
 * @property string $name 名字
 * @property string $icon 图标
 * @property string $url 页面路径
 * @property int $sort
 * @property string $remark 备注
 */
class Functions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%functions}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort','moduleID'], 'integer'],
            [['functionCode'], 'string', 'max' => 40],
            [['url'], 'required'],
            [['name'],'required' ],
            [['name', 'icon', 'url', 'remark'], 'string', 'max' => 255],
            [['name','functionCode','icon', 'url',],'unique', 'message' => '{attribute}已存在'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'functionID' => Yii::t('app', 'Function ID'),
            'functionCode' => Yii::t('app', 'Function Code'),
            'name' => Yii::t('app', 'Function Name'),
            'icon' => Yii::t('app', 'Icon'),
            'url' => Yii::t('app', 'Url'),
            'sort' => Yii::t('app', 'Sort'),
            'remark' => Yii::t('app', 'Function Remark'),
            'moduleID' => Yii::t('app', 'Module Function'),
        ];
    }

    public function getModule(){
        return Functions::hasOne(Modules::className(),["moduleID" => "moduleID"]);
    }

    public static function queryFunCN($id){
        if ($id == "1"){
            return "是";
        }
        return "否";
    }

    /**
     * 创建或更新一条记录
     * @return array
     */
    public function createOrUpdateOne($moduleName) {
        if ($this->isNewRecord) {
            $msg = '创建';
        } else {
            $msg = '更新';
        }
        if ($this->save(false)) {
            $log = new ActLog();
            $log->addLog($moduleName,$msg,$this->functionID);
            return ['type' => 'success', 'msg' => $msg . '成功'];
        } else {
            return ['type' => 'success', 'msg' => $msg . '失败'];
        }
    }

    /**
     * 批量删除
     * @return array
     * @throws \Exception
     */
    public function deleteBatch($ids,$moduleName) {
        if (count($ids) && $this->deleteAll(['in','functionID',$ids])) {
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }


    public static function queryUserFunctionByUser(){
        /** @var User $user */
        $user = Yii::$app->user->getIdentity();
        // 关联查询出所有有权限的function
        $model = UserFunction::find()->joinWith("function")
            ->where(['userID' => $user->userID])
            ->orderBy("sort asc")
            ->asArray()
            ->all();
        // 获取所有当前模块下的function
        $module = Functions::findAll(["ModuleID" => $user->currentModule]);
        // 获取所有的functionsID数组
        $moduleFunctionIDs = ArrayHelper::getColumn($module,"functionID");
        $functionMeum = [];
        $index = 0;
        // 填充菜单项
        foreach ($model as $key => $value){
            // 填充在此用户权限下，且在当前模块下的菜单
            if (in_array($value['function']['functionID'],$moduleFunctionIDs)){
                $functionMeum[$index]['label'] = $value['function']['name'];
                $functionMeum[$index]['url'] =array($value['function']['url']);
                $functionMeum[$index]['icon'] = $value['function']['icon'];
                $index++;
            }
        }
        return $functionMeum;
    }
}
