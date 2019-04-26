<?php


namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;
use think\Controller;

class Token extends Controller
{
    /**
     *获取token
     *
     * @http    post
     * @url     /api/v1/token/user
     * @code    int     微信code
     * @return  string  token
     */
    public function getToken($code='')
    {
        (new TokenGet())->goCheck();
        $token = (new UserToken($code))->get();
        return [
            'token'  => $token
        ];
    }

}
