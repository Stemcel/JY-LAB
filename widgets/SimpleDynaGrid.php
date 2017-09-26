<?php
/**
 * 适合本系统的简单的列表页
 * 使用\kartik\dynagrid\DynaGrid
 * 包含配置等
 */

namespace app\widgets;

use kartik\dynagrid\DynaGrid;
use yii\base\Exception;
use yii\base\Widget;
use yii\data\BaseDataProvider;
use Yii;

class SimpleDynaGrid extends Widget
{
    /**
     * 必配,id
     * @var string
     */
    public $dynaGridId;

    /**
     * 必配，显示的列
     * @var array
     */
    public $columns;

    /**
     * 必配
     * @var BaseDataProvider
     */
    public $dataProvider;

    /**
     * 选配
     * 如果配置则会出现filter，否则无
     * @var
     */
    public $searchModel;

    /**
     * 选配
     * 头部标题
     * @var string
     */
    public $title = null;

    /**
     * 额外的toolbar
     * @var array|false
     */
    public $extraToolbar = false;

    /**
     * 是否需要个性化按钮
     * @var bool
     */
    public $isDynagrid = true;

    /**
     * 是否需要导出按钮
     * @var bool
     */
    public $isExport = false;

    /**
     * 是否需要显示所有的按钮
     * @var bool
     */
    public $isToggleData = false;

    /**
     * 是否显示单页统计
     * @var bool
     */
    public $showPageSummary = false;

    /**
     * 选配 header border 的颜色
     * 默认是和系统配色一致
     * @var string
     */
    public $borderedColor;

    public function init() {
        if (!isset($this->dynaGridId)) {
            throw new Exception('必须设置 dynaGridId');
        }
        if (!isset($this->columns)) {
            throw new Exception('必须设置 columns');
        }
        if (!isset($this->dataProvider)) {
            throw new Exception('必须设置 dataProvider');
        }

        if($this->extraToolbar !== false){
            if (!is_array($this->extraToolbar)) {
                throw new Exception('extraToolbar 必须是一个数组');
            } else {
                if (!isset($this->extraToolbar[0]) || !is_array($this->extraToolbar[0])) {
                    throw new Exception('extraToolbar 必须是一个二维数组');
                }
            }
        }
        if (empty($this->borderedColor)) {
            $this->borderedColor = Yii::$app->params['color'];
        }
    }

    /**
     * 获取配置信息
     * 为以后做扩展用
     * @return array
     */
    protected function getConfig() {
        $config = [
            'columns' => $this->columns,
            'options' => [
                'id' => $this->dynaGridId,
            ],
            'storage' => 'cookie', // 如果使用db，确保数据库存在，参考：http://demos.krajee.com/dynagrid#module
            'allowFilterSetting' => false,
            'allowSortSetting' => false,
            'toggleButtonGrid' => [
                'label' => '<span class="fa fa-wrench"></span>配置',
            ],
            'gridOptions' => [
                'id' => 'grid',
                'dataProvider' => $this->dataProvider,
                'showPageSummary' => $this->showPageSummary,
                'pjax' => true,
                'pjaxSettings' => [
                    'options' => [
                        'enablePushState' => true
                    ],
                ],
                'bordered' => false,
                'striped' => false,
                'responsive' => true,
                'responsiveWrap' => false,
                'hover' => true,
                'panelTemplate' => '<div class="well with-header with-footer">{panelHeading}{panelBefore}{items}{panelAfter}{panelFooter}</div>',
                'panel' => [
                    'heading' => '<p class="panel-title"><i class="fa fa-map-marker"></i> ' . $this->title . '</p>',
                    'headingOptions' => ['class' => 'header bordered-'.$this->borderedColor],
                    'beforeOptions' => ['class' => ''],
                    'afterOptions' => ['class' => ''],
                    'footerOptions' => ['class' => 'footer text-right'],
                ],
                'pager' => [
                    'firstPageLabel' => '第一页',
                    'lastPageLabel' => '最后一页',
                ],
            ],
        ];

        if (isset($this->searchModel)) {
            $config['gridOptions']['filterModel'] = $this->searchModel;
        }

        $toolbar = [];
        if($this->extraToolbar !== false){
            $toolbar = array_merge($toolbar, $this->extraToolbar);
        }
        if ($this->isDynagrid === true) {
            array_push($toolbar, '{dynagrid}');
        }
        if ($this->isExport === true) {
            array_push($toolbar, '{export}');
        }
        if ($this->isToggleData === true) {
            array_push($toolbar, '{toggleData}');
        }
        $config['gridOptions']['toolbar'] = $toolbar;

        return $config;
    }

    /**
     * 生成列表
     * @throws \Exception
     */
    public function run() {
        $config = $this->getConfig();
        echo DynaGrid::widget($config);
    }

}