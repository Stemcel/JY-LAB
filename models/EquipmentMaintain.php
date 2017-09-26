<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment_maintain".
 *
 * @property int $equipmentMaintainID
 * @property int $equipmentID
 * @property int $applier
 * @property string $applyDate
 * @property string $description
 * @property int $checker
 * @property string $checkDate
 * @property string $status RP 维修 CL 验收
 * @property string $remark
 */
class EquipmentMaintain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipment_maintain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['equipmentID'], 'integer'],
            [['applyDate', 'checkDate','applier','checker'], 'safe'],
            [['description'], 'string', 'max' => 400],
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
            'equipmentMaintainID' => Yii::t('app', 'Equipment Maintain ID'),
            'equipmentID' => Yii::t('app', 'Equipment ID'),
            'applier' => Yii::t('app', 'Applier'),
            'applyDate' => Yii::t('app', 'Apply Date'),
            'description' => Yii::t('app', 'Description'),
            'checker' => Yii::t('app', 'Checker'),
            'checkDate' => Yii::t('app', 'Check Date'),
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
        return $this->equipmentMaintainID;
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
        if(count($ids) && $this->deleteAll(['in','equipmentMaintainID',$ids])){
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type'=> 'success','msg'=>"删除成功"];
        }else{
            return ['type'=>'success','msg'=>"删除失败"];
        }
    }

    public function getTeacher()
    {
        return EquipmentMaintain::hasOne(Teacher::className(), ["teacherID" =>"applier"]);
    }

    public function getEquipment()
    {
        return EquipmentMaintain::hasOne(Equipment::className(), ["equipmentID" =>"equipmentID"]);
    }

    public function nameRP($status){
        $model = $this->find()->where(['status' => $status] )->one();
        return $model->status;
    }

    public function teacherName($id){
        $model = Teacher::find()->where(['teacherID' => $id] )->one();
//        print_r($model);die;
        return $model['name'];
    }

    public function teacherNames($id)
    {
        $model = Teacher::find()->where(['teacherID' => $id] )->one();
        return $model['name'];
    }
//    public function autoCreateStatus($name, $id)
//    {
//        if ($name == 'applyDate') {
//            $newDate = EquipmentMaintain::findOne($id);
//            $newDate->status = 'OP';
//            $newDate->update(array( 'status'));
//        } else {
//            $newDate = EquipmentMaintain::findOne($id);
//            $newDate->update(array());
//        }
//    }
    public function autoCreateStatus($name, $id)
    {
        if ($name == 'handlerDate') {
            $newDate = EquipmentMaintain::findOne($id);
            $newDate->status = 'RP';
            $newDate->update(array( 'status'));
            return $newDate->status;
        } elseif ($name == 'applyDate') {
            $newDate = EquipmentMaintain::findOne($id);
            $newDate->status = 'CL';
            $newDate->update(array( 'status'));
            return $newDate->status;
        }
    }



    /**
     * 判断动作是否符合要求
     */
    public function judgeStatue($feeL){
        $status = EquipmentMaintain::find()->where(['equipmentMaintainID' => $feeL])->one()['status'];
        if( $status == 'OP'){
            return true;
        }else{
            return false;
        }
    }


}
