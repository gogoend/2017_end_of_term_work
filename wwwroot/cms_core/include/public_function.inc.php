<?php
/**
*本文件用于存放常用的函数
*@date:2017年12月9日 下午4:33:26
*@author:JackieHan<gogoend@qq.com>
*/

function get_random_char($length){
    $char=str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890-=_+~@#&<>');//把字符串打乱
    $rand_char='';
    for($i=1;$i<=$length;$i++){
        $rand_char.=substr($char, rand(0,strlen($char)-1),1);//从已经打乱的字符串中抽取一个字符，重复$length次
    }
    return $rand_char;
}

date_default_timezone_set('PRC');

function now(){
    return date('Y-m-d H:i:s');
}
function db_connect(){
    require dirname(__FILE__).'/../config/mydb.config.php';
    $pdo=new PDO($dsn,$mysql_username,$mysql_password);
    return $pdo;
}
function db_disconnect(){
    $pdo=null;
}
