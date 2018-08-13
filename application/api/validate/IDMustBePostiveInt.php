<?php
namespace app\api\validate;

use app\api\validate\BaseValidate;

class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger',
    ];

    /**
     *整正数验证
     *@value 传入的被验证的数字
     *
     */
    protected function isPositiveInteger($value,$rule = '',$data = '',$field = '')
    {
        if(is_numeric($value) && is_int($value + 0) && ($value + 0)>0){
            return true;
        }else{
            return $field." mest be int";
        }
    }
}
