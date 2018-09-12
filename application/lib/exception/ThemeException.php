<?php
namespace app\lib\exception;
class ThemeException extends BaseException
{
    /**
     * @info 主题接口错误
     *
     */
    public $code = 400;
    public $msg  = "指定主题不存在";
    public $errorCode = 30000;

}
