<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teacher_achievement".
 *
 * @property int $teacherAchievementID
 * @property string $name
 * @property int $laboratoryID
 * @property string $achieveDate
 * @property string $type
 * @property string $level
 * @property string $remark
 */
class TeacherAchievement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher_achievement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['laboratoryID'], 'integer'],
            [['achieveDate'], 'safe'],
            [['name', 'remark'], 'string', 'max' => 100],
            [['type', 'level'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'teacherAchievementID' => Yii::t('app', 'Teacher Achievement ID'),
            'name' => Yii::t('app', 'Achievement Name'),
            'laboratoryID' => Yii::t('app', 'Laboratory Name'),
            'achieveDate' => Yii::t('app', 'Achieve Date'),
            'type' => Yii::t('app', 'Achievement Type'),
            'level' => Yii::t('app', 'Achievement Level'),
            'remark' => Yii::t('app', 'Achievement Remark'),
        ];
    }

    public function createOrUpdateOne($moduleName) {
        if ($this->isNewRecord) {
            $msg = '申请';
        } else {
            $msg = '批准';
        }
        if ($this->save(false)) {
            $log = new ActLog();
            $log->addLog($moduleName,$msg,$this->teacherAchievementID);
            return ['type' => 'success', 'msg' => $msg . '已提交'];
        } else {
            return ['type' => 'success', 'msg' => $msg . '失败'];
        }
    }

    public function deleteBatch($ids,$moduleName) {

        if (count($ids) && $this->deleteAll(['in','teacherAchievementID',$ids])) {
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }

    public function getTeacher()
    {
        return TeacherAchievement::hasOne(Teacher::className(),
            [
                "teacherID" => "name"
            ]);
    }

    public function getlaboratory()
    {
        return TeacherAchievement::hasOne(Laboratory::className(),
            [
                "laboratoryID" => "laboratoryID"
            ]);
    }
}
