<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%role_function}}".
 *
 * @property int $roleFunctionID
 * @property int $functionID
 * @property int $roleID
 * @property string $addFun
 * @property string $modifyFun
 * @property string $deleteFun
 * @property string $queryFun
 * @property string $importFun
 * @property string $exportFun
 * @property string $printFun
 * @property string $otherFun1
 * @property string $otherFun2
 * @property string $otherFun3
 * @property string $remark
 */
class RoleFunction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%role_function}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['functionID'], 'required'],
            [['functionID', 'roleID'], 'integer'],
            [['addFun', 'modifyFun', 'deleteFun', 'queryFun', 'importFun', 'exportFun', 'printFun', 'otherFun1', 'otherFun2', 'otherFun3'], 'string', 'max' => 1],
            [['remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'roleFunctionID' => Yii::t('app', 'Role Function ID'),
            'functionID' => Yii::t('app', 'Function ID'),
            'roleID' => Yii::t('app', 'Role ID'),
            'addFun' => Yii::t('app', 'Add Fun'),
            'modifyFun' => Yii::t('app', 'Modify Fun'),
            'deleteFun' => Yii::t('app', 'Delete Fun'),
            'queryFun' => Yii::t('app', 'Query Fun'),
            'importFun' => Yii::t('app', 'Import Fun'),
            'exportFun' => Yii::t('app', 'Export Fun'),
            'printFun' => Yii::t('app', 'Print Fun'),
            'otherFun1' => Yii::t('app', 'Other Fun1'),
            'otherFun2' => Yii::t('app', 'Other Fun2'),
            'otherFun3' => Yii::t('app', 'Other Fun3'),
            'remark' => Yii::t('app', 'Remark'),
        ];
    }

    public function getFunctions(){
        return RoleFunction::hasOne(Functions::className(), ["functionID" => "functionID"]);
    }

    /**
     * 批量删除
     * @return array
     * @throws \Exception
     */
    public function deleteBatch($ids,$moduleName) {
        if (count($ids) && $this->deleteAll(['in','roleFunctionID',$ids])) {
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }
}
