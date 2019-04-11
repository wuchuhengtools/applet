<?php
namespace app\lib\exception;
use app\lib\exception\BaseException;

class WechatException extends BaseException
{
    public $code = 404;
    public $msg  = "微信接口调用失败";
    public $errorCode = 9000;
}
