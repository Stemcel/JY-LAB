<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\components\AttrTrait;
use yii\caching\TagDependency;

/**
 * This is the model class for table "purchase_catalogue".
 *
 * @property int $purchaseCatalogueID
 * @property string $code
 * @property int $parentCode 父类编号
 * @property string $name 名称
 * @property string $description
 * @property string $type 采购类型  XML配置
 * @property string $isCollection 是否汇总  0汇总  1 不汇总
 * @property string $remark
 */
class PurchaseCatalogue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase_catalogue';
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentCode'], 'integer'],
            [['code', 'name', 'remark'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
            [['type'], 'string', 'max' => 40],
            [['isCollection'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'purchaseCatalogueID' => Yii::t('app', 'Purchase Catalogue ID'),
            'code' => Yii::t('app', 'Purchase Catalogue Code'),
            'parentCode' => Yii::t('app', 'Parent Code'),
            'name' => Yii::t('app', 'Purchase Catalogue Name'),
            'description' => Yii::t('app', 'Purchase Catalogue Description'),
            'type' => Yii::t('app', 'Purchase Catalogue Type'),
            'isCollection' => Yii::t('app', 'Is Collection'),
            'remark' => Yii::t('app', 'Remark'),
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
        return $this->purchaseCatalogueID;
    }

    /**
     * 创建或更新一条记录
     * @return array
     */
    public function createOrUpdateOne($moduleName)
    {
        if ($this->isNewRecord) {
            $msg = '申请';
        } else {
            $msg = '批准';
        }
        if ($this->save(false)) {
            $log = new ActLog();
            $log->addLog($moduleName, $msg, $this->purchaseCatalogueID);
            return ['type' => 'success', 'msg' => $msg . '已提交'];
        } else {
            return ['type' => 'success', 'msg' => $msg . '失败'];
        }
    }

    /**
     * 批量删除
     * @return array
     * @throws \Exception
     */
    public function deleteBatch($ids, $moduleName)
    {
        if (count($ids) && $this->deleteAll(['in', 'purchaseCatalogueID', $ids])) {
            $log = new ActLog();
            $log->addLog($moduleName, "删除", implode(",", $ids));
            return ['type' => 'success', 'msg' => '删除成功'];
        } else {
            return ['type' => 'error', 'msg' => '删除失败'];
        }
    }

    public static function queryAllPurchaseCatalogue()
    {
        $model = PurchaseCatalogue::find()->asArray()->all();
        $modules = array_combine(ArrayHelper::getColumn($model, "purchaseCatalogueID"),ArrayHelper::getColumn($model, "name"));
        return $modules;
    }

    public static function queryAllPurchaseDescription()
    {
        $model = PurchaseCatalogue::find()->asArray()->all();
        $modules = array_combine(ArrayHelper::getColumn($model, "description"),ArrayHelper::getColumn($model, "description"));
        return $modules;
    }
    /**
     * @param $id
     * @return mixed
     */
    public function nameCN($id)
    {
        $model = $this->find()->where(['isCollection' => $id] )->one();
        return $model['isCollection'];
    }

    public function typeCN($id)
    {
        $model = $this->find()->where(['type' => $id] )->one();
        return $model['type'];
    }

    public function nameLa($id)
    {
        $model = PurchaseCatalogue::find()->where(['code' => $id])->asArray()->one();
        return $model;
    }

    /**
     * 获取所有分类Model
     * @return mixed|null
     * @throws \Exception
     */
    private static $categorys = null;
    public static function getCategoryList()
    {
        if (is_null(self::$categorys)) {
            $dep = new TagDependency(['tags' => 'purchase_catalogue']);
            self::$categorys = PurchaseCatalogue::getDb()->cache(function ($db) {
                $data = [];
                $categorys = self::getAllCategorys();
                foreach ($categorys as $category) {
                    $data[$category->purchaseCatalogueID] = $category;
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
    public static function getCategoryByPid($parentCode)
    {
        $categorys = self::getCategoryList();
        $data = [];
        foreach ($categorys as $category) {
            if ($category->pid == $parentCode) {
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
        $categorys = PurchaseCatalogue::getCategoryList();
        $first = [];
        foreach ($categorys as $category) {
            if ($category->parentCode == 0) {
                $first[] = $category->purchaseCatalogueID;
            }
            $treeDict[$category->parentCode][] = $category->purchaseCatalogueID;
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
        $categorys = PurchaseCatalogue::getCategoryList();
        $category = ArrayHelper::getValue($categorys, $key);
        $tree = array(
            'title' => $category ? $category->name : '',
            'key' => $category ? $category->purchaseCatalogueID : 0,
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
        $categorys = PurchaseCatalogue::getCategoryList();
        foreach ($categorys as $category) {
            if (!isset($pid2ids[$category->parentCode])) {
                $pid2ids[$category->parentCode] = [];
            }
            $pid2ids[$category->parentCode][] = $category->purchaseCatalogueID;
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
        return self::getTopCategoryid($this->purchaseCatalogueID);
    }

    /**
     * 获取一级分类
     * @param $categoryid
     * @return int
     */
    public static function getTopCategoryid($purchaseCatalogueID)
    {
        $categorys = self::getCategoryList();
        $category = ArrayHelper::getValue($categorys, $purchaseCatalogueID);
        if (!$category) {
            return 0;
        }
        while ($category->parentCode) {
            $category = ArrayHelper::getValue($categorys, $category->parentCode);
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
        $category = ArrayHelper::getValue($categorys, $this->parentCode);
        if (empty($category) || $category->parentCode == 0) {
            return null;
        }
        $data = [
            'categoryid' => $this->purchaseCatalogueID,
            'categoryid2' => $this->parentCode,
            'categoryid1' => $category->parentCode,
        ];
        $categorys = ArrayHelper::map($categorys, 'purchaseCatalogueID', 'name');
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
        TagDependency::invalidate(Yii::$app->cache, 'purchase_catalogue');
    }

    /**
     * 删除数据缓存失效
     */
    public function afterDelete()
    {
        parent::afterDelete();
        TagDependency::invalidate(Yii::$app->cache, 'purchase_catalogue');
    }

}
