<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\caching\TagDependency;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use app\components\AttrTrait;

/**
 * This is the model class for table "department".
 *
 * @property int $departmentID 自增，主键
 * @property string $code
 * @property string $name
 * @property int $parentDepartmentID
 * @property string $isLaboratory Y 是，N 不是默认
 * @property string $remark
 */
class Department extends \yii\db\ActiveRecord
{
//    const CLASS_STATUS_TRUE = 'Y';  // 可用
//    const CLASS_STATUS_FALSE = 'N'; // 停用
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentDepartmentID'], 'integer'],
            [['code','name'],'required' ],
            [['name','code'],'unique', 'message' => '{attribute}已存在'],
            [['code'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 40],
            [['isLaboratory'], 'string', 'max' => 1],
            [['remark'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'departmentID' => Yii::t('app', 'Department ID'),
            'code' => Yii::t('app', 'Department Code'),
            'name' => Yii::t('app', 'Department Name'),
            'parentDepartmentID' => Yii::t('app', 'Parent Department ID'),
            'isLaboratory' => Yii::t('app', 'Is Laboratory'),
            'remark' => Yii::t('app', 'Department Remark'),
        ];
    }


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->departmentID;
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
            $log->addLog($moduleName,$msg,$this->departmentID);
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

        if (count($ids) && $this->deleteAll(['in','departmentID',$ids])) {
            $log = new ActLog();
            $log->addLog($moduleName,"删除",implode(",",$ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }


    /**
     * 获取行政单位
     * @param $user
     */

    public static function queryAllDepartment()
    {
        $model = Department::find()->asArray()->all();
        // 已departmentID为key name为value
        $modules = array_combine(ArrayHelper::getColumn($model, "departmentID"),ArrayHelper::getColumn($model, "name"));
        return $modules;
    }


    /**
     * @inheritdoc
     * @return \app\models\Department|array|null
     */
    public function nameLa($parentDepartmentID) {
        $model = Department::find()->where(['departmentID' => $parentDepartmentID])->asArray()->one();
        return $model;

    }

    public function nameCN($isLaboratory) {
        $model = $this->find()->where(['isLaboratory' => $isLaboratory])->one();
        return $model->isLaboratory;
    }


    public static function getIsLaboratory() {
        return Yii::$app->params['isLaboratory'];
    }

    /**
     * 获取所有分类Model
     * @return mixed|null
     * @throws \Exception
     */
    use AttrTrait;
    private static $categorys = null;
    public static function getCategoryList()
    {
        if (is_null(self::$categorys)) {
            $dep = new TagDependency(['tags' => 'department']);
            self::$categorys = Department::getDb()->cache(function ($db) {
                $data = [];
                $categorys = self::getAllCategorys();
                foreach ($categorys as $category) {
                    $data[$category->departmentID] = $category;
                }
                return $data;
            }, '', $dep);
        }
        return self::$categorys;
    }

    /**
     * 获取层级分类
     * @param $pid
     * @return array
     */
    public static function getCategoryByPid($parentDepartmentID)
    {
        $categorys = self::getCategoryList();
        $data = [];
        foreach ($categorys as $category) {
            if ($category->pid == $parentDepartmentID) {
                $data[] = $category;
            }
        }
        return $data;
    }

    /**
     * 获取分类展示树形结构数据
     * @return array
     */
    public static function getCategoryTree()
    {
        $buffer = $treeData = $treeDict = [];
        $categorys = Department::getCategoryList();
        $first = [];
        foreach ($categorys as $category) {
            if ($category->parentDepartmentID == 0) {
                $first[] = $category->departmentID;
            }
            $treeDict[$category->parentDepartmentID][] = $category->departmentID;
        }
        foreach ($first as $value) {
            $treeData[] = self::generateTree($treeDict, $value, $buffer);

        }
        return $treeData;
    }

    /**
     * fancyTree所需Array结构
     * @param $data
     * @param $key
     * @param $buffer
     * @return array
     */
    public static function generateTree($data, $key, &$buffer)
    {
        $categorys = Department::getCategoryList();
        $category = ArrayHelper::getValue($categorys, $key);
        $tree = array(
            'title' => $category ? $category->name : '',
            'key' => $category ? $category->departmentID : 0,
            'children' => [],
        );
        if (isset($buffer[$key])) {
            return $tree;
        }
        if (!empty($data[$key])) {
            foreach ($data[$key] as $subkey) {
                $tree['children'][] = self::generateTree($data, $subkey, $buffer);
            }
        }
        return $tree;
    }

    /**
     * 获取分类下所有子分类的ids
     * @param $id
     * @return array
     */
    public static function getChildrenIds($id)
    {
        $categorys = Department::getCategoryList();
        foreach ($categorys as $category) {
            if (!isset($pid2ids[$category->parentDepartmentID])) {
                $pid2ids[$category->parentDepartmentID] = [];
            }
            $pid2ids[$category->parentDepartmentID][] = $category->departmentID;
        }
        $pids = [$id];
        $ids = $pids;
        while ($pids) {
            $id = [];
            foreach ($pids as $pid) {
                if (isset($pid2ids[$pid])) {
                    $id = $pid2ids[$pid];
                    $ids = array_merge($ids, $id);
                }
            }
            $pids = $id;
        }
        return $ids;
    }

    /**
     * 获取所有一级分类
     * @return array
     */
    public static function getTopCategorys()
    {
        return self::getCategoryByPid(0);
    }

    /**
     * 获取自身的一级分类
     * @param
     * @return int
     */
    public function getTopid()
    {
        return self::getTopCategoryid($this->departmentID);
    }

    /**
     * 获取一级分类
     * @param $categoryid
     * @return int
     */
    public static function getTopCategoryid($departmentID)
    {
        $categorys = self::getCategoryList();
        $category = ArrayHelper::getValue($categorys, $departmentID);
        if (!$category) {
            return 0;
        }
        while ($category->parentDepartmentID) {
            $category = ArrayHelper::getValue($categorys, $category->parentDepartmentID);
        }
        return $category ? $category->id : 0;
    }

    /**
     * 获取三级 二级 一级的分类id
     * @return array|null
     */
    public function getCategoryIds()
    {
        $categorys = self::getCategoryList();
        $category = ArrayHelper::getValue($categorys, $this->parentDepartmentID);
        if (empty($category) || $category->parentDepartmentID == 0) {
            return null;
        }
        $data = [
            'categoryid' => $this->departmentID,
            'categoryid2' => $this->parentDepartmentID,
            'categoryid1' => $category->parentDepartmentID,
        ];
        $categorys = ArrayHelper::map($categorys, 'departmentID', 'name');
        $data['categorys'] = $categorys;
        if (!isset($categorys[$data['categoryid1']])) {
            $categorys[$data['categoryid1']] = '未定义分类(1)';
        }
        if (!isset($categorys[$data['categoryid2']])) {
            $categorys[$data['categoryid2']] = '未定义分类(2)';
        }
        if (!isset($categorys[$data['categoryid']])) {
            $categorys[$data['categoryid']] = '未定义分类(3)';
        }
        return $data;
    }

    public static function getAllCategorys()
    {
        return self::find()->all();
    }

    /**
     * 修改数据缓存失效
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        TagDependency::invalidate(Yii::$app->cache, 'department');
    }

    /**
     * 删除数据缓存失效
     */
    public function afterDelete()
    {
        parent::afterDelete();
        TagDependency::invalidate(Yii::$app->cache, 'department');
    }
}
