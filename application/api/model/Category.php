<?php


namespace app\api\model;


class Category extends  Base
{

    public $hidden = [
        "delete_time",
        "description",
        "update_time"
    ];


        public function img()
        {
           return $this->belongsTo('Image', 'topic_img_id', 'id');
        }
}