<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "fee_type".
 *
 * @property integer $feeTypeID
 * @property string $code
 * @property string $name
 * @property integer $departmentID
 * @property integer $teacherID
 * @property string $description
 * @property string $remark
 */
class FeeType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fee_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departmentID', 'teacherID'], 'integer'],
            [['code'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 40],
            [['description'], 'string', 'max' => 400],
            [['remark'], 'string', 'max' => 100],
            [['code'],'unique', 'message' => '{attribute}已存在'],
            [['name','code'],'required' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'feeTypeID' => Yii::t('app', 'Fee Type ID'),
            'code' => Yii::t('app', 'Fee Type Code'),
            'name' => Yii::t('app', 'Fee Type Name'),
            'departmentID' => Yii::t('app', 'Fee Type Department ID'),
            'teacherID' => Yii::t('app', 'Fee Type Teacher ID'),
            'description' => Yii::t('app', 'Fee Type Description'),
            'remark' => Yii::t('app', 'Fee Type Remark'),
        ];
    }

    //表关联
    public function getDepartment(){
        return FeeType::hasOne(Department::className(),["departmentID" => "departmentID"]);
    }
    public function getTeacher(){
        return FeeType::hasOne(Teacher::className(),["teacherID" => "teacherID"]);
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
        return $this->feeTypeID;
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
            $log->addLog($moduleName,$msg,$this->feeTypeID);
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

        if (count($ids) && $this->deleteAll(['in','feeTypeID',$ids])) {
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }

    public static function queryAllFeeType()
    {
        $model = FeeType::find()->asArray()->all();
        // 已DepartmentID为key name为value
        $feeTypeID = array_combine(ArrayHelper::getColumn($model, "feeTypeID"),ArrayHelper::getColumn($model, "name"));
        return $feeTypeID;
    }

    public static function queryAllFees()
    {
        $model = FeeType::find()->asArray()->all();
        // 已feeID为key name为value
        $fees = array_combine(ArrayHelper::getColumn($model, "feeTypeID"), ArrayHelper::getColumn($model, "code"));
        return $fees;
    }
}
