<?php

namespace app\api\model;

class ProductImage extends Base
{

    /**
    * 关联商品详情图片
    *
    */
    public function imgUrl ()
    {
        return  $this->hasOne('Image', 'id', 'img_id');

    }
    
}
