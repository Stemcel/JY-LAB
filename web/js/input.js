$(function () {
    //  呼出新增列表
    $('#create').bind('click', function () {
        if ($(this).html() == '新增') {
            $(this).html('返回');
        } else {
            $(this).html('新增');
        }
        $('#create-table').slideToggle();
        $('#w0').slideToggle();
    })

    // 添加数据
    $('#input').bind('click', function () {
        var $str;
        var $trLen = $('.input-editable-tr').length;
        var $tdLen = $('.input-editable-td').length;
        var $len = $tdLen / $trLen;
        var $id = getUrlParam('id');
        var $flag = getUrlParam('flag');
        var $testLibrary = getUrlParam('testLibrary');
        $('.input-editable-td').each(function (index) {
            var $temp = $('.input-editable-td').eq(index).val();
            if ($str) {
                $str += $temp + '|';
            } else {
                $str = $temp + '|';
            }
        });
        $.ajax({
            url: 'word-or-sentence?id=' + $id + '&flag=' + $flag + '&testLibrary=' + $testLibrary,
            data: {data: $str, num: $len},
            dataType: "text",
            type: "post",
            success: function (data) {
            }
        });
    })

    // 动态添加一行
    $('#appendRow').bind('click', function () {
        $('#tbody').append('<tr class="input-editable-tr">' + $('.input-editable-tr').html()) + '</tr>';
    })

    // 获取Url参数
    function getUrlParam(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
        var r = window.location.search.substr(1).match(reg);  //匹配目标参数
        if (r != null) return unescape(r[2]);
        return null; //返回参数值
    }
})
