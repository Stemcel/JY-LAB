<?php

namespace app\models;

use app\functions\CommonFunctions;
use Yii;

/**
 * This is the model class for table "{{%act_log}}".
 *
 * @property int $logID
 * @property string $name
 * @property string $moduleName
 * @property string $id
 * @property string $functionName
 * @property string $date
 */
class ActLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%act_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date','name','id'], 'safe'],
            [['moduleName',  'functionName'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'logID' => Yii::t('app', 'Log ID'),
            'name' => Yii::t('app', 'Log Name'),
            'moduleName' => Yii::t('app', 'Module Name'),
            'id' => Yii::t('app', 'ID'),
            'functionName' => Yii::t('app', 'Function Name'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * 添加日志信息
     * @param $name
     * @param $moduleName     // 操作模块名
     * @param $id
     * @param $functionName   // 操作方法名
     */
    public function addLog($moduleName,$functionName,$id){
        /** @var User $user */
        $user = Yii::$app->user->identity;
        $currentDate = CommonFunctions::getCurrentDateTime();
        $this->name = $user->name;
        $this->moduleName = $moduleName;
        $this->id = $id;
        $this->functionName = $functionName;
        $this->date = $currentDate;;
        $this->save();

    }

    public function getTeacher()
    {
        return ActLog::hasOne(Teacher::className(), ["teacherID" =>"name"]);
    }
}
