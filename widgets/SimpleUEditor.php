<?php
/**
 * 适合本系统的ueditor
 * 参考文档 http://fex.baidu.com/ueditor/
 * 可配置
 */

namespace app\widgets;

use crazydb\ueditor\UEditor;
use yii\base\Exception;

class SimpleUEditor extends UEditor
{
    const TYPE_ONE = 'writing';
    const TYPE_TWO = 'source';

    /**
     * 类型
     * 上方类型中的一种，默认第一种
     * @var string
     */
    public $type;

    public $config=[
        'initialFrameHeight' => 200,
        'pasteplain' => true,   //纯文本粘贴
        'enableContextMenu' => false,   //右键菜单
        'imagePopup' => false,  //图片浮层操作
        'scaleEnabled' => true, //可以拉长
        'enableAutoSave' => false,  //自动保存
        'elementPathEnabled' => false,  //元素路径
    ];

    public function init(){
        if(empty($this->type)){
           $this->type = self::TYPE_ONE;
        }
        if($this->type === self::TYPE_ONE){
            $this->config['toolbars'] = [
                ['undo', 'redo']
            ];
        }elseif($this->type === self::TYPE_TWO){
            $this->config['toolbars'] = [
                ['undo', 'redo','|', 'bold', 'italic','source','underline','fontborder','strikethrough','subscript','superscript','forecolor','indent','|','insertorderedlist','insertunorderedlist','simpleupload','insertimage']
            ];
            $this->config['initialFrameHeight'] = 100;
        }else{
            throw new Exception('未定义类型');
        }
        parent::init();

    }
}