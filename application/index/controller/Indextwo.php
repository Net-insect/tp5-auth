<?php
namespace app\index\controller;

use think\Controller;
use think\Loader;

class Indextwo extends Controller
{
    public function index()//当前方法未添加到权限表也未分发权限所以权限验证类默认它为没有权限
    {
        return '这是auth的多种调用的使用用法，请自行挨个访问当前模块的方法演示';
    }





    /*
                验证单个条件
                验证 假设登陆用户的id为4 的是否有 参数1操作的权限

                check方法中的参数解释：
                    参数1：index/index/Add1 假设我现在请求 Admin模块下Article控制器的Add方法
                    参数2： 4 假设登陆用户的id为4
     */
    public function add(){
        Loader::import("org/Auth", EXTEND_PATH);
        $auth = new \Auth();

        $result = $auth->check( 'index/index/Add1', 4);//假设登陆用户的id为4 要验证的操作为当前点击的操作

        if($result){
            echo "权限验证成功<br/>";
        }else{
            echo "权限验证失败,你没有此权限<br/>";
        }
    }





    /*
          同时验证多个条件
            验证 假设登陆用户的id为4 的是否有 参数1 里面 包括一个不存在权限表里的操作

            参数解释：
                参数1：多条操作的同时验证 ， 验证是否拥有多个方法url的权限
                参数2：4 假设登陆用户的id为4

            ps ：index/index/Add6是一个不存在权限表里的规则为什么会返回真呢？ 因为check方法 第5个参数默认为 or 也就是说 多个规则中只要满足一个条件即为真
    */
    public function add1(){
        Loader::import("org/Auth", EXTEND_PATH);
        $auth = new \Auth();

        $result = $auth->check( 'index/index/Add1,index/index/Add2,index/index/Add6', 4);//假设登陆用户的id为4 要验证的操作为当前点击的操作

        if($result){
            echo "权限验证成功<br/>";
        }else{
            echo "权限验证失败,你没有此权限<br/>";
        }
    }



    /*
           同时验证多个条件 并且 都为真
           验证 假设登陆用户的id为4 的是否有 参数1 里面 包括一个不存在权限表里的操作

           参数解释
               参数1：多条规则同时验证 ，验证是否拥有 参数1 里面 包括一个不存在权限表里的操作的权限
               参数2：4 假设登陆用户的id为4
               参数3：是否用正则验证condition中的内容 1为是
               参数4：
               参数5：必须满足全部规则才通过
       */
    public function add2(){
        Loader::import("org/Auth", EXTEND_PATH);
        $auth = new \Auth();

        $result = $auth->check( 'index/index/Add1,index/index/Add3,index/index/Add6', 4, 1, '', 'and');//假设登陆用户的id为4 要验证的操作为当前点击的操作

        if($result){
            echo "权限验证成功<br/>";
        }else{
            echo "权限验证失败,你没有此权限<br/>";
        }
    }







}
