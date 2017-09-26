<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contract_payment".
 *
 * @property int $contractPaymentID
 * @property int $contractID 合同编号
 * @property string $predictPaymentDate 预计付款时间
 * @property string $predictAmount 预计付款金额
 * @property string $amount 已付款金额
 * @property string $status OP执行CL结束
 * @property string $remark
 */
class ContractPayment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contractID'], 'integer'],
            [['contractID'],  'unique', 'message' => '{attribute}已存在'],
            [['predictPaymentDate'], 'safe'],
            [['predictAmount', 'amount'], 'number'],
            [['status'], 'string', 'max' => 2],
            [['remark'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contractID' => Yii::t('app', 'Contract ID'),
            'predictPaymentDate' => Yii::t('app', 'Predict Payment Date'),
            'predictAmount' => Yii::t('app', 'Predict Amount'),
            'amount' => Yii::t('app', 'Contract Payment Amount'),
            'status' => Yii::t('app', 'Contract Payment Status'),
            'remark' => Yii::t('app', 'Contract Payment Remark'),
        ];
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token,$type = null)
    {
        return static::findOne(['access_token'=>$token]);
    }


    public function createOrUpdateOne($moduleName)
    {
        if($this->isNewRecord){
            $msg = '创建';
        }else{
            $msg = '更新';
        }
        if($this->save(false)){
            $log = new ActLog();
            $log->addLog($moduleName,$msg,$this->contractPaymentID);
            return['type'=>'success','msg'=>$msg . '成功'];
        }else{
            return['type'=>'success','msg'=>$msg . '失败'];
        }
    }


    public function deleteBatch($ids,$moduleName){

        if(count($ids) && $this->deleteAll(['in','contractPaymentID',$ids])){
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type'=> 'success','msg'=>"删除成功"];
        }else{
            return ['type'=>'success','msg'=>"删除失败"];
        }
    }

    public function nameCN($status)
    {
        $model = $this->find()->where(['status' => $status])->one();
        return $model->status;
    }

    public function getContract()
    {
        return $this->hasOne(Contract::className(), ["contractID" =>"contractID"]);
    }

    //自动修改状态
    public function atuoCreateStatus($name, $id)
    {
        switch ($name) {
            case 'ZX' :
                $newDate = ContractPayment::findOne($id);
                $newDate->status = 'OP';
                $newDate->update(array('status'));
                break;
            default :
                $newDate = ContractPayment::findOne($id);
                $newDate->status = 'CL';
                $newDate->update(array('status'));
                break;
        }
    }

    //自动获取代付款金额
    public function atuoCreateAmount($amount, $id)
    {

                $newDate = ContractPayment::findOne($id);
                $newDate->predictAmount = $amount;
                $newDate->update(array('predictAmount'));

    }
    //判断是否有余额并返还
    public function atuoUpdateAmount($amount,$predict, $id)
    {
    //多余金额
        //合同明细总金额金额
//        $dd = ContractDetail::find()->where(['contractID'=>$id,'status'=>'CL'])->asArray()->all();
//        $qq = array_column($dd,'amount');
//        $allr = array_sum($qq);
//        $ww = $allr - $amount;
        $ww = $predict - $amount;
        $abid = ContractDetail::find()->where(['contractID'=>$id])->asArray()->one();
        $abid = $abid['annualBudgetID'];
        $all = AnnualBudget::find()->where(['annualBudgetID'=>$abid])->asArray()->one();
        $useAmount = $all['useAmount'];
        $useAmountr = $useAmount - $ww;
        $newDate = AnnualBudget::findOne($abid);
        $newDate->useAmount = $useAmountr;
        $newDate->update(array('useAmount'));

    }



}
