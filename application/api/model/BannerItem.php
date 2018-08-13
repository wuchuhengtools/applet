<?php

namespace app\api\model;

use think\Model;

class BannerItem extends Model
{
    public function Image() {
        //相对关联
        return $this->BelongsTo("Image","img_id","id");
    }
}
