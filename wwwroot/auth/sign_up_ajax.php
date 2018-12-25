<?php
/**
*本文件用于提前验证管理员注册的相关信息
*@date:2017年12月8日 上午10:42:03
*@author:JackieHan<gogoend@qq.com>
*/
require dirname(__FILE__).'/../cms_core/include/sign_up.class.php';
header("Content-type:text/plain;charset=utf-8");
$if_admin=new admin_reg();
$if_admin->admin_check('ajax');