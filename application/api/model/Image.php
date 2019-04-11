<?php


namespace app\api\model;


use think\Url;

class  Image  extends Base
{
    public  $hidden = [
       "id",
        "delete_time",
        "update_time",
        "from"
    ];


    /**
     *转换图片路径为绝对路径
     *
     * @value   url    图片路径
     * @data    obj     单条图片的数据对象
     * @return  url     可以访问的图片路径
     */
    public  function  getUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }

}