<?php
use wbraganca\fancytree\FancytreeWidget;
use yii\helpers\Html;
use yii\web\JsExpression;

$this->title = '部门分类管理';
?>
<div class="category-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?=Html::a('<span class="btn btn-success fa fa-plus">添加部门</span>', ['create-m'], ['title' => '添加'] );?>
    <button class="btn btn-success fa fa-plus" onclick="createNode()">添加子部门</button>
    <button class="btn btn-danger fa fa-minus" onclick="deleteNode()">删除</button>
</div>
<?php

$gl = [
    'map' => [
        "doc" => "glyphicon glyphicon-file",
        "docOpen" => "glyphicon glyphicon-file",
        "checkbox" => "glyphicon glyphicon-unchecked",
        "checkboxSelected" => "glyphicon glyphicon-check",
        "checkboxUnknown" => "glyphicon glyphicon-share",
        "dragHelper" => "glyphicon glyphicon-play",
        "dropMarker" => "glyphicon glyphicon-arrow-right",
        "error" => "glyphicon glyphicon-warning-sign",
        "expanderClosed" => "glyphicon glyphicon-menu-right",
        "expanderLazy" => "glyphicon glyphicon-menu-right",
        "expanderOpen" => "glyphicon glyphicon-menu-down",
        "folder" => "glyphicon glyphicon-folder-close",
        "folderOpen" => "glyphicon glyphicon-folder-open",
        "loading" => "glyphicon glyphicon-refresh glyphicon-spin"
    ]
];
// Example of data.
echo \wbraganca\fancytree\FancytreeWidget::widget([
    'id' => 'tree',
    'class' => 'fancytree-colorize-hover fancytree-fade-expander',
    'options' => [
        'source' => $data,
        'extensions' => ['edit', 'glyph'],
        'autoCollapse' => true,
        'autoScroll' => true,
        'glyph' => $gl,
        'table' => [
            'checkboxColumnIdx' => 1,
            'nodeColumnIdx' => 2
        ],
        'edit' => [
            'triggerStart' => ["f2", "dblclick", "shift+click", "mac+enter"],
            'beforeEdit' => new JsExpression('function(event, data){}'),
            'edit' => new JsExpression('function(event, data){
}'),
            'save' => new JsExpression('function(event, data){
    return true;
}'),
            'close' => new JsExpression('function (event, data) {
        console.log(data)
        if (data.save) {
            if (data.isNew) {
                $.ajax({
                    url: "create",
                    type: "POST",
                    data: {
                        parentDepartmentID: data.node.parent.key,
                        name: data.node.title
                    },
                    success: function (data) {
                        if (data == 1) {
                            location.reload();
                            alert("添加成功");
                        } else {
                            alert("添加失败");
                        }
                    }
                });
            } else {
                $.ajax({
                    url: "update?id=" + data.node.key,
                    type: "POST",
                    data: {
                        name: data.node.title
                    },
                    success: function (data) {
                        if (data == 1) {
                           alert("修改成功");
                        } else {
                            alert("添加失败");
                        }
                    }
                });
            }
            $(data.node.span).addClass("pending");
        }
    }'),

        ],
    ]
]);
?>
<script>
    function createNode() {
        var node = $("#fancyree_tree").fancytree("getActiveNode");
        if (!node) {
            alert("请选择一个节点");
            return;
        }
        node.editCreateNode("child", "");
    }
    function deleteNode() {
        var node = $("#fancyree_tree").fancytree("getActiveNode");
        if (!node) {
            alert("Please activate a parent node.");
            return;
        }
        if (confirm("你确定要删除这个分类吗?") == true) {
            $.ajax({
                url: "delete" ,
                type: "POST",
                data: {
                    id: node.key
                },
                success: function (data) {
                    if (data == 0) {
                        location.reload();
                    } else {
                        alert(data);
                    }
                }
            });
            console.log('to do');
        }
    }
    function updaNode() {
        var node = $("#fancyree_tree").fancytree("getActiveNode");
        if (!node) {
            alert("Please activate a parent node.");
            return;
        }

        $.ajax({
            url: "upda",
            type: "POST",
            data: {
                id: node.key
            },
            success: function (data) {
                if (data == 0) {
                    location.reload();
                } else {
                    alert(data);
                }
            }
        });
        console.log('to do');

    }
</script>