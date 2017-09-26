<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contract_payment_detail".
 *
 * @property int $contractPaymentDetailID
 * @property int $contractPaymentID 合同预付款编号
 * @property string $date 付款时间
 * @property string $amount 付款金额
 * @property int $paymentTeacherID
 */
class ContractPaymentDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract_payment_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contractPaymentID','paymentTeacherID'], 'integer'],
            [['paymentDate'], 'safe'],
            [ ['amount'], 'number'],
            [['paymentTeacherID','paymentDate','amount'],'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contractPaymentID' => Yii::t('app', 'Contract Payment Detail ID'),
            'paymentDate' => Yii::t('app', 'Contract Payment DetailDate'),
            'amount' => Yii::t('app', 'Contract Payment Detail Amount'),
            'paymentTeacherID' => Yii::t('app', 'payment Teacher ID'),
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function createOrUpdateOne($moduleName)
    {
        if ($this->isNewRecord) {
            $msg = '创建';
        } else {
            $msg = '更新';
        }
        if ($this->save(false)) {
            $log = new ActLog();
            $log->addLog($moduleName, $msg, $this->contractPaymentDetailID);
            return ['type' => 'success', 'msg' => $msg . '成功'];
        } else {
            return ['type' => 'success', 'msg' => $msg . '失败'];
        }
    }


    public function deleteBatch($ids, $moduleName)
    {

        if (count($ids) && $this->deleteAll(['in', 'contractPaymentDetailID', $ids])) {
            $log = new ActLog();
            $log->addLog($moduleName, "删除", implode(",", $ids));
            return ['type' => 'success', 'msg' => "删除成功"];
        } else {
            return ['type' => 'success', 'msg' => "删除失败"];
        }
    }
//修改已付款金额
    public  function autoAmount($id,$amount){
        $aa = ContractPayment::find()->where(['ContractPaymentID'=>$id])->asArray()->one();
        $preamount = $aa['predictAmount'];
        $pamount = $aa['amount'];
        $all = $pamount + $amount;
        //判断是否全部还清
        if($preamount == $all ){
            $newDate = ContractPayment::findOne($id);
            $newDate->amount = $all;
            $newDate->update(array('amount'));
            $newDate->status = 'CL';
            $newDate->update(array('status'));
        }else{
            $newDate = ContractPayment::findOne($id);
            $newDate->amount = $all;
            $newDate->update(array('amount'));
        }
    }

    //减少已付金额
    public function reduceAmount($id){
        $dd = ContractPaymentDetail::find()->where(['contractPaymentDetailID'=>$id])->asArray()->one();
        $payID = $dd['contractPaymentID'];
        $pdamount = $dd['amount'];
        $tt = ContractPayment::find()->where(['contractPaymentID'=>$payID])->asArray()->one();
        $pamount = $tt['amount'];
        $ee = $pamount - $pdamount;
        $newDate = ContractPayment::findOne($payID);
        $newDate->amount = $ee;
        $newDate->update(array('amount'));
    }

    public function getTeacher()
    {

        return $this->hasOne(Teacher::className(), ["teacherID" => "paymentTeacherID"]);
    }

    //判断付款状态
    public function judgeStatuer($id){
        $status = ContractPayment::find()->where(['contractPaymentID' => $id])->one()['status'];
        if( $status == 'OP'){
            return true;
        }else{
            return false;
        }
    }
}