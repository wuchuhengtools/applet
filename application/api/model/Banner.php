<?php

namespace app\api\model;

use think\Model;
use think\Db;

class Banner extends Model
{
    public function BannerItem()
    {
        return $this->hasMany("BannerItem","banner_id","id");
    }
    /**
     *获取banner的信息
     *@id   传来的id号
     */
    public static function getBannerById($id)
    {
        $result = Db::query( 'select * from banner where id = ?',[$id]);
        return $result;
    }
}
