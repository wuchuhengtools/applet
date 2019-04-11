<?php


namespace app\api\service;


use app\lib\exception\WechatException;

class UserToken
{

    protected $code;
    protected $wxAppID;
    protected $wxAppScret;
    protected $wxLoginUrl;

    public function __construct($code)
    {
        $this->code       = $code;
        $this->wxAppID    = config('wx.app_id');
        $this->wxAppScret = config('wx.app_scret');
        $this->wxLoginUrl = sprintf(
            config('wx.login_url'),
            $this->wxAppID,
            $this->wxAppScret
        );

    }


    public function get()
    {
        $result = curl_get($this->wxLoginUrl);
        $wxResult = json_decode($result, true);
        if (empty($wxResult)){
            throw new Exception('获取session_key及open_ID时异常，微信内部错误');
        }else{
           $loginFail = array_key_exists('errcode', $wxResult);
           if($loginFail){
                $this->processLoginError($wxResult);
           }else{
               $this->grandToken();
           }
        }
    }


    private function grandToken($wxResult)
    {
        //拿到openid->查看数据库有没有->如果没有就新增
        //生成令牌写入缓存->存到数据库->返回客户端
        $openID = $wxResult['openid'];

    }


    private function processLoginError($wxResult)
    {
       throw new WechatException([
           'msg' => $wxResult['errormsg'],
           'errorcode' => $wxResult['errorcode']
       ]);
    }

}