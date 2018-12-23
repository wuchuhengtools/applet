<?php

namespace app\api\validate;

class Count extends BaseValidate
{
    /**
     * @info    验证层规则
     *
     */
    protected $rule = [
        'count'=>'number|between:1,15'
    ];

}

