<?php

use \think\Route;
/**
 * @info api路由配置
 * @description     接口遵从reset原则
 * @learner         小孩别跑
 * @email           wuchuheng@163.com
 * @github          https://github.com/wuchuheng
 */


//首页
//  /api/v[0-9]/banner/[0-9]+              banner图
Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');

Route::group('api/:version', function(){
    //  /api/v[0-9]/theme?ids=[0-9](,[0-9])*       主题列表
    Route::get('/','api/:version.theme/getSimpleList');
    //  /api/v[0-9]/theme/[0-9]                 专题产品列表
    Route::get('/:id','api/:version.theme/getComplexOne');
});

//商品页
Route::group('api/:version/product', function(){
    //  /api/v[0-9]/theme/product?count=[1-9]{1,}    the best  products
    Route::get('/',             'api/:version.product/getRecent');
    Route::get('/by_category', 'api/:version.product/getAllInCategory');
    //单个商品
    Route::get('/:id',         'api/:version.product/getOne');
});

//  /api/v[0-9]/category/all     get all categories
Route::get('api/:version/category/all', 'api/:version.category/getAllCategories');

//用户接口
Route::post('api/:version/token/user', 'api/:version.token/getToken');
