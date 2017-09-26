<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\functions\CommonFunctions;
use app\models\AnnualBudget;

/**
 * This is the model class for table "fee".
 *
 * @property integer $feeID
 * @property string $feeTypeID
 * @property string $name
 * @property string $amount
 * @property string $userAmount
 * @property integer $teacherID
 * @property string $createDate
 * @property string $status
 * @property string $description
 * @property string $remark
 */
class Fee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'userAmount'], 'number'],
            [['teacherID'], 'integer'],
            [['createDate'], 'safe'],
            [['feeTypeID'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 40],
            [['status'], 'string', 'max' => 2],
            [['description'], 'string', 'max' => 400],
            [['remark'], 'string', 'max' => 100],
            [['name', 'amount'], 'required', 'on' => 'cre']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'feeID' => Yii::t('app', 'Fee ID'),
            'feeTypeID' => Yii::t('app', 'Fee Type ID'),
            'name' => Yii::t('app', 'Fee Name'),
            'amount' => Yii::t('app', 'Fee Amount'),
            'userAmount' => Yii::t('app', 'User Amount'),
            'teacherID' => Yii::t('app', 'Fee Teacher ID'),
            'createDate' => Yii::t('app', 'Fee Create Date'),
            'status' => Yii::t('app', 'Fee Status'),
            'description' => Yii::t('app', 'Fee Description'),
            'remark' => Yii::t('app', 'Fee Remark'),
        ];
    }

    //表关联
    public function getTeacher()
    {
        return Fee::hasOne(Teacher::className(), ["teacherID" => "teacherID"]);
    }

    public function getfee_type()
    {
        return Fee::hasOne(FeeType::className(), ["feeTypeID" => "feeTypeID"]);
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
        return $this->feeID;
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
            $log->addLog($moduleName, $msg, $this->feeID);
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

        if (count($ids) && $this->deleteAll(['in', 'feeID', $ids])) {
            $log = new ActLog();
            $log->addLog($moduleName, "删除", implode(",", $ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }

    public static function queryAllFee()
    {
        $model = Fee::find()->asArray()->all();
        // 已feeID为key name为value
        $feeID = array_combine(ArrayHelper::getColumn($model, "feeID"), ArrayHelper::getColumn($model, "name"));
        return $feeID;
    }

    public function nameCN($status)
    {
        $model = $this->find()->where(['status' => $status])->one();
        return $model->status;
    }

    /**
     * 年度预算 批准金额 批准时，学校经费总金额相应减少。
     */
    public function reduceTotalFee($approveAmount, $feeL)
    {

        //获取学校各类型 剩余总预算
        $amount = Fee::find()->where(['feeID' => $feeL])->one()['amount'];
        $userAmount = Fee::find()->where(['feeID' => $feeL])->one()['userAmount'];
        $newUseAmount = $userAmount + $approveAmount;
        //更新使用金额
        $used = Fee::findOne($feeL);
        $used->userAmount = $newUseAmount;
        $used->update(array('userAmount'));

        //学校经费总额是否超额，更新状态
        if ($newUseAmount == $amount) {
            $newStatus = Fee::findOne($feeL);
            $newStatus->status = 'CL';
            $newStatus->update(array('status'));
        }

    }
    /**
     * 获取学校各类型 剩余总预算
     */
    public function getAmount( $feeL)
    {
        //获取学校各类型 剩余总预算
        $amount = Fee::find()->where(['feeID' => $feeL])->one()['amount'];
        $userAmount = Fee::find()->where(['feeID' => $feeL])->one()['userAmount'];
        $surplus = $amount - $userAmount;
        return $surplus;
    }
    /**
     * 判断总剩余金额是否符合要求
     */
    public function judgeAmount($amou, $feeL)
    {
        $surplus = $this->getAmount($feeL);
        $status = Fee::find()->where(['feeID' => $feeL])->one()['status'];
        if ($amou <= $surplus && $status == 'OP') {
            return true;
        } else {
            return false;
        }
    }
    /**
     * 判断总剩余金额是否符合要求
     */
    public function remainderAmount($feeL)
    {
        //获取学校各类型 剩余总预算
        $amount = Fee::find()->where(['feeID' => $feeL])->one()['amount'];
        $userAmount = Fee::find()->where(['feeID' => $feeL])->one()['userAmount'];
        $surplus = $amount - $userAmount;
        return $surplus;
    }

    /**
     * 自动给予状态
     */
    public function atuoCreateStatus($name, $id)
    {
        if ($name == 'handlerDate') {
            $newDate = AnnualBudget::findOne($id);
            $newDate->status = 'NA';
            $newDate->update(array( 'status'));
        } elseif ($name == 'approveDate') {
            $newDate = AnnualBudget::findOne($id);
            $newDate->status = 'OP';
            $newDate->update(array( 'status'));
        } else {
            $newDate = Fee::findOne($id);
            $newDate->update(array());
        }
    }

    /**
     * 自动修改状态
     */
    public function atuoWStatus($id)
    {
        $newDate = Fee::findOne($id);
        $newDate->status = 'OP';
        $newDate->update(array( 'status'));
    }
    /**
     * 自动获取经费类型
     */
    public function atuoGetBudget($id)
    {
        $name = Fee::find()->where(['feeID' => $id])->one()['name'];
        return $name;
    }

}


