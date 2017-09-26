<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laboratory_course".
 *
 * @property int $Id
 */
class LaboratoryCourse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'laboratory_course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'ID'),
        ];
    }
}
