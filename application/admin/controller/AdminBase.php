<?php
/**
 * Created by PhpStorm.
 * user: Xialei
 * Date: 2018/12/7
 * Time: 8:46
 */

namespace app\admin\controller;


use think\Controller;

class AdminBase extends Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->init();
    }
    //初始化方法
    public function init(){
        //检查登陆
        if (!$this->isLogin()){//调用下面的获取用户session方法session为空就直接跳转到登陆页面
            $this->redirect('/admin/login');
        }
    }


    //判断有没有用户登陆
    public function isLogin(){
        $user = session('login_user');//获取session里的用户数据
        if ($user && is_array($user)){
            return true;
        }
        return false;
    }





}