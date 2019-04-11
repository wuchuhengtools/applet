<?php


namespace app\api\validate;


class TokenGet extends BaseValidate
{

    protected $rule = [
        'code' => 'require|isNotEmpty'
    ];

    protected $message = [
        'code' => 'code必须有，且不为空'
    ];
}