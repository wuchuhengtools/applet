<?php
namespace app\api\model;

class Category extends Base
{
   /**
    * @info  关联img
    *
    */ 
    public function image()
    {
        return $this->belongsTo('image', 'topic_img_id', 'id');
    }
}
