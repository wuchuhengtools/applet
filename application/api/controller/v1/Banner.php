<?php
namespace app\api\controller\v1;

use think\Controller;
use app\api\validate\IDMustBePostiveInt; //独立验证器
use app\api\model\Banner as BannerModel;
use app\lib\exception\MissException;
use think\Log;
use Exception;

class Banner extends Controller
{
    /**
     *获取指定id的banner的信息
     *@http GET
     *@id banner的id号
     */
    public function getBanner($id)
    {
        //AOP面向切面编程，统一的检查机制
        (new IDMustBePostiveInt)->goCheck();
        $result = BannerModel::get(1,['BannerItem','BannerItem.Image' ]);

        return json($result);
        $banner = BannerModel::getBannerById($id);
        if(!$result){
            throw new MissException();
        }
        return $result;
        return json($result);
    }


}
