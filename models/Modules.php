<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%modules}}".
 *
 * @property int $moduleID
 * @property string $moduleCode 编号
 * @property string $name 名字
 * @property int $sort
 * @property string $remark 备注
 */
class Modules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%modules}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort'], 'integer'],
            [['moduleCode'], 'string', 'max' => 40],
            [['name', 'remark'], 'string', 'max' => 255],
            [['name','moduleCode'],'unique', 'message' => '{attribute}已存在'],
            [['name','moduleCode'],'required' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'moduleID' => Yii::t('app', 'Module ID'),
            'moduleCode' => Yii::t('app', 'Module Code'),
            'name' => Yii::t('app', 'Module Name'),
            'sort' => Yii::t('app', 'Sort'),
            'remark' => Yii::t('app', 'Module Remark'),
        ];
    }

    /**
     * 创建或更新一条记录
     * @return array
     */
    public function createOrUpdateOne($moduleName)
    {
        if ($this->isNewRecord) {
            $msg = '创建';
        } else {
            $msg = '更新';
        }
        if ($this->save(false)) {
            $log = new ActLog();
            $log->addLog($moduleName, $msg, $this->moduleID);
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
    public function deleteBatch($ids, $moduleName)
    {
        if (count($ids) && $this->deleteAll(['in', 'moduleID', $ids])) {
            $log = new ActLog();
            $log->addLog($moduleName, "删除", implode(",", $ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }

    /**
     * 获取模块
     * @param $user
     */
    public function getUserModule()
    {
        return Modules::hasMany(UserModule::className(), ["moduleID" => "moduleID"]);
    }

    public static function queryAllModules()
    {
        $model = Modules::find()->asArray()->all();
        // 已moduleID为key name为value
        $modules = array_combine(ArrayHelper::getColumn($model, "moduleID"),ArrayHelper::getColumn($model, "name"));
        return $modules;
    }

    /**
     * 根据User 查询权限的模块
     * @param $user
     */
    public static function queryModulesNamesByUser()
    {
        $model = Modules::find()->joinWith("userModule")
            ->where(['userID' => Yii::$app->user->identity->getId()])
            ->orderBy("sort asc")
            ->asArray()
            ->all();
        $moduleName = [];
        foreach ($model as $key => $value) {
            $moduleName[$value['moduleID']] = $value['name'];
        }
        return $moduleName;
    }

    /**
     * 根据User 查询默认有权限的模块
     * @param $user
     */
    public static function queryModulesNameByUser($key)
    {
        $model = self::queryModulesNamesByUser();
        if (sizeof($model) == 0) {
            return "无可操作模块";
        } else if ($key == "") {
            /** @var User $user */
            $user = Yii::$app->user->identity;
            $user->currentModule = array_keys($model)[0];
            $user->save();
            return current($model);
        } else {
            if (isset($model[$key])){
                return $model[$key];
            }
            return $model[0];
        }
    }
}
