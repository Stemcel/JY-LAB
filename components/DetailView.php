<?php
/**
 * 覆盖panel样式
 */

namespace app\components;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class DetailView extends \kartik\detail\DetailView
{
    /**
     * @inheritdoc
     * @param string $content
     * @return string
     */
    protected function renderPanel($content) {
        $panel = $this->panel;
        //$type = ArrayHelper::remove($panel, 'type', self::TYPE_DEFAULT);
        if (($heading = $this->renderPanelTitleBar('heading')) !== false) {
            $panel['heading'] = $heading;
        }
        if (($footer = $this->renderPanelTitleBar('footer')) !== false) {
            $panel['footer'] = $footer;
        }
        $alertBlock = $this->hideAlerts ? '' : $this->renderAlertBlock() . "\n";
        $panel['preBody'] = $alertBlock . $content;
        return $this->renderNewPanel($panel);
    }

    /**
     * @inheritdoc
     * @param string $type
     * @return bool
     */
    protected function renderPanelTitleBar($type) {
        $title = ArrayHelper::getValue($this->panel, $type, ($type === 'heading' ? '' : false));
        if ($title === false) {
            return false;
        }
        $options = ArrayHelper::getValue($this->panel, $type . 'Options', []);
        $template = ArrayHelper::remove($options, 'template', ($type === 'heading' ? '{buttons}{title}' : '{title}'));
        return str_replace('{title}', $title, $template);
    }

    /**
     * 重新定义panel样式
     * @param $panel
     * @param $type
     * @return string
     */
    protected function renderNewPanel($panel) {
        if (!is_array($panel)) {
            return '';
        } else {
            Html::addCssClass($options, 'well with-header');
            $panel = static::getPanelContent($panel, 'preHeading') .
                static::getPanelTitle($panel, 'heading') .
                static::getPanelContent($panel, 'preBody') .
                static::getPanelContent($panel, 'body') .
                static::getPanelContent($panel, 'postBody') .
                static::getPanelTitle($panel, 'footer') .
                static::getPanelContent($panel, 'postFooter');
            return Html::tag('div', $panel, $options);
        }
    }

    /**
     * Generates panel content
     *
     * @param array  $content the panel content components.
     * @param string $type one of the content settings
     *
     * @return string
     */
    protected static function getPanelContent($content, $type)
    {
        $out = ArrayHelper::getValue($content, $type, '');
        return !empty($out) ? $out . "\n" : '';
    }

    /**
     * Generates panel title for heading and footer.
     *
     * @param array  $content the panel content settings.
     * @param string $type whether `heading` or `footer`
     *
     * @return string
     */
    protected static function getPanelTitle($content, $type)
    {
        $title = ArrayHelper::getValue($content, $type, '');
        if (!empty($title)) {
            $options = ArrayHelper::getValue($content, $type . 'Options', []);
            $classOptions = ArrayHelper::getValue($options, 'class', '');
            return Html::tag("div", $title, ["class" => $classOptions]) . "\n";
        } else {
            return '';
        }
    }
}