<?php


namespace app\api\model;


class User extends Base
{
    /**
     *
     *
     */
    public function getByOpenID($openid)
    {
        $hasUser = self::where('openid', '=', $openid)->find();
        return $hasUser; 
    }
    
}
