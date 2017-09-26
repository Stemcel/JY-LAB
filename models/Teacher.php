<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
error_reporting(0);
/**
 * This is the model class for table "teacher".
 *
 * @property int $teacherID
 * @property string $code
 * @property string $name
 * @property string $sex 1男2女0未知
 * @property int $departmentID
 * @property string $title
 * @property string $titleDate
 * @property string $status
 * @property string $background
 * @property string $degree 1博士2硕士3本科4其他
 * @property string $backgroundDate
 * @property string $backgroundSchool
 * @property string $workDate
 * @property string $remark
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacherID', 'departmentID'], 'integer'],
            [['titleDate', 'backgroundDate', 'workDate'], 'safe'],
            [['code'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 255],
            [['sex', 'background'], 'string', 'max' => 2],
            [['title', 'status'], 'string', 'max' => 3],
            [['degree'], 'string', 'max' => 1],
            [['backgroundSchool'], 'string', 'max' => 40],
            [['remark'], 'string', 'max' => 100],
            [['code'],'unique', 'message' => '{attribute}已存在'],
            [['name','code'],'required' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'teacherID' => Yii::t('app', 'Teacher ID'),
            'code' => Yii::t('app', 'Teacher Code'),
            'name' => Yii::t('app', 'Teacher Name'),
            'sex' => Yii::t('app', 'Teacher Sex'),
            'departmentID' => Yii::t('app', 'Department ID'),
            'title' => Yii::t('app', 'Teacher Title'),
            'titleDate' => Yii::t('app', 'Teacher Title Date'),
            'status' => Yii::t('app', 'Teacher Status'),
            'background' => Yii::t('app', 'Teacher Background'),
            'degree' => Yii::t('app', 'Teacher Degree'),
            'backgroundDate' => Yii::t('app', 'Teacher Background Date'),
            'backgroundSchool' => Yii::t('app', 'Teacher Background School'),
            'workDate' => Yii::t('app', 'Teacher Work Date'),
            'remark' => Yii::t('app', 'Teacher Remark'),
        ];
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
        return $this->teacherID;
    }



    /**
     * 创建或更新一条记录
     * @return array
     */
    public function createOrUpdateOne($moduleName) {
        if ($this->isNewRecord) {
            $msg = '创建';
        } else {
            $msg = '更新';
        }
        if ($this->save(false)) {
            $log = new ActLog();
            $log->addLog($moduleName,$msg,$this->teacherID);
            return ['type' => 'success', 'msg' => $msg . '成功'];
        } else {
            return ['type' => 'success', 'msg' => $msg . '失败'];
        }
    }

    /**
     * 批量删除
     * @return array
     * @throws \Exception
     */
    public function deleteBatch($ids,$moduleName) {

        if (count($ids) && $this->deleteAll(['in','teacherID',$ids])) {
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }

    public function nameSex($sex) {
        $model = $this->find()->where(['sex' => $sex])->one();
        return $model->sex;
    }

    public function nameDegree($degree) {
        $model = $this->find()->where(['degree' => $degree])->one();
        return $model->degree;
    }

    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ["departmentID" => "departmentID"]);
    }


    public static function queryAllTeacher()
    {
        $model = Teacher::find()->asArray()->all();
        $teacherID = array_column($model,'name');
        return $teacherID;
    }

    public static function queryAllTeachernn(){
        $model = Teacher::find()->asArray()->all();
        $teacherID = array_combine(ArrayHelper::getColumn($model, "teacherID"),ArrayHelper::getColumn($model, "name"));
        return $teacherID;
    }


    public static function queryAllTeachers()
    {
        /** @var \app\models\User $user */
        $user = Yii::$app->user->getIdentity();
        $nickname = $user->name;
        $model = Teacher::find()->where(['teacherID' => $nickname])->one();
        $tea = $model->name;
//        print_r($tea);die;
        return $tea;
    }


}
