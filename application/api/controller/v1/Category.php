<?php


namespace app\api\controller\v1;

use think\Controller;
use app\api\model\Category as categoryModel;
use app\lib\exception\CategoryException;
use think\response\Json;

class Category extends controller
{

    /**
     *获取分类列表
     *
     * @http      GET
     * @requestURL   /api/v1/category/all
     * @return categoryModel[]|false
     */
    public function  getAllCategories()
    {
        $isCategorise = CategoryModel::all([], "img");
        if( $isCategorise->isEmpty() )
            throw new CategoryException();
        else
            return $isCategorise;
    }




}
