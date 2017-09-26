<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laboratory_equipment".
 *
 * @property int $laboratoryEquipmentID
 * @property int $laboratoryID
 * @property int $equipment
 * @property int $teacherID
 * @property string $remark
 */
class LaboratoryEquipment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'laboratory_equipment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['laboratoryID', 'equipment', 'teacherID'], 'integer'],
            [['remark'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'laboratoryEquipmentID' => Yii::t('app', 'Laboratory Equipment ID'),
            'laboratoryID' => Yii::t('app', 'Laboratory ID'),
            'equipment' => Yii::t('app', 'Equipment'),
            'teacherID' => Yii::t('app', 'Teacher ID'),
            'remark' => Yii::t('app', 'Remark'),
        ];
    }
}
