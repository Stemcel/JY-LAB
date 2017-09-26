<?php

namespace app\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property int $vendorID
 * @property string $code 编码
 * @property string $password
 * @property string $name 名称
 * @property string $address
 * @property string $contacts 联系人
 * @property string $email
 * @property string $phone
 * @property string $fax 传真
 * @property string $depositBank 开户银行
 * @property string $bankNumber 银行账号
 * @property string $licenseNumber 营业执照编号
 * @property string $website 主页
 * @property string $remark
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'password', 'name', 'contacts', 'remark'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 200],
            [['email', 'depositBank', 'bankNumber', 'licenseNumber', 'website'], 'string', 'max' => 40],
            [['phone', 'fax'], 'string', 'max' => 20],
            [['code', 'password','name','email','phone'],'required'],
            [['email'],'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vendorID' => Yii::t('app', 'Vendor ID'),
            'code' => Yii::t('app', 'Vendor Code'),
            'password' => Yii::t('app', 'Password'),
            'name' => Yii::t('app', 'Vendor Name'),
            'address' => Yii::t('app', 'Address'),
            'contacts' => Yii::t('app', 'Contacts'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'fax' => Yii::t('app', 'Fax'),
            'depositBank' => Yii::t('app', 'Deposit Bank'),
            'bankNumber' => Yii::t('app', 'Bank Number'),
            'licenseNumber' => Yii::t('app', 'License Number'),
            'website' => Yii::t('app', 'Website'),
            'remark' => Yii::t('app', 'Remark'),
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
        return $this->vendorID;
    }

    /**
     * 创建或更新一条记录
     * @return array
     */
    public function createOrUpdateOne($moduleName) {
        if ($this->isNewRecord) {
            $msg = '申请';
        } else {
            $msg = '批准';
        }
        if ($this->save(false)) {
            $log = new ActLog();
            $log->addLog($moduleName,$msg,$this->vendorID);
            return ['type' => 'success', 'msg' => $msg . '已提交'];
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

        if (count($ids) && $this->deleteAll(['in','vendorID',$ids])) {
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }

    public static function queryAllVender()
    {
        $model = Vendor::find()->asArray()->all();
        $vendorID = array_combine(ArrayHelper::getColumn($model, "vendorID"),ArrayHelper::getColumn($model, "name"));
        return $vendorID;
    }
}
