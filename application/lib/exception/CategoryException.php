<?php


namespace app\lib\exception;


class CategoryException extends  BaseException
{
    /**
     *最新商品接口错误
     *
     */
    public $code = 400;
    public $msg  = "没有分类数据";
    public $errorCode = 40000;
}