<?php

namespace app\api\model;

use think\Model;
use think\Db;

class Banner extends Model
{
    protected $hidden = ['delete_time', 'update_time']; //隐藏字段

    public function BannerItem ()
    {
        return $this->hasMany("BannerItem","banner_id","id");
    }


    /**
     *获取banner的信息
     *@id   传来的id号
     */
    public static function getBannerById ($id)
    {
        return self::with(['BannerItem','BannerItem.Image'])->find();
    }
}
