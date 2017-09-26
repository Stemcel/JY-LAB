<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior; //1首先引入timestamp行为类
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "annual_budget".
 *
 * @property integer $annualBudgetID
 * @property string $years
 * @property integer $departmentID
 * @property integer $feeID
 * @property string $purpose
 * @property string $amount
 * @property string $approveAmount
 * @property string $useAmount
 * @property integer $handlerName
 * @property string $handlerDate
 * @property integer $approver
 * @property string $approveDate
 * @property string $annualBudgetCode
 * @property string $type
 * @property string $status
 * @property string $remark
 */
class AnnualBudget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'annual_budget';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [[  'approver','handlerName'], 'integer'],
            [['amount', 'approveAmount', 'useAmount'], 'number'],
            [['handlerDate', 'approveDate'], 'safe'],
            [['annualBudgetCode'], 'string', 'max' => 100],
            [['years'], 'string', 'max' => 4],
            [['purpose', 'remark'], 'string', 'max' => 400],
            [['type'], 'string', 'max' => 1],
            [['status'], 'string', 'max' => 2],
            [['amount', 'years', 'type', 'handlerName', 'departmentID', 'feeID', 'purpose'], 'required', 'on' => ['create']],
            [['approveAmount', /*'approver',*/
                'annualBudgetCode'], 'required', 'on' => ['update']],
            [['amount', 'years', 'type', 'handlerName'], 'required', 'on' => ['up']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'annualBudgetID' => Yii::t('app', 'Annual Budget ID'),
            'years' => Yii::t('app', 'Years'),
            'departmentID' => Yii::t('app', 'Annual Budget Department ID'),
            'feeID' => Yii::t('app', 'Annual Budget Fee ID'),
            'purpose' => Yii::t('app', 'Annual Budget Purpose'),
            'amount' => Yii::t('app', 'Annual Budget Amount'),
            'approveAmount' => Yii::t('app', 'Approve Amount'),
            'useAmount' => Yii::t('app', 'Use Amount'),
            'handlerName' => Yii::t('app', 'Handler Name'),
            'handlerDate' => Yii::t('app', 'Handler Date'),
            'approver' => Yii::t('app', 'Approver'),
            'approveDate' => Yii::t('app', 'Approve Date'),
            'annualBudgetCode' => Yii::t('app', 'Annual Budget Code'),
            'type' => Yii::t('app', 'Annual Budget Type'),
            'status' => Yii::t('app', 'Annual Budget Status'),
            'remark' => Yii::t('app', 'Annual Budget Remark'),
        ];
    }

    //表关联
    public function getTeacher()
    {
        return AnnualBudget::hasOne(Teacher::className(),
            [
                "handlerName" => "teacherID"
            ]);
    }

    public function getDepartment()
    {
        return AnnualBudget::hasOne(Department::className(), ["departmentID" => "departmentID"]);
    }

    public function getFee()
    {
        return AnnualBudget::hasOne(Fee::className(), ["feeID" => "feeID"]);
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
        return $this->annualBudgetID;
    }


    /**
     * 创建或更新一条记录
     * @return array
     */
    public function createOrUpdateOne($moduleName)
    {
        if ($this->isNewRecord) {
            $msg = '申请';
        } else {
            $msg = '批准';
        }
        if ($this->save(false)) {
            $log = new ActLog();
            $log->addLog($moduleName, $msg, $this->annualBudgetID);
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
    public function deleteBatch($ids, $moduleName)
    {

        if (count($ids) && $this->deleteAll(['in', 'annualBudgetID', $ids])) {
            $log = new ActLog();
            $log->addLog($moduleName, "删除", implode(",", $ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }

    public function nameCN($status)
    {
        $model = $this->find()->where(['status' => $status])->one();
        return $model->status;
    }

    public function nameCNS($type)
    {
        $model = $this->find()->where(['type' => $type])->one();
        return $model->type;
    }

    public function teacherName($id)
    {
        $model = Teacher::find()->where(['teacherID' => $id])->one();
        return $model['name'];
    }

    public function nameLa($id)
    {
        $model = Department::find()->where(['departmentID' => $id])->one();
        return $model['name'];

    }

    public function nameFee($id)
    {
        $model = Fee::find()->where(['feeID' => $id])->one();
        return $model['name'];

    }

    /**
     * 判断动作是否符合要求
     */
    public function judgeStatue($feeL)
    {
        $status = AnnualBudget::find()->where(['annualBudgetID' => $feeL])->one()['status'];
        if ($status == 'NA') {
            return true;
        } else {
            return false;
        }
    }

    public static function queryAllAnnualBudget()
    {
        $model = AnnualBudget::find()->asArray()->all();
        // 已annualBudgetID为key name为value
        $annualBudgetID = array_combine(ArrayHelper::getColumn($model, "annualBudgetID"), ArrayHelper::getColumn($model, "annualBudgetCode"));
        return $annualBudgetID;
    }

    public function annualSta($id)
    {

        $model = ContractDetail::find()->where(['contractDetailID' => $id])->asArray()->one();
        $annual = $model['annualBudgetID'];
        //合同金额
        $amount = $model['amount'];
        //审批金额
        $all = AnnualBudget::find()->where(['annualBudgetID' => $annual])->asArray()->one();
        $approveAmount = $all['approveAmount'];
        //使用金额
        $useAmount = $all['useAmount'];
        //可用余额
        $kyAmound = $approveAmount - $useAmount;
        if ($amount <= $kyAmound) {
            return true;
        } else {
            return false;
        }

//        //修改使用余额
//        $userAmount = $useAmount + $amount;
//        //更新使用金额
//        $dd = AnnualBudget::findOne($annual);
//        $dd->useAmount = $userAmount;
//        $dd->update(array('useAmount'));
    }

    public function updateAnnual($id)
    {

        $model = ContractDetail::find()->where(['contractDetailID' => $id])->asArray()->one();
        $annual = $model['annualBudgetID'];
        //合同金额
        $amount = $model['amount'];
        //审批金额
        $all = AnnualBudget::find()->where(['annualBudgetID' => $annual])->asArray()->one();
        $approveAmount = $all['approveAmount'];
        //使用金额
        $useAmount = $all['useAmount'];
        //可用余额
//        $kyAmound = $approveAmount - $useAmount;
//        if($amount<=$kyAmound){
//            return true;
//        }else{
//            return false;
//        }

        //修改使用余额
        $userAmount = $useAmount + $amount;
        //更新使用金额
        $dd = AnnualBudget::findOne($annual);
        $dd->useAmount = $userAmount;
        $dd->update(array('useAmount'));
    }

//返还金额
    public function updaterAnnual($id, $amount)
    {
        $all = AnnualBudget::find()->where(['annualBudgetID' => $id])->asArray()->one();
        //使用金额
        $useAmount = $all['useAmount'];
        $userAmount = $useAmount - $amount;

        $dd = AnnualBudget::findOne($id);
        $dd->useAmount = $userAmount;
        $dd->update(array('useAmount'));
    }

    /**
     * 当经费结束后，统计实际用的经费-->放入学校经费列表里的使用经费中。
     */
    public function confirmUsedBudget($feeL, $appAmount, $useAmount)
    {
        $usedAmount = Fee::find()->where(['feeID' => $feeL])->one()['userAmount'];//获取特定类型的使用金额
        //得到新数据 替换Fee里已使用金额
        $trueUseAmount = $usedAmount - $appAmount + $useAmount;
        //更新使用金额
        $used = Fee::findOne($feeL);
        $used->userAmount = $trueUseAmount;
        $used->update(array('userAmount'));

    }

    /**
     * 已批准的的经费，管理员可修改，修改对应类型总预算里面的使用金额
     */

    public function updateFeeUsedmoney($annualBudgetID, $newAmount, $feeL,$oldAmount)
    {
        //获取fee使用金额
        $used = Fee::findOne($feeL);
        $oldUseAmount = $used->userAmount;
       //判断是否修改了 审批金额
        $tureAmount = $newAmount - $oldAmount;
        $oldUseAmount += $tureAmount;
        //若修改了审批金额，便更新fee使用金额
        $used->userAmount = $oldUseAmount;
        $used->update(array('userAmount'));
    }

}
