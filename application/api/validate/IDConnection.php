<?php
namespace app\api\validate;

class IDConnection extends BaseValidate
{
    /**
     * @info    验证层规则
     *
     */
    protected $rule = [
        'ids'=>'require|checkID'
    ];


    /**
     * @info    自定义错误信息
     *
     */
    protected $message = [
        'ids' => 'ids 必须为是以逗号分隔的整数'
    ];



    /**
     * @info        验证传入的ids字符串
     * @param       string              $ids
     *
     */
    protected function checkID($ids)
    {
        $isArray = explode(',',$ids);
        if(empty($isArray)) return false;
        //是否都是int型
        foreach($isArray as $v){
            //整形验证
            if(!$this->isPositiveInteger($v)) return false;
        }
        return true;
    }
}
