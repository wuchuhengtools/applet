<?php
namespace app\index\controller;
use think\facade\Config;
class Index
{
    public function index()
    {
        dump(controller_url('hasHost'));
        dump(function_url('hasHost'));
    }

}
