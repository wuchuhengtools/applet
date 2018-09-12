<?php
namespace app\api\model;

class Image extends Base
{
    protected $hidden = ['id','from','update_time','delete_time'];//隐藏字段

    /**
     * @info    url字段获取器 当前模型自动调用这个方法
     * @param   string       $value     当前url字段的值
     * @param   array        $data      当前这条数据的所有字段
     * @retrun  string                  处理后url的字段值
     */
    public function getUrlAttr($value,$data)
    {
        return $this->prefixImgUrl($value,$data);
    }

}
