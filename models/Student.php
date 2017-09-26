<?php

namespace app\models;

use app\components\CellphoneValidator;
use Yii;


/**
 * This is the model class for table "student".
 *
 * @property int $studentID
 * @property string $code
 * @property string $password
 * @property string $name
 * @property string $sex 1男2女0未知
 * @property int $classesID
 * @property string $type 1博士、2硕士、3本科、4大专、5其他
 * @property string $status 1在读2、休学3毕业
 * @property string $email
 * @property string $phone
 * @property string $remark
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['studentID', 'classesID'], 'integer'],
            [['code', 'password'], 'string', 'max' => 20],
            [['name', 'email'], 'string', 'max' => 40],
            [['code'],'unique', 'message' => '{attribute}已存在'],
            [['name','code','password'],'required' ],
            [['sex'], 'string', 'max' => 2],
            [['type', 'status'], 'string', 'max' => 1],
            [['remark'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['phone'],CellphoneValidator::className()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'studentID' => Yii::t('app', 'Student ID'),
            'code' => Yii::t('app', 'Student Code'),
            'password' => Yii::t('app', 'Password'),
            'name' => Yii::t('app', 'Student Name'),
            'sex' => Yii::t('app', 'Student Sex'),
            'classesID' => Yii::t('app', 'Classes ID'),
            'type' => Yii::t('app', 'Student Type'),
            'status' => Yii::t('app', 'Student Status'),
            'email' => Yii::t('app', 'Student Email'),
            'phone' => Yii::t('app', 'Student Phone'),
            'remark' => Yii::t('app', 'Student Remark'),
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
        return $this->studentID;
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
            $log->addLog($moduleName,$msg,$this->studentID);
            return['type'=>'success','msg'=>$msg . '成功'];
        }else{
            return['type'=>'success','msg'=>$msg . '失败'];
        }
    }

    public function deleteBatch($ids,$moduleName){

        if(count($ids) && $this->deleteAll(['in','studentID',$ids])){
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type'=> 'success','msg'=>"删除成功"];
        }else{
            return ['type'=>'success','msg'=>"删除失败"];
        }
    }

    public function nameCN($Sex){
        $model = $this->find()->where(['sex' => $Sex] )->one();
        return $model->sex;
    }

    public function nameTP($Type){
        $model = $this->find()->where(['type' => $Type])->one();
        return $model->type;
    }

    //获取班级
    public function getClasses(){
        return Student::hasOne(Classes::className(),["classesID" => "classesID"]);
    }
}
