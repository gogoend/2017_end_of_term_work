<?php
/**
*本文件用于将用户提交的数据插入数据库
*@date:2017年12月8日 上午10:49:48
*@author:JackieHan<gogoend@qq.com>
*/
require dirname(__FILE__).'/../cms_core/include/sign_up.class.php';
header("Content-type:text/html;charset=utf-8");
$test=new admin_reg();
if($test->admin_ok()){
    header('Location:/admin/sign_in.html');
}else{
    echo '数据库故障，请联系管理员';
}