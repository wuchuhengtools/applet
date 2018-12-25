<?php

/**
*
* @author    wuchuheng
* @email    root@wuchuheng.com
*
**/

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;

class Category extends Base
{
    protected $hidden = ['update_time', 'delete_time', 'delete_time'];

   /**
    * @info     返回所有分类 
    * @http     get     /api/v1/Category/all
    * @return   json    分类数据  
    *
    */
    public function getAllCategory()
    {
        $category = CategoryModel::with('image')->select();
        return $category;
    }


}
