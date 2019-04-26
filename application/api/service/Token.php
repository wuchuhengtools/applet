<?php

namespace app\api\service;

class Token 
{
    /**
     *生成令牌
     *
     *@return   string  token
     */
    public function generateToken()
    {
        $randCharacter = getRandCharater(32);
        $timestamp     = $_SERVER['REQUEST_TIME_FLOAT']; //请求时间
        $salt          = config('token_salt'); 
        return md5($randCharacter.$timestamp.$salt);
    }

}
