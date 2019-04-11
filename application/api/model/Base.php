<?php

namespace app\api\model;

use think\Model;

class base extends Model
{

    /**
     * @info    url字段获取器
     * @param   string       $value     当前url字段的值
     * @param   array        $data      当前这条数据的所有字段
     * @retrun  string                  处理后url的字段值
     */
    protected function prefixImgUrl($value,$data)
    {
        if($data['from'] === 2) //网络图片，这是绝对路径，不需要修改
            return $value;
        else
            return config("img_prefix").$value;

    }

}
