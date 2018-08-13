<?php

use \think\Route;
/**
 *api路由配置
 *@http GET
 */
Route::get('api/v1/banner/:id','api/v1.Banner/getBanner'); // 定义GET请求路由规则

