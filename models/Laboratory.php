<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "laboratory".
 *
 * @property int $laboratoryID
 * @property string $code
 * @property string $name
 * @property int $manager 教师ID
 * @property string $type 教学、科研、其他
 * @property int $laboratoryCategoryID
 * @property int $departmentID
 * @property string $schoolType 配置XML解决
 * @property string $createDate
 * @property string $approveDate
 * @property string $buildDate
 * @property string $URL
 * @property string $phone
 * @property string $description
 * @property string $budget
 * @property string $status 'NA' 'OP' 'RU' 'CL'
 * @property string $remark
 * @property int $approveName
 * @property int $handlerName
 */
class Laboratory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'laboratory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['approveDate', 'buildDate'], 'safe'],
            [['code','name','manager','type','departmentID','budget','handlerName','phone'],'required'],
            [['budget'], 'number'],
            [['code', 'schoolType', 'createDate', 'phone'], 'string', 'max' => 20],
            [['name','approveName','handlerName'], 'string', 'max' => 40],
            [['type'], 'string', 'max' => 5],
            [['URL'], 'string', 'max' => 60],
            [['description'], 'string', 'max' => 400],
            [['status'], 'string', 'max' => 2],
            [['remark'], 'string', 'max' => 100],
            [['phone'],'match','pattern'=>'/^[1][3578][0-9]{9}$/','message'=>"请输入正确的手机号码"],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'laboratoryID' => Yii::t('app', 'Laboratory ID'),
            'code' => Yii::t('app', 'Lab Code'),
            'name' => Yii::t('app', 'Lab Name'),
            'manager' => Yii::t('app', 'Lab Manager'),
            'type' => Yii::t('app', 'Lab Type'),
            'laboratoryCategoryID' => Yii::t('app', 'Laboratory Category ID'),
            'departmentID' => Yii::t('app', 'Department ID'),
            'schoolType' => Yii::t('app', 'School Type'),
            'createDate' => Yii::t('app', 'Lab Create Date'),
            'approveDate' => Yii::t('app', 'Lab Approve Date'),
            'buildDate' => Yii::t('app', 'Lab Build Date'),
            'URL' => Yii::t('app', 'Url'),
            'phone' => Yii::t('app', 'Phone'),
            'description' => Yii::t('app', 'Description'),
            'budget' => Yii::t('app', 'Budget'),
            'status' => Yii::t('app', 'Lab Status'),
            'remark' => Yii::t('app', 'Lab Remark'),
            'approveName' => Yii::t('app', 'Lab approveName'),
            'handlerName' => Yii::t('app', 'Lab handlerName'),
            'checkName' => Yii::t('app', 'Lab handlerName'),
        ];
    }

    public function getTeacher()
    {
        return Laboratory::hasOne(Teacher::className(),
            [
                "teacherID" => "manager"
            ]);
    }

    public function getDepartment()
    {
        return Laboratory::hasOne(Department::className(), ["departmentID" => "departmentID"]);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->laboratoryID;
    }

    public function createOrUpdateOne($moduleName) {
        if ($this->isNewRecord) {
            $msg = '申请';
        } else {
            $msg = '批准';
        }
        if ($this->save(false)) {
            $log = new ActLog();
            $log->addLog($moduleName,$msg,$this->laboratoryID);
            return ['type' => 'success', 'msg' => $msg . '已提交'];
        } else {
            return ['type' => 'success', 'msg' => $msg . '失败'];
        }
    }

    public function deleteBatch($ids,$moduleName) {

        if (count($ids) && $this->deleteAll(['in','laboratoryID',$ids])) {
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }

    public function nameCNS($type){
        $model = $this->find()->where(['type' => $type])->one();
        return $model['type'];
    }

    public function nameCN($status){
        $model = $this->find()->where(['status' => $status])->one();
        return $model['status'];
    }

    //自动获取状态
    public function atuoCreateStatus($name, $id)
    {
        if ($name == 'apply') {
            $newDate = Laboratory::findOne($id);
            $newDate->status = 'NA';
            $newDate->update(array( 'status'));
        } elseif ($name == 'approval') {
            $newDate = Laboratory::findOne($id);
            $newDate->status = 'OP';
            $newDate->update(array( 'status'));
        } elseif ($name == 'check') {
            $newDate = Laboratory::findOne($id);
            $newDate->status = 'RU';
            $newDate->update(array( 'status'));
        }elseif ($name == 'end') {
            $newDate = Laboratory::findOne($id);
            $newDate->status = 'CL';
            $newDate->update(array( 'status'));
        } else {
           return;
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
     * 判断状态是否符合要求
     */
    public function judgeStatue($feeL){
        $status = Laboratory::find()->where(['laboratoryID' => $feeL])->one()['status'];
        if( $status == 'NA'){
            return true;
        }else{
            return false;
        }
    }

    public function judgeApprove($feeL){
        $status = Laboratory::find()->where(['laboratoryID' => $feeL])->one()['status'];
        if( $status == 'OP'){
            return true;
        }else{
            return false;
        }
    }

    public function teacherName($id){
        $model = Teacher::find()->where(['teacherID' => $id] )->one();
        return $model['name'];
    }

    public function typeName($id){
        $model = Laboratory::find()->where(['laboratoryID' => $id] )->one();
        if($model['name']== 0){
            return '教学';
        }elseif($model['name']== 1){
            return '科研';
        }else{
            return '其他';
        };
    }

    public function departmentName($id){
        $model = Department::find()->where(['departmentID' => $id] )->one();
        return $model['name'];
    }

    public function dateName($id){
        $model = Laboratory::find()->where(['laboratoryID' => $id] )->one();
        return $model['createDate'];
    }

    public static function queryAllLaboratory()
    {
        $model = Department::find()->asArray()->all();
        // 已departmentID为key name为value
        $modules = array_combine(ArrayHelper::getColumn($model, "departmentID"),ArrayHelper::getColumn($model, "name"));
        return $modules;
    }

    public static function queryAllLaboratory1()
    {
        $model = Laboratory::find()->asArray()->all();
        // 已laboratoryID为key name为value
        $modules = array_combine(ArrayHelper::getColumn($model, "laboratoryID"),ArrayHelper::getColumn($model, "name"));
        return $modules;
    }

}
