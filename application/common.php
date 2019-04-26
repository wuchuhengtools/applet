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


/**
 *http请求
 *
 *@url  url    targetUrl
 *@httpCode     init    status  code
 *
 */
function curl_get($url, &$httpCoide = 0)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    $file_contents = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $file_contents;
}



/**
 *获取随机字符
 *
 *
 *
 */
function getRandCharater(int $length)
{
   $str     = '';
   $strpols = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklnmopqrwtuvwxyz1234567890";
   $max     = strlen($strpols) - 1;
    for ($i=0; $i<$length; $i++) {
        $str .= $strpols[rand(0, $max)];
    } 
    return $str; 
}

