<?php
/**
 * 适合本系统的简单的详情页
 * 使用\kartik\detail\DetailView，使用 app\components\DetailView 覆盖了panel样式
 * 包含配置等
 */

namespace app\widgets;

use app\components\DetailView;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Url;
use Yii;

class SimpleDetailView extends Widget
{
    const TYPE_VIEW = 'view_only'; // 只可见，默认值
    const TYPE_EDIT = 'can_edit'; // 可编辑
    const TYPE_EDIT_AT_ONCE = 'edit_at_once'; // 直接进入编辑状态

    /**
     * 必配，Model
     * @var
     */
    public $model;

    /**
     * 必配，显示的列
     * @var array
     */
    public $attributes;

    /**
     * 必配，类型，是否可编辑
     * @var
     */
    public $type;

    /**
     * 必配 header 的 title
     * @var string
     */
    public $title;

    /**
     * 选配 header border 的颜色
     * 默认是和系统配色一致
     * @var string
     */
    public $borderedColor;

    /**
     * 选配，当type是edit的时候起作用，用于update的地址
     * 传递 Url::to([])中间的数组
     * @var array
     */
    public $updateAction;

    public function init() {
        if (!isset($this->model)) {
            throw new Exception('必须设置 model');
        }
        if (!isset($this->title)) {
            throw new Exception('必须设置 title');
        }

        if (!isset($this->attributes) || !is_array($this->attributes)) {
            throw new Exception('attributes 必须是一个数组');
        }

        if (!isset($this->type)) {
            $this->type = self::TYPE_VIEW;
        }

        if (empty($this->borderedColor)) {
            $this->borderedColor = Yii::$app->params['color'];
        }
    }

    /**
     * 获取配置信息
     * @return array
     * @throws Exception
     */
    protected function getConfig() {
        $config = [
            'model' => $this->model,
            'attributes' => $this->attributes,
            'bordered' => false,
            'striped' => false,
            'condensed' => false,
            'responsive' => true,
            'hover' => true,
            'labelColOptions' => ['style' => 'width:8%;text-align:right;'],
            'valueColOptions' => ['style' => 'width:25%'],
            'fadeDelay' => 100,
            'formOptions' => [
                'action' => Url::to($this->updateAction)
            ],
            'buttons1' => '{update}',
        ];
        if ($this->type == self::TYPE_VIEW) {
            $config = array_merge($config, [
                'mode' => DetailView::MODE_VIEW,
                'panel' => [
                    'heading' => '<p class="panel-title"><i class="fa fa-info"></i> ' . $this->title . '</p>',
                    'headingOptions' => [
                        'class' => 'header bordered-' . $this->borderedColor,
                        'template' => '{title}'
                    ],
                ],
            ]);
        } elseif ($this->type == self::TYPE_EDIT) {
            $config = array_merge($config, [
                'panel' => [
                    'heading' => '<p class="panel-title"><i class="fa fa-info"></i> ' . $this->title . '</p>',
                    'headingOptions' => [
                        'class' => 'header bordered-' . $this->borderedColor,
                        'template' => '{buttons}{title}'
                    ],
                ],
            ]);
        } elseif ($this->type == self::TYPE_EDIT_AT_ONCE) {
            $config = array_merge($config, [
                'mode' => DetailView::MODE_EDIT,
                'panel' => [
                    'heading' => '<p class="panel-title"><i class="fa fa-info"></i> ' . $this->title . '</p>',
                    'headingOptions' => [
                        'class' => 'header bordered-' . $this->borderedColor,
                        'template' => '{buttons}{title}'
                    ],
                ],
            ]);
        } else {
            throw new Exception('不支持的type类型');
        }
        return $config;
    }

    /**
     * 生成列表
     * @throws \Exception
     */
    public function run() {
        $config = $this->getConfig();
        echo DetailView::widget($config);
    }

}