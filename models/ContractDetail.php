<?php

namespace app\models;

use Yii;



/**
 * This is the model class for table "contract_detail".
 *
 * @property int $contractDetailID
 * @property int $contractID
 * @property int $purchaseDetailID
 * @property int $annualBudgetID 经费账号
 * @property int $purchaseCatalogueID 采购目录
 * @property string $description 采购项目
 * @property string $specification 规格
 * @property string $quantity 数量
 * @property string $unit 单位
 * @property string $price 价格
 * @property string $amount 金额
 * @property string $deliveryTime 交货时间
 * @property int $deliveryTeacher 交货经手人
 * @property string $checkTime 验收时间
 * @property int $checkTeacher 验收人
 * @property string $closeTime 建账时间
 * @property int $closeTeacher 建账人
 * @property string $status OP签约，DE交货，CL验收通过，NCL验收未通过
 * @property string $remark
 */
class ContractDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'contractID','purchaseDetailID', 'annualBudgetID', 'purchaseCatalogueID', 'deliveryTeacher', 'checkTeacher'], 'integer'],
            [[ 'purchaseDetailID', 'annualBudgetID', 'purchaseCatalogueID', 'deliveryTeacher', 'checkTeacher'],'required'],
            [['quantity', 'price', 'amount'], 'number'],
            [['quantity', 'price', 'amount'], 'required'],
            [['deliveryTime', 'checkTime', 'closeTime','closeTeacher'], 'safe'],
            [['deliveryTime', 'checkTime', 'closeTime','closeTeacher'], 'required'],
            [['description'], 'string', 'max' => 200],
            [['specification'], 'string', 'max' => 400],
            [['unit'], 'string', 'max' => 10],
            [['status'], 'string', 'max' => 3],
            [['remark'], 'string', 'max' => 100],
            [['description','specification','unit'],'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contractID' => Yii::t('app', 'Contract ID'),
            'purchaseDetailID' => Yii::t('app', 'Purchase Detail ID'),
            'annualBudgetID' => Yii::t('app', 'ContractDetail Annual Budget ID'),
            'purchaseCatalogueID' => Yii::t('app', 'Purchase Catalogue ID'),
            'description' => Yii::t('app', 'ContractDetail Description'),
            'specification' => Yii::t('app', 'ContractDetail Specification'),
            'quantity' => Yii::t('app', 'ContractDetail Quantity'),
            'unit' => Yii::t('app', 'ContractDetail Unit'),
            'price' => Yii::t('app', 'ContractDetail Price'),
            'amount' => Yii::t('app', 'ContractDetail Amount'),
            'deliveryTime' => Yii::t('app', 'ContractDetail Delivery Time'),
            'deliveryTeacher' => Yii::t('app', 'ContractDetail Delivery Teacher'),
            'checkTime' => Yii::t('app', 'ContractDetail Check Time'),
            'checkTeacher' => Yii::t('app', 'ContractDetail Check Teacher'),
            'closeTime' => Yii::t('app', 'ContractDetailClose Time'),
            'closeTeacher' => Yii::t('app', 'ContractDetail Close Teacher'),
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

    public function getId()
    {
        return $this->classesID;
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
            $log->addLog($moduleName,$msg,$this->contractDetailID);
            return['type'=>'success','msg'=>$msg . '成功'];
        }else{
            return['type'=>'success','msg'=>$msg . '失败'];
        }
    }

    public function deleteBatch($ids,$moduleName){

        if(count($ids) && $this->deleteAll(['in','contractDetailID',$ids])){
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type'=> 'success','msg'=>"删除成功"];
        }else{
            return ['type'=>'success','msg'=>"删除失败"];
        }
    }

    public function getAnnualBudget()
    {
        return ContractDetail::hasOne(AnnualBudget::className(), ["annualBudgetID" => "annualBudgetID"]);
    }

    public function getTeacher()
    {

        return $this->hasOne(Teacher::className(), ["teacherID" =>"checkTeacher"]);
    }

    public static function getName(){
        $use = yii::$app->user;
        $id = $use->getId();
        $alls = \app\models\User::find()->where(['userID'=>$id])->asArray()->all();
        $name = $alls[0]['name'];
        $teacher = Teacher::find()->where(['teacherID'=>$name])->asArray()->all();
        $name = $teacher[0]['name'];
      return $name;
    }

    public function nameCN($status)
    {
        $model = $this->find()->where(['status' => $status])->one();
        return $model->status;
    }

    //自动修改状态
    public function atuoCreateStatusr($name, $id)
    {
        switch ($name) {
            case 'QY' :
                $newDate = ContractDetail::findOne($id);
                $newDate->status = 'OP';
                $newDate->update(array('status'));
                break;
            case 'JH' :
                $newDate = ContractDetail::findOne($id);
                $newDate->status = 'DE';
                $newDate->update(array('status'));
                break;
            case 'YS' :
                $newDate = ContractDetail::findOne($id);
                $newDate->status = 'CL';
                $newDate->update(array('status'));
                break;
            default :
                $newDate = ContractDetail::findOne($id);
                $newDate->status = 'NCL';
                $newDate->update(array('status'));
                break;
        }
    }

    public function judgeStatue($id){
        $status = ContractDetail::find()->where(['contractDetailID' => $id])->one()['status'];
        if( $status == 'OP'|| $status == 'DE'){
            return true;
        }else{
            return false;
        }
    }
    //判断合同状态
    public function judgeStatuer($id){
        $status = Contract::find()->where(['contractID' => $id])->one()['status'];
        if( $status == 'OP'){
            return true;
        }else{
            return false;
        }
    }
}
