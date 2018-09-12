<?php

namespace app\api\model;

use think\Model;

class BannerItem extends Model
{
    protected $hidden = ['id','delete_time','update_time'];
    public function Image() {
         return $this->hasOne("Image","id","img_id");
        //相对关联
        /* return $this->BelongsTo("Image","img_id","id"); */
    }
}
