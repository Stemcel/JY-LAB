<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user_role}}".
 *
 * @property int $userRoleID
 * @property int $userID
 * @property int $roleID
 * @property string $remark 备注
 */
class UserRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userID', 'roleID'], 'required'],
            [['userID', 'roleID'], 'integer'],
            [['remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userRoleID' => Yii::t('app', 'User Role ID'),
            'userID' => Yii::t('app', 'User ID'),
            'roleID' => Yii::t('app', 'Role ID'),
            'remark' => Yii::t('app', 'Remark'),
        ];
    }

    public function getUser(){
        return UserRole::hasOne(User::className(), ["userID" => "userID"]);
    }

    /**
     * 批量删除
     * @return array
     * @throws \Exception
     */
    public function deleteBatch($ids,$moduleName) {
        if (count($ids) && $this->deleteAll(['in','userRoleID',$ids])) {
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }
}
