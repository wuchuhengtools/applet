<?php

/**
*
* @author    wuchuheng
* @email    root@wuchuheng.com
*
**/

namespace app\api\controller\v1;

use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\lib\exception\ProductException;


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
        $isProduct = ProductModel::getMostRecent($count);
        if ($isProduct->isEmpty())
            throw new ProductException();
        else
            return  $isProduct;
    }


}
