$(function () {
    var body = $("body");
    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    // 通用功能
    $(function () {
        /**
         * 批量操作
         * php需要配置
         * class 包含 simple_check_operate
         * data-url 为需要操作的地址
         * 自写对应的url地址的批量操作
         * 确保最后返回跳转地址
         * @param $class
         */
        function simpleCheckOperate($class) {
            body.on('click', '.' + $class, function () {
                var keys = $('#grid').yiiGridView('getSelectedRows');
                var url = $(this).data('url');
                var type = $(this).data("type");

                if (type == "modifyFun" || type == "deleteFun" || type == "queryFun") {
                    if (keys.length > 0) {
                        if (type == "deleteFun"){
                            var r=confirm("您确定要删除？");
                            if (r==false) {
                                return;
                            }
                        }
                        if (keys.length > 1 && (type == "modifyFun" || type == "queryFun")) {
                            alert("您不能选择超过一项");
                            return;
                        } else {
                            param = UrlSearch(url);
                            if(param){
                                window.location.href = url+"&id="+keys;
                            }else {
                                window.location.href = url+"?id="+keys;
                            }
                        }
                    } else {
                        alert("您还没有选择任何一项");
                        return;
                    }
                }
            });
        }


        simpleCheckOperate('simple_check_operate');

        /**
         * checkbox全选操作
         * 需要配置：
         * 全选的 checkbox
         * class 需要有 simple_select_all
         * data-children-name 是点击全选后会被全选的 checkbox 的 name
         * @param $checkAllName
         * @param $childrenName
         */
        function simpleSelectAll($checkAllName, $childrenName) {
            $('input[name="' + $checkAllName + '"]').change(function () {
                var checked = $(this).prop('checked');
                $('input[name="' + $childrenName + '"]').each(function () {
                    $(this).prop('checked', checked);
                });
            });
        }

        $('.simple_select_all').click(function () {
            var checkAllName = $(this).prop('name');
            var childrenName = $(this).data('children-name');
            simpleSelectAll(checkAllName, childrenName);
        });

        /**
         * 固定浮动
         */
        $('.pin-container').pin();

        /**
         * 返回顶部
         */
        $(window).scroll(function () {
            if ($(window).scrollTop() >= 100) {
                $('.actGoTop').fadeIn(300);
            } else {
                $('.actGoTop').fadeOut(300);
            }
        });
        $('.actGoTop').click(function () {
            $('html,body').animate({scrollTop: '0px'}, 800);
        });
    });






    /**
     * 获取URL参数
     * @returns {Object}
     * @constructor
     */
    function UrlSearch(url) {
        var num=url.indexOf("?");
        if (num == -1){
            return false;
        }
        return true;
    }
});