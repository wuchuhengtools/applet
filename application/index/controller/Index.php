<?php
namespace app\index\controller;
use think\facade\Config;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        return  $this->fetch();
    }

}
