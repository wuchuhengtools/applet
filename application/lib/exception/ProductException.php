<?php

namespace app\lib\exception;

class ProductException extends BaseException
{
    /**
     *最新商品接口错误
     *
     */
    public $code = 400;
    public $msg  = "没商品数据，请检查参数";
    public $errorCode = 30000;

}