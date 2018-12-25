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


    /**
     * @info  获取最新产品
     *
     * @param    int     $count    限定数量
     * @return   project           产品数据对象
     */
    public static function getMostRecent($count)
    {
        return self::name('product')
            ->limit($count)
            ->order('update_time desc')
            ->select()
            ->hidden(['summary']);
    }

}
