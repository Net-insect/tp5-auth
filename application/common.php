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
use think\Loader;
use think\Controller;

// 公共的权限验证封装
function auth($current_action,$uid){
    Loader::import("org/Auth", EXTEND_PATH);
    $auth = new \Auth();
    return $result = $auth->check($current_action, $uid);//假设登陆用户的id为4 要验证的操作为当前点击的操作
}