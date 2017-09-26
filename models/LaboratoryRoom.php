<?php

namespace app\models;

use Yii;
use app\models\Laboratory;

/**
 * This is the model class for table "laboratory_room".
 *
 * @property int $laboratoryRoomID
 * @property int $laboratoryID
 * @property int $roomID
 * @property string $remark
 */
class LaboratoryRoom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'laboratory_room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['laboratoryID', 'roomID'], 'integer'],
            [['remark'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'laboratoryRoomID' => Yii::t('app', 'Laboratory Room ID'),
            'laboratoryID' => Yii::t('app', 'LaboratoryRoom  laboratoryID'),
            'roomID' => Yii::t('app', 'LaboratoryRoom RoomID'),
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
            $log->addLog($moduleName,$msg,$this->laboratoryRoomID);
            return ['type' => 'success', 'msg' => $msg . '已提交'];
        } else {
            return ['type' => 'success', 'msg' => $msg . '失败'];
        }
    }

    public function deleteBatch($ids,$moduleName) {

        if (count($ids) && $this->deleteAll(['in','laboratoryRoomID',$ids])) {
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }

    public function getLaboratory()
    {
        return LaboratoryRoom::hasOne(Laboratory::className(),
            [
                "laboratoryID" => "laboratoryID"
            ]);
    }

    public function getRoom()
    {
        return LaboratoryRoom::hasOne(Room::className(),
            [
                "roomID" => "roomID"
            ]);
    }
}
