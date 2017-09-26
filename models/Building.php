<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "building".
 *
 * @property int $buildingID 自增，主键
 * @property string $code
 * @property int $campusID
 * @property string $name
 * @property int $departmentID
 * @property string $description
 * @property string $remark
 */
class Building extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'building';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['campusID', 'departmentID'], 'integer'],
            [['name','code'],'unique', 'message' => '{attribute}已存在'],
            [['name','code'],'required' ],
            [['code'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 40],
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
            'buildingID' => Yii::t('app', 'Building ID'),
            'code' => Yii::t('app', 'Building Code'),
            'campusID' => Yii::t('app', 'Campus ID'),
            'name' => Yii::t('app', 'Building Name'),
            'departmentID' => Yii::t('app', 'Department ID'),
            'description' => Yii::t('app', 'Building Description'),
            'remark' => Yii::t('app', 'Building Remark'),
        ];
    }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function queryAllBuilding()
    {
        $model = Building::find()->asArray()->all();
        // 已buildingID为key name为value
        $buildingID = array_combine(ArrayHelper::getColumn($model, "buildingID"),ArrayHelper::getColumn($model, "name"));
        return $buildingID;
    }


    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->buildingID;
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
            $log->addLog($moduleName,$msg,$this->buildingID);
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

        if (count($ids) && $this->deleteAll(['in','buildingID',$ids])) {
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }

    public function getCampus()
    {
        return Building::hasOne(Campus::className(), ["campusID" => "campusID"]);
    }
    public function getDepartment()
    {
        return Building::hasOne(Department::className(), ["departmentID" => "departmentID"]);
    }

}



