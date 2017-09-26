<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment_transfer".
 *
 * @property int $equipmentTransferID
 * @property int $equipmentID
 * @property int $brokerage
 * @property string $brokerageDate
 * @property int $oldLaboratoryID
 * @property int $newLaboratoryID
 * @property int $roomID
 * @property string $description
 * @property string $remark
 */
class EquipmentTransfer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipment_transfer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['equipmentID',  'oldLaboratoryID', 'newLaboratoryID', 'newRoomID','oldRoomID'], 'integer'],
            [['newRoomID','newLaboratoryID'],'required'],
            [['brokerageDate','brokerage'], 'safe'],
            [['description'], 'string', 'max' => 400],
            [['remark'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'equipmentTransferID' => Yii::t('app', 'Equipment Transfer ID'),
            'equipmentID' => Yii::t('app', 'Equipment ID'),
            'brokerage' => Yii::t('app', 'Brokerage'),
            'brokerageDate' => Yii::t('app', 'Brokerage Date'),
            'oldLaboratoryID' => Yii::t('app', 'Old Laboratory ID'),
            'newLaboratoryID' => Yii::t('app', 'New Laboratory ID'),
            'newRoomID' => Yii::t('app', 'New Room ID'),
            'oldRoomID' => Yii::t('app', 'Old Room ID'),
            'description' => Yii::t('app', 'Description'),
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
        return $this->equipmentTransferID;
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

    public function deleteBatch($ids,$moduleName)
    {
        if(count($ids) && $this->deleteAll(['in','equipmentTransferID',$ids])){
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type'=> 'success','msg'=>"删除成功"];
        }else{
            return ['type'=>'success','msg'=>"删除失败"];
        }
    }

    public function getTeacher()
    {
        return EquipmentTransfer::hasOne(Teacher::className(),
            [
                "teacherID" => "brokerage"
            ]);
    }

    public function getLaboratory()
    {
        return EquipmentTransfer::hasOne(Laboratory::className(),
            [
                "laboratoryID" => "newLaboratoryID"
            ]);
    }

    public function getRoom()
    {
        return EquipmentTransfer::hasOne(Room::className(),
            [
                "roomID" => "newRoomID",
            ]);
    }
//    public function getRoom1(){
//        return $this->hasOne(Room::className(),['oldRoomID' => 'roomID']);
//    }
//    public function getRoom2(){
//        return $this->hasOne(Room::className(),['newRoomID' => 'roomID']);
//    }

    public function roomName($id)
    {
        $model = Room::find()->where(['roomID' => $id])->one();
        return $model['name'];
    }

    public function labName($id)
    {
        $model = Laboratory::find()->where(['laboratoryID' => $id])->one();
        return $model['name'];
    }
}
