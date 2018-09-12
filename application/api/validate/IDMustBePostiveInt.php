<?php
namespace app\api\validate;

use app\api\validate\BaseValidate;

class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger',
        /* 'num' => 'in:1,2,3' */
    ];

    protected $message = [
        'id'    => 'id参数必须以正整型'
    ];
}
