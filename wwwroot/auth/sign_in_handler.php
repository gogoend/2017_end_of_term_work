<?php
/**
*本文件用于处理用户的登录请求
*@date:2017年12月9日 下午4:32:25
*@author:JackieHan<gogoend@qq.com>
*/
require dirname(__FILE__).'/../cms_core/include/sign_up.class.php';
header("Content-type:text/html;charset=utf-8");
$sign_in=new admin_sign_in();
//$sign_in->check_input();
if($sign_in->check_input()==true){
    session_start();
    $_SESSION['current_user']=$sign_in->input_username;
    header('Location:/admin/admin_panel.php');
}