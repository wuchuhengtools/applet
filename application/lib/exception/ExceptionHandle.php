<?php
namespace app\lib\exception;
use think\exception\Handle;
use Exception;
use think\Request;
use think\Log;
use think\Config;
use app\lib\exception\BaseExeption;
class ExceptionHandle extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    private $url;
    public function render(\Exception $e)
    {
        if($e instanceof BaseException){
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errrorCode = $e->errorCode;
        }else{
            if(Config::get("app_debug")){
                return parent::render($e); //返回tp5内置异常,用于服务器调试用。
            }else{
                $this->code = 500;
                $this->msg  = "服务器内部错误，不能告诉你";
                $this->errorCode = 999;
                $this->recordErrorLog($e);
            }
        }
        $url = (Request::instance())->url();
        $result =  [
            "msg" => $this->msg,
            "code" => $this->code,
            "requestURL" => $url
        ];
       return json($result,$this->code);
    }
    /*
     *将异常写入日志
     *
     */
    private function recordErrorLog(\Exception $e)
    {
        Log::init([
            "type" => "File",
            "path" => LOG_PATH,
            "level"     => ["error"]
         ]);
       Log::record($e->getMessage(), "error");
    }

}



