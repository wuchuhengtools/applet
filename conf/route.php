<?php

use \think\Route;
/**
 * @info api路由配置
 * @description     接口遵从reset原则
 * @learner         小孩别跑
 * @email           wuchuheng@163.com
 * @github          https://github.com/wuchuheng
 */


//查询
//  /api/v[0-9]/banner/[0-9]+              banner图
Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');
//  /api/v[0-9]/theme?ids=[0-9](,[0-9])*       主题列表
Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
//  /api/v[0-9]/theme/[0-9]                 专题产品列表
Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');
// /api/v[0-9]/product/recent
Route::get('api/:version/product/recent','api/:version.Product/getRecent');

