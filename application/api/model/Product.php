<?php
namespace app\api\model;

class Product extends Base
{
    protected $hidden = ['update_time','delete_time','create_time','img_id','main_img_id','from','category_id','pivot'];


    /**
     * @info    修改图片url资源路径
     *
     */
    public function getMainImgUrlAttr($value,$data)
    {
        switch((int)$data{'from'})
        {
            case 1 : return $value;break; //本地资源
            case 2 : return config('img_prefix').$value;break; //远程资源
            default : return $value;break; //本地资源
        }
    }



}
