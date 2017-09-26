<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "campus".
 *
 * @property int $campusID 自增，主键
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $remark
 */
class Campus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code','name'],'required'],
            [['name','code'],'unique', 'message' => '{attribute}已存在'],
            [['code','name'],'required' ],
            [['code'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 40],
            [['description'], 'string', 'max' => 400],
            [['remark'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'campusID' => Yii::t('app', 'Campus ID'),
            'code' => Yii::t('app', 'Campus Code'),
            'name' => Yii::t('app', 'Campus Name'),
            'description' => Yii::t('app', 'Description'),
            'remark' => Yii::t('app', 'Campus Remark'),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->campusID;
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
            $log->addLog($moduleName,$msg,$this->campusID);
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

        if (count($ids) && $this->deleteAll(['in','campusID',$ids])) {
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }



    /**
     * 获取模块
     * @param $user
     */

    public static function queryAllCampus()
    {
        $campus = Campus::find()->asArray()->all();
        // 已campusID为key name为value
        $modules = array_combine(ArrayHelper::getColumn($campus, "campusID"),ArrayHelper::getColumn($campus, "name"));
        return $modules;
    }




}
