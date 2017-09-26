<?php
/**
 * 适合本系统的ActiveForm
 */

namespace app\components;

use yii\helpers\Html;
use Yii;

class ActiveFormContract extends \yii\widgets\ActiveForm
{
    const TYPE_ONE = 'horizontal';

    public $type;

    public $renderReturn = true;
    public $returnLabel = '返回';
    public $returnHref;
    public $returnOptions = ['class' => 'btn btn-default'];

    public $renderSubmit = true;
    public $submitLabel = '保存并编辑合同明细';
    public $submitOptions;

    /**
     * 是否渲染外部 htnl 布局
     * @var bool
     */
    public $renderWrap = true;

    /**
     * 标题
     * renderWrap = true 时有效
     * @var string
     */
    public $title;

    /**
     * 标题底部颜色
     * renderWrap = true 时有效，默认系统配色
     * @var string
     */
    public $borderedColor;

    public function init() {
        if (!isset($this->type)) {
            $this->type = self::TYPE_ONE;
        }
        if ($this->type == self::TYPE_ONE) {
            $this->options = [
                'class' => 'form-horizontal'
            ];
            $this->fieldConfig = [
                'template' => '{label}<div class="col-sm-5">{input}</div>{error}',
                'labelOptions' => ['class' => 'control-label col-sm-2'],
                'errorOptions' => ['class' => 'help-block col-sm-5']
            ];
        }
        if (!isset($this->returnHref)) {
            $this->returnHref = 'javascript:history.back()';
        }
        if (!isset($this->submitOptions)) {
            $this->submitOptions = ['class' => 'btn btn-' . Yii::$app->params['color']];
        }
        parent::init();
    }

    public static function begin($config = []) {
        $renderWrap = isset($config['renderWrap']) ? $config['renderWrap'] : true;
        $title = isset($config['title']) ? $config['title'] : '';
        $borderedColor = isset($config['borderedColor']) ? $config['borderedColor'] : Yii::$app->params['color'];
        if ($renderWrap) {
            echo Html::beginTag('div', ['class' => 'well with-header']);
            echo Html::tag('div', Html::tag('p', '<span class="fa fa-edit"></span> ' . $title, ['class' => 'panel-title']), ['class' => 'header bordered-' . $borderedColor]);
        }
        return parent::begin($config);
    }

    public static function end() {
        /** @var self $widget */
        $widget = parent::end();
        if ($widget->renderWrap) {
            echo Html::endTag('div');
        }
        return $widget;
    }

    /**
     * 生成表单提交按钮
     * @return string
     */
    public function renderFooterButtons() {
        if ($this->renderReturn) {
            $btnReturn = Html::a($this->returnLabel, $this->returnHref, $this->returnOptions);
        }
        if ($this->renderSubmit) {
            $btnSubmit = Html::submitButton($this->submitLabel, $this->submitOptions);
        }
        if ($this->type == self::TYPE_ONE) {
            $options = [
                'class' => 'col-sm-offset-2 col-sm-5'
            ];
        }
        return Html::tag('div',
            Html::tag('div',
                (isset($btnReturn) ? $btnReturn : '') . ' ' .
                (isset($btnSubmit) ? $btnSubmit : ''),
                isset($options) ? $options : ''),
            ['class' => 'form-group']);
    }
}