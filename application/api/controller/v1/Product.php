<?php

namespace app\api\controller\v1;

use think\Controller;
use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\lib\exception\ProductException;
use app\api\validate\IDMustBePostiveInt;

class Product extends Controller
{
    /**
     *获取最新的商品
     *
     * @conu    int      商品数量
     */
    public function getRecent($count = 15)
    {
        (new Count())->gocheck();
        $isProduct = ProductModel::getMostRecentProduct($count);
        if (!$isProduct) {
            throw new ProductException();
        }
        else
        {
            $products = (new ProductModel())->getMostRecentProduct($count);
            return $products;
        }

    }



    /**
     *获取分类商品
     *
     * @categoryID  int     商品分类id
     */
    public function getAllInCategory($id)
    {
        (new IDMustBePostiveInt() )->goCheck();
        $isProducts = ProductModel::getProductByCategoryID($id);
        if ($isProducts->isEmpty())
            throw new ProductException();
        else
            return $isProducts;
    }

}