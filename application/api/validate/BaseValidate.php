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
                'code' => 400,
                'msg'  => $this->error,
                'errorCodce' => 10000
            ]);
            throw $e;
        }else{
            return true;
        }
    }


    /**
     *整正数验证
     *@value 传入的被验证的数字
     *
     */
    protected function isPositiveInteger($value,$rule = '',$data = '',$field = '')
    {
        if(is_numeric($value) && is_int($value + 0) && ($value + 0)>0){
            return true;
        }else{
            return false;
        }
    }


    /**
     * 参数不为空
     *
     * @return boolean
     */
    protected function isNotEmpty($value, $rule='', $data='', $field='')
    {
        if (empty($value))
            return false;
        else
            return true;
    }

}
