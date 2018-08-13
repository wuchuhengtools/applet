<?php
namespace app\api\validate;
use think\Validate;
use think\Request;
use app\lib\exception\ParametException;
class BaseValidate extends Validate
{
    /**
     *获取http传入的参数
     *@http GET
     */

    public function goCheck()
    {
        $request = Request::instance();
        $params  = $request->param();
        $result  = $this->batch()->check($params);
        if(!$result){
            $e = new ParametException([
                'code' => 4000,
                'msg'  => $this->error,
                'errorCodce' => 10000
            ]);
            throw $e;
        }else{
            return true;
        }
    }
}
