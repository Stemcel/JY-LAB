<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "purchase_detail".
 *
 * @property int $purchaseDetailID
 * @property int $purchaseID 外键
 * @property int $annualBudgetID 经费账号
 * @property int $purchaseCatalogueID 采购目录
 * @property string $description 采购项目
 * @property string $specification 规格
 * @property string $quantity 数量
 * @property string $unit 单位
 * @property string $price
 * @property string $amount 金额
 * @property string $status NA初始，PR批准，OP签约，CL验收通过，NCL验收未通过
 * @property string $remark
 */
class PurchaseDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchaseID', 'annualBudgetID', 'purchaseCatalogueID'], 'integer'],
            [[ 'unit','annualBudgetID', 'purchaseCatalogueID','quantity', 'price', 'amount'],'required'],
            [['quantity', 'price', 'amount'], 'number','integerOnly'=>true],
            [['description'], 'string', 'max' => 200],
            [['specification'], 'string', 'max' => 400],
            [['unit'], 'string', 'max' => 10],
            [['status'], 'string', 'max' => 3],
            [['remark'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'purchaseDetailID' => Yii::t('app', 'Purchase Detail ID'),
            'purchaseID' => Yii::t('app', 'Purchase ID'),
            'annualBudgetID' => Yii::t('app', 'Purchase Annual Budget ID'),
            'purchaseCatalogueID' => Yii::t('app', 'Purchase Catalogue ID'),
            'description' => Yii::t('app', 'Purchase Description'),
            'specification' => Yii::t('app', 'Purchase Specification'),
            'quantity' => Yii::t('app', 'Purchase Quantity'),
            'unit' => Yii::t('app', 'Purchase Unit'),
            'price' => Yii::t('app', 'Purchase Price'),
            'amount' => Yii::t('app', 'Purchase Amount'),
            'status' => Yii::t('app', 'Purchase Status'),
            'remark' => Yii::t('app', 'Purchase Remark'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     * 表连接
     */
    public function getPurchaseCatalogue()
    {
        return PurchaseDetail::hasOne(PurchaseCatalogue::className(), ["purchaseCatalogueID" => "purchaseCatalogueID"]);
    }
    public function getPurchase()
    {
        return PurchaseDetail::hasOne(Purchase::className(), ["purchaseID" => "purchaseID"]);
    }
    public function getAnnualBudget()
    {
        return PurchaseDetail::hasOne(AnnualBudget::className(), ["annualBudgetID" => "annualBudgetID"]);
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
        return $this->purchaseID;
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
            $log->addLog($moduleName, $msg, $this->purchaseDetailID);
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

        if (count($ids) && $this->deleteAll(['in', 'purchaseDetailID', $ids])) {
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
    public static function queryAllpurchaseDetail()
    {
        $model = PurchaseDetail::find()->asArray()->all();
        $purchaseDetailID = array_combine(ArrayHelper::getColumn($model, "purchaseDetailID"),ArrayHelper::getColumn($model, "purchaseDetailID"));
        return $purchaseDetailID;
    }

    public static function queryAllSpecification()
    {
        $model = PurchaseDetail::find()->asArray()->all();
        $specification = array_combine(ArrayHelper::getColumn($model, "specification"),ArrayHelper::getColumn($model, "specification"));
        return $specification;
    }

    public static function queryAllQuantity()
    {
        $model = PurchaseDetail::find()->asArray()->all();
        $quantity = array_combine(ArrayHelper::getColumn($model, "quantity"),ArrayHelper::getColumn($model, "quantity"));
        return $quantity;
    }

    public static function queryAllUnit()
    {
        $model = PurchaseDetail::find()->asArray()->all();
        $unit = array_combine(ArrayHelper::getColumn($model, "unit"),ArrayHelper::getColumn($model, "unit"));
        return $unit;
    }

    public static function queryAllPrice()
    {
        $model = PurchaseDetail::find()->asArray()->all();
        $price = array_combine(ArrayHelper::getColumn($model, "price"),ArrayHelper::getColumn($model, "price"));
        return $price;
    }
}
