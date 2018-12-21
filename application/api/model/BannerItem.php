<?php

namespace app\api\model;

use think\Model;

class BannerItem extends Model
{
    //隐藏字段
    protected $hidden = [
        'id',
        'img_id',
        'delete_time',
        'from',
        'banner_id',
        'update_time'
    ];


    public function Image() {
         return $this->hasOne("Image","id","img_id");
        //相对关联
        /* return $this->BelongsTo("Image","img_id","id"); */
    }
}
