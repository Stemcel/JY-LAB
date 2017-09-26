<?php

namespace app\models;


use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "equipment".
 *
 * @property int $equipmentID
 * @property string $code
 * @property string $name
 * @property string $modell
 * @property string $specification
 * @property string $purchaseDate
 * @property string $feeSubject
 * @property int $teacherID
 * @property string $endDate
 * @property string $checkPeriod 配置
 * @property string $purchasePerson
 * @property string $nation XML配置
 * @property string $sourceFrom XML配置
 * @property string $feeCode
 * @property string $price
 * @property string $purpose
 * @property string $transptation
 * @property string $foreignPrice
 * @property string $picture 主要存放文件的URL
 * @property string $maker
 * @property string $makeDate
 * @property string $makeCode
 * @property int $supplier
 * @property int $departmentID
 * @property string $description
 * @property int $user
 * @property int $managerID
 * @property int $laboratoryID
 * @property int $roomID
 * @property string $status RU运行 CL报废 CR报废再利用 RP维修 MISS报失
 * @property string $remark
 */
class Equipment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchaseDate', 'endDate', 'makeDate'], 'safe'],
            [['teacherID',  'departmentID', 'user', 'managerID', 'laboratoryID', 'roomID'], 'integer'],
            [['price', 'transptation', 'foreignPrice'], 'number'],
            [['code', 'feeSubject', 'checkPeriod', 'sourceFrom', 'purpose'], 'string', 'max' => 20],
            [['name', 'modell', 'specification', 'purchasePerson', 'picture', 'makeCode'], 'string', 'max' => 60],
            [['nation', 'feeCode'], 'string', 'max' => 40],
            [['maker', 'remark'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 400],
            [['status'], 'string', 'max' => 4],
            [['code','name','modell','specification','purchaseDate','feeSubject',
                'teacherID','endDate','checkPeriod', 'purchasePerson',
                'nation','sourceFrom','feeCode','price','transptation','foreignPrice',
                'maker','makeDate','makeCode','supplier','departmentID',
                'user','managerID','laboratoryID','roomID','status'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'equipmentID' => Yii::t('app', 'EquipmentID'),
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'modell' => Yii::t('app', 'Modell'),
            'specification' => Yii::t('app', 'Specification'),
            'purchaseDate' => Yii::t('app', 'Purchase Date'),
            'feeSubject' => Yii::t('app', 'Fee Subject'),
            'teacherID' => Yii::t('app', 'Teacher ID'),
            'endDate' => Yii::t('app', 'End Date'),
            'checkPeriod' => Yii::t('app', 'Check Period'),
            'purchasePerson' => Yii::t('app', 'Purchase Person'),
            'nation' => Yii::t('app', 'Nation'),
            'sourceFrom' => Yii::t('app', 'Source From'),
            'feeCode' => Yii::t('app', 'Fee Code'),
            'price' => Yii::t('app', 'Price'),
            'purpose' => Yii::t('app', 'Equipment Purpose'),
            'transptation' => Yii::t('app', 'Transptation'),
            'foreignPrice' => Yii::t('app', 'Foreign Price'),
            'picture' => Yii::t('app', 'Picture'),
            'maker' => Yii::t('app', 'Maker'),
            'makeDate' => Yii::t('app', 'Make Date'),
            'makeCode' => Yii::t('app', 'Make Code'),
            'supplier' => Yii::t('app', 'Supplier'),
            'departmentID' => Yii::t('app', 'Equipment Department ID'),
            'description' => Yii::t('app', 'Equipment Description'),
            'user' => Yii::t('app', 'User'),
            'managerID' => Yii::t('app', 'Manager ID'),
            'laboratoryID' => Yii::t('app', 'Laboratory ID'),
            'roomID' => Yii::t('app', 'Room ID'),
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
        return $this->equipmentID;
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
            $log->addLog($moduleName,$msg,$this->equipmentID);
            return['type'=>'success','msg'=>$msg . '成功'];
        }else{
            return['type'=>'success','msg'=>$msg . '失败'];
        }
    }

    public function deleteBatch($ids,$moduleName){

        if(count($ids) && $this->deleteAll(['in','equipmentID',$ids])){
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type'=> 'success','msg'=>"删除成功"];
        }else{
            return ['type'=>'success','msg'=>"删除失败"];
        }
    }
//表关联teacher,department,laboratory,room
    public function getDepartment()
    {
        return Equipment::hasOne(Department::className(), ["departmentID" => "departmentID"]);
    }

    public function getTeacher()
    {
        return Equipment::hasOne(Teacher::className(), ["teacherID" =>"managerID"]);
    }

    public function getRoom()
    {
        return Equipment::hasOne(Room::className(), ["roomID" => "roomID"]);
    }

    public function getLaboratory()
    {
        return Equipment::hasOne(Laboratory::className(), ["laboratoryID" => "laboratoryID"]);
    }

//    public function getFee()
//    {
//        return Equipment::hasOne(Fee::className(), ["feeSubject" => "feeID"]);
//    }


    public static function queryAllEquipmentID()
    {
        $model = Equipment::find()->asArray()->all();

        $equipmentID = array_combine(ArrayHelper::getColumn($model, "equipmentID"),ArrayHelper::getColumn($model, "equipmentID"));
        return $equipmentID;
    }

    public function nameBK($status){
        $model = $this->find()->where(['status' => $status] )->one();
        return $model->status;
    }

    public function feeName($id)
    {
        $model = Fee::find()->where(['feeID' => $id])->one();
        return $model['name'];
    }

    public function feeTypeName($id)
    {
        $model = FeeType::find()->where(['feeTypeID' => $id])->one();
        return $model['code'];
    }
}
