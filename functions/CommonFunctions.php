<?php

namespace app\functions;

class CommonFunctions
{
    /**
     * 获取当前时间
     * @return string
     */
    public static function getCurrentDateTime() {
        return date('Y-m-d H:i:s', time());
    }
}