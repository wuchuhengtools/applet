<?php

/**
*
* @author    wuchuheng
* @email    root@wuchuheng.com
*
**/

namespace app\api\controller\v1;

use app\api\validate\Count;

class Product extends Base
{
   /**
    * @info     返回最近新品
    * @http     get     /api/v1/recent
    * @return   json    最近新品数据
    *
    */
    public function getRecent($count = 15)
    {
        (new Count())->goCheck();
        return  'success';
    }


}
