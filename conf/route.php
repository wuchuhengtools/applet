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
//  /api/v[0-9]/theme?ids=[0-9](,[0-9])*       主题列表
Route::get('api/:version/theme','api/:version.theme/getSimpleList');
//  /api/v[0-9]/theme/[0-9]                 专题产品列表
Route::get('api/:version/theme/:id','api/:version.theme/getComplexOne');

//商品页
//  /api/v[0-9]/theme/product?count=[1-9]{1,}    the best  products
Route::get('api/:version/product', 'api/:version.product/getRecent');
Route::get('api/:version/product/by_category', 'api/:version.product/getAllInCategory');
//  /api/v[0-9]/category/all     get all categories
Route::get('api/:version/category/all', 'api/:version.category/getAllCategories');

//用户接口
Route::post('api/:version/token/user', 'api/:version.token/getToken');
