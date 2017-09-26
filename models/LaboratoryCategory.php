<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laboratory_category".
 *
 * @property int $laboratoryCategoryID
 * @property string $name
 * @property string $description
 * @property string $remark
 */
class LaboratoryCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'laboratory_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'laboratoryCategoryID' => Yii::t('app', 'Laboratory Category ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'remark' => Yii::t('app', 'Remark'),
        ];
    }
}
