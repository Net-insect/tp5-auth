<?php
namespace app\index\controller;

use think\Controller;
use think\Loader;

class Index extends Controller
{
    public function index()//当前方法未添加到权限表也未分发权限所以权限验证类默认它为没有权限
    {
        return '这是一个用tp5框架写的auth权限功能模块的demo 可以给一些基础小白借鉴';
    }

    protected $current_action;//用来保存当前的操作url
    public function _initialize(){
        Loader::import("org/Auth", EXTEND_PATH);
        $auth = new \Auth();
        $this->current_action = request()->module().'/'.request()->controller().'/'.lcfirst(request()->action());//得到当前的操作路径
        $result = $auth->check($this->current_action, 4);//假设登陆用户的id为4 要验证的操作为当前点击的操作
        if($result){
             echo "权限验证成功<br/>";
        }else{
            echo "权限验证失败,你没有此权限<br/>";
        }

    }

    public function add1(){
        echo "这是add1方法的操作";
    }

    public function add2(){
        echo "这是add2方法的操作";
    }

    public function add3(){
        echo "这是add3方法的操作";
    }

    public function add4(){
        echo "这是add4方法的操作";
    }

    public function add5(){
        echo "这是add5方法的操作";
    }

    public function add6(){
        echo "这是add6方法的操作，这个操作方法的数据没有在权限表哦，所以不管是谁都会报没有权限";
    }

}
