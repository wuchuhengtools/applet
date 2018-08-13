<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 *返回当前控制器路径
 *@isAddHost string  "hasHost" 返回带有域名路径,空则不带
 *@return string
 */
function controller_url($isAddHost = '')
{
    $url_prefix = strtolower($isAddHost) === 'hashost'? request()->root(true): '';
    return "{$url_prefix}/".request()->module()."/".request()->controller();
}

/**
 *返回当前控制器方法路径
 *@isAddHost string  "hasHost" 返回带有域名路径,空则不带
 *@return string
 */
function function_url($isAddHost = '')
{
    $url_prefix = strtolower($isAddHost) === 'hashost'? request()->root(true): '';
    return "{$url_prefix}/".request()->module()."/".request()->controller().'/'.request()->action();
}
