<?php

namespace app\models;
use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "contract".
 *
 * @property int $contractID
 * @property int $vendorID 供应商
 * @property string $code 合同编号
 * @property string $title 主题
 * @property string $amount 总金额
 * @property string $createDate 签订时间
 * @property string $deliveryTime 交货时间
 * @property string $paymentType 付款方式
 * @property string $contractFile 附件
 * @property string $status OP执行CL结束
 * @property string $remark
 */
class Contract extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendorID'], 'integer'],
            [['amount'], 'number'],
            [['createDate', 'deliveryTime'], 'safe'],
            [['code'], 'string', 'max' => 30],
            [['code'],'unique', 'message' => '{attribute}已存在'],
            [['title', 'paymentType', 'remark'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 2],
            [['vendorID','createDate','deliveryTime','title','paymentType'],'required'],
            [['contractFile'], 'file','skipOnEmpty' => true,'extensions' => 'doc,xlsx']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vendorID' => Yii::t('app', 'Contract Vendor ID'),
            'code' => Yii::t('app', 'Contract Code'),
            'title' => Yii::t('app', 'Title'),
            'amount' => Yii::t('app', 'Contract Amount'),
            'createDate' => Yii::t('app', 'Contract Create Date'),
            'deliveryTime' => Yii::t('app', 'Delivery Time'),
            'paymentType' => Yii::t('app', 'Payment Type'),
            'contractFile' => Yii::t('app', 'Contract File'),
            'status' => Yii::t('app', 'Status'),
            'remark' => Yii::t('app', 'Remark'),
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
            $log->addLog($moduleName,$msg,$this->contractID);
            return['type'=>'success','msg'=>$msg . '成功'];
        }else{
            return['type'=>'success','msg'=>$msg . '失败'];
        }
    }


    public function deleteBatch($ids,$moduleName){

        if(count($ids) && $this->deleteAll(['in','contractID',$ids])){
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

    public function getVendor()
    {

        return $this->hasOne(Vendor::className(), ["vendorID" => "vendorID"]);
    }

    public static function queryAllcontract()
    {
        $model = Contract::find()->asArray()->all();
        // 已departmentID为key name为value
        $modules = array_combine(ArrayHelper::getColumn($model, "contractID"),ArrayHelper::getColumn($model, "contractID"));
        return $modules;
    }
    public static function queryCode()
    {
        $model = Contract::find()->where(['status'=>"CL"])->asArray()->all();
        // 已departmentID为key name为value
        $modules = array_combine(ArrayHelper::getColumn($model, "contractID"),ArrayHelper::getColumn($model, "code"));
        return $modules;
    }
    //自动修改状态
    public function atuoCreateStatus($name, $id)
    {
        switch ($name) {
            case 'ZX' :
                $newDate = Contract::findOne($id);
                $newDate->status = 'OP';
                $newDate->update(array('status'));
                break;
            default :
                $newDate = Contract::findOne($id);
                $newDate->status = 'CL';
                $newDate->update(array('status'));
                break;
        }
    }
    //合同明细金额自动汇总到合同金额
    public function apdatecon($id,$damount){
        $call = Contract::find()->where(['contractID'=>$id])->asArray()->one();
        $camount = $call['amount'];
        $ccamount = $camount + $damount;
        $newDate = Contract::findOne($id);
        $newDate->amount = $ccamount;
        $newDate->update(array('amount'));

    }
}
