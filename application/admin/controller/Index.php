<?php
namespace app\admin\controller;



class Index extends AdminBase
{
    //显示主体框架
    public function index(){
       return $this->fetch('index');
    }
    //真正的首页
    public function welcome(){
        return $this->fetch('welcome');
    }



}