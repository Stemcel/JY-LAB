<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%roles}}".
 *
 * @property int $roleID 主键
 * @property string $roleCode 编号
 * @property string $name 名字
 * @property int $sort
 * @property string $remark 备注
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%roles}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['roleCode'], 'required'],
            [['sort'], 'integer'],
            [['roleCode'], 'string', 'max' => 40],
            [['name', 'remark'], 'string', 'max' => 255],
            [['name','roleCode'],'unique', 'message' => '{attribute}已存在'],
            [['name','roleCode'],'required' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'roleID' => Yii::t('app', 'Role ID'),
            'roleCode' => Yii::t('app', 'Role Code'),
            'sort' => Yii::t('app', 'Sort'),
            'name' => Yii::t('app', 'Role Name'),
            'remark' => Yii::t('app', 'Role Remark'),
        ];
    }

    /**
     * 创建或更新一条记录
     * @return array
     */
    public function createOrUpdateOne($moduleName) {
        if ($this->isNewRecord) {
            $msg = '创建';
        } else {
            $msg = '更新';
        }
        if ($this->save(false)) {
            $log = new ActLog();
            $log->addLog($moduleName,$msg,$this->roleID);
            return ['type' => 'success', 'msg' => $msg . '成功'];
        } else {
            return ['type' => 'success', 'msg' => $msg . '失败'];
        }
    }

    /**
     * 批量删除
     * @return array
     * @throws \Exception
     */
    public function deleteBatch($ids,$moduleName) {
        if (count($ids) && $this->deleteAll(['in','roleID',$ids])) {
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }
}
