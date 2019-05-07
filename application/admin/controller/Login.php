<?php
/**
 * Created by PhpStorm.
 * User: Xialei
 * Date: 2019/5/1
 * Time: 20:40
 */

namespace app\admin\controller;


use think\Controller;
use think\Request;
use think\db;
class Login extends Controller
{

    /*
     * 登陆页面
     */
    public function index(){
        if (session('login_user')){
            $this->redirect('/admin/index/index');
        }
        return $this->fetch('login');
    }
    /*
     * 登陆验证
     */
    public function check(){
        if (request()->isPost()) {
            $params = input('post.');//接收post的数据
            $username = $params['username'];
            $password = $params['password'];
            //判段用户是否存在
            $user = db('user')->where(['user_name'=>$params['username']])->find();

            if (!$username || !trim($username)){
                $code = code(0,'用户名不能为空!');
            }else if (!$password || !trim($password)){
                $code = code(0,'密码不能为空!');
            }else if (!$user || $user['status'] != 1){
                $code = code(0,'该用户不存在!');
            }else if ($user['password'] != md5($password)){
                $code = code(0,'密码错误');
            }else{
                db('user')->where(['id'=>$user['id']])->update(['last_login_time'=>time(),'last_login_ip'=>request()->ip()]);
                session('login_user',$user);
                $code = code(1,'登陆成功','/admin/index/index');
            }
            return $code;
        }
    }
    /*
     * 管理员退出
     */
    public function loginout(){
        session('login_user',null);//让session的值为空
        $this->redirect('/admin/login');
    }



}