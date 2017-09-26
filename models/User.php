<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $userID 主键
 * @property string $userCode 编号
 * @property string $password 密码
 * @property string $name 姓名
 * @property string $remark 备注
 * @property string currentModule
 * @property string $auth_key
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','userCode', 'password'], 'required'],
            [['currentModule', 'name'], 'integer'],
            [['userCode'], 'string', 'max' => 40],
            [['password'], 'string', 'max' => 255],
            [['remark'], 'string', 'max' => 100],
            [['auth_key'], 'string', 'max' => 32],
            [['name','userCode'],'unique', 'message' => '{attribute}已存在'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userID' => Yii::t('app', 'User ID'),
            'userCode' => Yii::t('app', 'User Code'),
            'password' => Yii::t('app', 'Password'),
            'name' => Yii::t('app', 'User Name'),
            'remark' => Yii::t('app', 'User Remark'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'currentModule' => Yii::t('app', 'Current Module'),
        ];
    }
//表关联
    public function getTeacher()
    {
        return User::hasOne(Teacher::className(),
            [
                "teacherID" =>"name"
            ]);
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
        return $this->userID;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * 验证密码
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * 设定密码
     * @param $password
     * @throws \yii\base\Exception
     */
    public function setPassword($password) {
        $this->password = Yii::$app->security->generatePasswordHash($password);
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
        $log->addLog($moduleName,$msg,$this->userID);
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
        if (count($ids) && $this->deleteAll(['in','userID',$ids])) {
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }
}
