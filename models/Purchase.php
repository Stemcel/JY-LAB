<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "purchase".
 *
 * @property int $purchaseID
 * @property string $title 主题
 * @property int $departmentID 部门编号
 * @property int $teacherID 采购联系人
 * @property string $createDate 申请时间
 * @property string $status NA初始，PR批准，OP执行，CL验收通过
 * @property string $purchaseFile 采购文件
 * @property string $remark
 */
class Purchase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase';
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departmentID', 'teacherID'], 'integer'],
            [['createDate'], 'safe'],
            [['title', 'departmentID', 'teacherID'],'required'],
            [['title', 'remark'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 2],
            [['purchaseFile'], 'file','skipOnEmpty' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'purchaseID' => Yii::t('app', 'Purchase ID'),
            'title' => Yii::t('app', 'Title'),
            'departmentID' => Yii::t('app', 'Purchase Department ID'),
            'teacherID' => Yii::t('app', 'Purchase Teacher ID'),
            'createDate' => Yii::t('app', 'Create Date'),
            'status' => Yii::t('app', 'Purchase Status'),
            'purchaseFile' => Yii::t('app', 'Purchase File'),
            'remark' => Yii::t('app', 'Purchase Remark'),
        ];
    }

    //表关联
    public function getTeacher()
    {
        return Purchase::hasOne(Teacher::className(),
            [
                "teacherID" => "teacherID"
            ]);
    }

    public function getDepartment()
    {
        return Purchase::hasOne(Department::className(), ["departmentID" => "departmentID"]);
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
            $log->addLog($moduleName, $msg, $this->purchaseID);
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

        if (count($ids) && $this->deleteAll(['in', 'purchaseID', $ids])) {
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

   //自动修改状态
    public function atuoCreateStatus($name, $id)
    {
        switch ($name) {
            case 'SQ' :
                $newDate = Purchase::findOne($id);
                $newDate->status = 'NA';
                $newDate->update(array('status'));
                break;
            case 'PZ' :
                $newDate = Purchase::findOne($id);
                $newDate->status = 'PR';
                $newDate->update(array('status'));
                break;
            case 'ZX' :
                $newDate = Purchase::findOne($id);
                $newDate->status = 'OP';
                $newDate->update(array('status'));
                break;
            default :
                $newDate = Purchase::findOne($id);
                $newDate->status = 'CL';
                $newDate->update(array('status'));
                break;
        }
    }

    public static function queryAllpurchase()
    {
        $model = Purchase::find()->asArray()->all();
        // 已PurchaseID为key name为value
        $PurchaseID = array_combine(ArrayHelper::getColumn($model, "purchaseID"), ArrayHelper::getColumn($model, "title"));
        return $PurchaseID;
    }

    public static function queryAlltitle()
    {
        $id = PurchaseDetail::find()->where(['status'=>"PR"])->asArray()->all();
        $model = Purchase::find()->where(['purchaseID'=>$id])->asArray()->all();
        // 已departmentID为key name为value
        $modules = array_combine(ArrayHelper::getColumn($model, "title"),ArrayHelper::getColumn($model, "title"));
        return $modules;
    }
}
