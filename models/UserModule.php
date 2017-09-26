<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user_module}}".
 *
 * @property int $userModuleID
 * @property int $userID
 * @property int $moduleID
 * @property string $remark
 */
class UserModule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_module}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userID', 'moduleID'], 'integer'],
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
            'moduleID' => Yii::t('app', 'Module ID'),
            'remark' => Yii::t('app', 'Remark'),
        ];
    }

    public static function insertUserModule($userID,$functionID){
        $function = Functions::find()->where(['functionID' => $functionID])->asArray()->one();
        $userModule = new UserModule();
        $userModule->userID = $userID;
        $userModule->moduleID = $function['moduleID'];
        $userModule->save(false);
    }

    /**
     * 根据User 查询默认有权限的模块
     * @param $user
     */
    public static function queryModulesInfoByUser(){
        $model = UserModule::find()->where(['userID' => Yii::$app->user->identity->getId()])->asArray()->one();
        if (sizeof($model) == 0){
            return "无可操作模块";
        }else{
            $modules = Modules::find()->where(['moduleID' => $model['moduleID']])->asArray()->one();
            return $modules['name'];
        }
    }
}
