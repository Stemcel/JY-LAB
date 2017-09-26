<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laboratory_teacher".
 *
 * @property int $laboratoryTeacherID
 * @property int $laboratoryID
 * @property int $teacherID
 * @property string $type 0专职 1 兼职
 * @property string $position XML配置
 * @property string $remark
 */
class LaboratoryTeacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'laboratory_teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['laboratoryID', 'teacherID'], 'integer'],
            [['type'], 'string', 'max' => 1],
            [['position'], 'string', 'max' => 20],
            [['remark'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'laboratoryTeacherID' => Yii::t('app', 'LaboratoryTeacher ID'),
            'laboratoryID' => Yii::t('app', 'LaboratoryTeacher LaboratoryID'),
            'teacherID' => Yii::t('app', 'LaboratoryTeacher TeacherID'),
            'type' => Yii::t('app', 'LaboratoryTeacher Type'),
            'position' => Yii::t('app', 'LaboratoryTeacher Position'),
            'remark' => Yii::t('app', 'Remark'),
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
            $log->addLog($moduleName,$msg,$this->laboratoryTeacherID);
            return ['type' => 'success', 'msg' => $msg . '已提交'];
        } else {
            return ['type' => 'success', 'msg' => $msg . '失败'];
        }
    }

    public function deleteBatch($ids,$moduleName) {

        if (count($ids) && $this->deleteAll(['in','laboratoryTeacherID',$ids])) {
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }


    public function getLaboratory()
    {
        return LaboratoryTeacher::hasOne(Laboratory::className(),
            [
                "laboratoryID" => "laboratoryID"
            ]);
    }

    public function getTeacher()
    {
        return LaboratoryTeacher::hasOne(Teacher::className(),
            [
                "teacherID" => "teacherID"
            ]);
    }

    public function nameCNS($type){
        $model = $this->find()->where(['type' => $type])->one();
        return $model['type'];
    }

}
