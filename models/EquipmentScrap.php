<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment_scrap".
 *
 * @property int $equipmentScrapID
 * @property int $equipmentID
 * @property int $brokerage
 * @property string $brokerageDate
 * @property string $description
 * @property string $status CL报废  CR 报废再利用  MISS 报失
 * @property string $remark
 */
class EquipmentScrap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipment_scrap';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['equipmentID'], 'integer'],
            [['brokerageDate','brokerage'], 'safe'],
            [['equipmentID','status'], 'required'],
            [['description'], 'string', 'max' => 400],
            [['status'], 'string', 'max' => 4],
            [['remark'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'equipmentScrapID' => Yii::t('app', 'Equipment Scrap ID'),
            'equipmentID' => Yii::t('app', 'Equipment ID'),
            'brokerage' => Yii::t('app', 'Brokerage X'),
            'brokerageDate' => Yii::t('app', 'Brokerage Date X'),
            'description' => Yii::t('app', 'Description'),
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
        return $this->equipmentScrapID;
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
        if(count($ids) && $this->deleteAll(['in','equipmentScrapID',$ids])){
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type'=> 'success','msg'=>"删除成功"];
        }else{
            return ['type'=>'success','msg'=>"删除失败"];
        }
    }

    public function nameES($status){
        $model = $this->find()->where(['status' => $status] )->one();
        return $model->status;
    }

    public function getTeacher()
    {
        return EquipmentScrap::hasOne(Teacher::className(), ["teacherID" =>"brokerage"]);
    }
}
