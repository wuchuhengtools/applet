<?php
namespace app\api\service;

use app\lib\exception\WechatException;
use app\api\model\User as UserModel;
use app\lib\exception\TokenException;

class UserToken extends Token
{

    protected $code;
    protected $wxAppID;
    protected $wxAppScret;
    protected $wxLoginUrl;

    public function __construct($code)
    {
        $this->code       = $code;
        $this->wxAppID    = config('app_id');
        $this->wxAppScret = config('app_scret');
        $this->wxLoginUrl = sprintf(
            config('login_url'),
            $this->wxAppID,
            $this->wxAppScret,
            $this->code 
        );
    }


    /**
    * 获取令牌
    *
    * @return   token 
    */
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
               $token = $this->grandToken($wxResult);
               return $token;
           }
        }
    }

    
    /**
     *令牌验证
     *
     * @wxResult    微信openid&&session_key
     * @return      token
     */
    private function grandToken($wxResult)
    {
        //拿到openid->查看数据库有没有->如果没有就新增
        //生成令牌写入缓存->存到数据库->返回客户端
        $openID     = $wxResult['openid'];
        $sessionKey = $wxResult['session_key'];
        $hasUser    = (new UserModel())->getByOpenID($openID);
        if ($hasUser) {
            $uid = $hasUser->id;
        } else {
            $uid = $this->newUser($openID); 
        }
        $cacheValue = $this->prepareCacheValue($wxResult, $uid);
        $token = $this->saveCache($cacheValue);
        return $token;
    }
    

    /**
     *保存缓存
     *
     * @cacheValue  array   要缓存的数据
     *
     */
    protected function saveCache($cacheValue)
    {
        $key       = $this->generateToken();
        $value     = json_encode($cacheValue);
        $expire_in = config('token_expire_in');
        $result    = cache($key, $value, $expire_in);
        if (!$result) {
            throw new TokenException([
                'errorCode' => 10005,
                'msg'       => '服务器缓存错误'
            ]); 
        }
        return  $key;
    }

        

    /**
     *要缓存的用户数据 
     *
     * @wxResult     array  微信openid&&session_key
     * @uid          int    用户id
     * @return array    用户数据
     */
    protected function prepareCacheValue(array $wxResult, int $uid)
    {
        $cacheValue = $wxResult += ['uid'=>$uid,'scope'=>16];
        return $cacheValue;
    }    


    /**
     *新增加用户
     *
     * @return  id  新用户id
     */
    protected function newUser($openid)
    {
        $user = UserModel::create([
            'openid' => $openid
        ]);
        return $user->id;
    }


    /**
     * 微信用户code码验证失败抛出异常
     *
     */
    private function processLoginError($wxResult)
    {
       throw new WechatException([
           'msg' => $wxResult['errmsg'],
           'errorcode' => $wxResult['errcode']
       ]);
    }

}
