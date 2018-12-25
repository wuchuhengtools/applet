<?php

namespace app\lib\exception;

class ProductException extends BaseException
{
    /**
     * @info 主题接口错误
     *
     */
    public $code = 400;
    public $msg  = "没有该商品的数据,请检查参数";
    public $errorCode = 20000;
 
}
