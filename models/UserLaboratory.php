<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user_laboratory}}".
 *
 * @property int $userModuleID
 * @property int $userID
 * @property int $laboratoryID
 * @property string $remark
 */
class UserLaboratory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_laboratory}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userModuleID'], 'required'],
            [['userModuleID', 'userID', 'laboratoryID'], 'integer'],
            [['remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userModuleID' => Yii::t('app', 'User Module ID'),
            'userID' => Yii::t('app', 'User ID'),
            'laboratoryID' => Yii::t('app', 'Laboratory ID'),
            'remark' => Yii::t('app', 'Remark'),
        ];
    }
}
