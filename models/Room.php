<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "room".
 *
 * @property int $roomID 自增，主键
 * @property string $code
 * @property int $buildingID
 * @property string $name
 * @property int $departmentID
 * @property string $type
 * @property int $teacherID
 * @property string $useArea
 * @property string $buildingArea
 * @property int $galleryful
 * @property string $status Y在用 默认
 * @property string $application
 * @property string $description
 * @property string $remark
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['buildingID', 'departmentID', 'teacherID', 'galleryful'], 'integer'],
            [['useArea', 'buildingArea'], 'number'],
            [['code'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 40],
            [['type'], 'string', 'max' => 2],
            [['status'], 'string', 'max' => 1],
            [['application'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 400],
            [['remark'], 'string', 'max' => 100],
            [['name','code'],'unique', 'message' => '{attribute}已存在'],
            [['name','code'],'required' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'roomID' => Yii::t('app', 'Room ID'),
            'code' => Yii::t('app', 'Room Code'),
            'buildingID' => Yii::t('app', 'Room BuildingID'),
            'name' => Yii::t('app', 'Room Name'),
            'departmentID' => Yii::t('app', 'Room DepartmentID'),
            'type' => Yii::t('app', 'Room Type'),
            'teacherID' => Yii::t('app', 'Room TeacherID'),
            'useArea' => Yii::t('app', 'Room UseArea'),
            'buildingArea' => Yii::t('app', 'Room BuildingArea'),
            'galleryful' => Yii::t('app', 'Room Galleryful'),
            'status' => Yii::t('app', 'Room Status'),
            'application' => Yii::t('app', 'Room Application'),
            'description' => Yii::t('app', 'Room Description'),
            'remark' => Yii::t('app', 'Room Remark'),
        ];
    }
    //表关联
    public function getDepartment(){
        return Room::hasOne(Department::className(),["departmentID" => "departmentID"]);
    }
    public function getTeacher(){
        return Room::hasOne(Teacher::className(),["teacherID" => "teacherID"]);
    }
    public function getBuilding(){
        return Room::hasOne(Building::className(),["buildingID" => "buildingID"]);
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
    public function createOrUpdateOne($roomName) {
        if ($this->isNewRecord) {
            $msg = '创建';
        } else {
            $msg = '更新';
        }
        if ($this->save(false)) {
            $log = new ActLog();
            $log->addLog($roomName,$msg,$this->roomID);
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
    public function deleteBatch($ids,$roomName) {
        if (count($ids) && $this->deleteAll(['in','roomID',$ids])) {
            $log = new ActLog();
            $log->addLog($roomName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }
    public function nameCN($status) {
        $model = $this->find()->where(['status' => $status])->one();
        return $model->status;
    }

    public static function queryAllRoom()
    {
        $model = Room::find()->asArray()->all();
        $roomID = array_combine(ArrayHelper::getColumn($model, "roomID"),ArrayHelper::getColumn($model, "name"));
        return $roomID;
    }
    public static function queryAllLaboratory()
    {
        $model = Department::find()->asArray()->all();
        // 已departmentID为key name为value
        $modules = array_combine(ArrayHelper::getColumn($model, "departmentID"),ArrayHelper::getColumn($model, "name"));
        return $modules;
    }
}
