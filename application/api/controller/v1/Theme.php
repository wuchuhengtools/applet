<?php
namespace app\api\controller\v1;

use app\api\validate\IDMustBePostiveInt;
use app\api\validate\IDConnection;
use think\Controller;
use app\api\model\Theme as ThemeModel;
use app\lib\exception\ThemeException;

class Theme extends Controller
{
    /**
     * @info    获取主题信息
     * @url     /theme?ids=id1,id2,id3,...
     * @return  json    主题信息
     */
    public function getSimpleList($ids='')
    {
        (new IDConnection)->goCheck(); //参数验证线
        $result  = ThemeModel::getThemeByIds(input('ids/s'));
        if($result->isEmpty())throw new ThemeException();
        return $result;
    }


    /**
     * @info    单个专题专栏产品数据列表
     * @url    /api/:vesion/theme/:id
     * @param   numeral     $id     主题id
     * @return  json                产品数据
     *
     */
     public function getComplexOne($id)
     {
         (new IDMustBePostiveInt)->goCheck();
         $result = ThemeModel::getThemeWithProducts($id);
         return $result;
         /* if(!$result) throw */
     }

}
