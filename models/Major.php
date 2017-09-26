<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "major".
 *
 * @property int $majorID
 * @property string $code
 * @property string $name
 * @property string $englishName
 * @property int $departmentID
 * @property string $type 1博士、2硕士、3本科、4大专、5其他
 * @property string $discipline
 * @property string $isEnroll Y是默认，N不招
 * @property string $description
 * @property string $remark
 */
class Major extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'major';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departmentID'], 'integer'],
            [['code'], 'string', 'max' => 20],
            [['name', 'englishName'], 'string', 'max' => 40],
            [['type', 'isEnroll'], 'string', 'max' => 1],
            [['discipline'], 'string', 'max' => 2],
            [['description'], 'string', 'max' => 600],
            [['remark'], 'string', 'max' => 100],
            [['name','code'],'unique', 'message' => '{attribute}已存在'],
            [['name','code'],'required' ],
            ['englishName', 'match', 'pattern' => '/^[a-zA-Z]+$/'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'majorID' => Yii::t('app', 'Major ID'),
            'code' => Yii::t('app', 'Major Code'),
            'name' => Yii::t('app', 'Major Name'),
            'englishName' => Yii::t('app', 'Major EnglishName'),
            'departmentID' => Yii::t('app', 'Major DepartmentID'),
            'type' => Yii::t('app', 'Major Type'),
            'discipline' => Yii::t('app', 'Major Discipline'),
            'isEnroll' => Yii::t('app', 'Major IsEnroll'),
            'description' => Yii::t('app', 'Major Description'),
            'remark' => Yii::t('app', 'Major Remark'),
        ];
    }
    public static function queryFunCN($id){
        if ($id == "1"){
            return "是";
        }
        return "否";
    }

    /**
     * 创建或更新一条记录
     * @return array
     */
    public function createOrUpdateOne($majorName) {
        if ($this->isNewRecord) {
            $msg = '创建';
        } else {
            $msg = '更新';
        }
        if ($this->save(false)) {
            $log = new ActLog();
            $log->addLog($majorName,$msg,$this->majorID);
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
    public function deleteBatch($ids,$majorName) {
        if (count($ids) && $this->deleteAll(['in','majorID',$ids])) {
            $log = new ActLog();
            $log->addLog($majorName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }
    public function nameCN($type) {
        $model = $this->find()->where(['type' => $type])->one();
        return $model->type;
    }
    //通过其他表的id获取返回其name
    public function getDepartment()
    {
        return Major::hasOne(Department::className(),["departmentID" => "departmentID"]);
    }

    public function getStudent()
    {
        return Major::hasOne(Student::className(),["type" => "type"]);
    }

    public static function queryAllMajor()
    {
        $model = Major::find()->asArray()->all();
        // 已moduleID为key name为value
        $major = array_combine(ArrayHelper::getColumn($model, "majorID"),ArrayHelper::getColumn($model, "name"));
        return $major;
    }
}
