<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "classes".
 *
 * @property int $classesID
 * @property string $Code
 * @property string $Name
 * @property int $campusID
 * @property int $majorID
 * @property string $Grade
 * @property string $Remark
 */
class Classes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classesID','majorID','campusID'], 'integer'],
            [['code'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 40],
            [['name','code'],'unique', 'message' => '{attribute}已存在'],
            [['grade'], 'string', 'max' => 4],
            [['remark'], 'string', 'max' => 100],
            [['name','code'],'required' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'classesID' => Yii::t('app', 'Classes ID'),
            'code' => Yii::t('app', 'Classes Code'),
            'name' => Yii::t('app', 'Classes Name'),
            'campusID' => Yii::t('app', 'Campus ID'),
            'majorID' => Yii::t('app', 'Major ID'),
            'grade' => Yii::t('app', 'Grade'),
            'remark' => Yii::t('app', 'Classes Remark'),
        ];
    }

    public static function queryAllClasses()
    {
        $model = Classes::find()->asArray()->all();
        // 已moduleID为key name为value
        $classes = array_combine(ArrayHelper::getColumn($model, "classesID"),ArrayHelper::getColumn($model, "name"));
        return $classes;
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
            $log->addLog($moduleName,$msg,$this->classesID);
            return['type'=>'success','msg'=>$msg . '成功'];
        }else{
            return['type'=>'success','msg'=>$msg . '失败'];
        }
    }

    public function deleteBatch($ids,$moduleName){

        if(count($ids) && $this->deleteAll(['in','classesID',$ids])){
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type'=> 'success','msg'=>"删除成功"];
        }else{
            return ['type'=>'success','msg'=>"删除失败"];
        }
    }

    public function nameGD($Grade){
        $model = $this->find()->where(['grade' => $Grade] )->one();
        return $model->grade;
    }
   //获取student
    public function getMajor()
    {
        return Classes::hasOne(Major::className(), ["majorID" => "majorID"]);
    }

    public function getCampus()
    {
        return Classes::hasOne(Campus::className(), ["campusID" => "campusID"]);
    }
}
