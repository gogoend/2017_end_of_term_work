<?php 
/**
*本文件用于将前端提交的配置文件信息下载到用户的计算机上
*@date:2018年1月5日 下午12:23:12
*@author:JackieHan<gogoend@qq.com>
*/

$host=$_POST['db_host'];
$username=$_POST['db_username'];
$password=$_POST['db_password'];
$name=$_POST['db_name'];
echo $file_str="
    <?php
\$mysql_server_name=\"$host\";
\$mysql_username=\"$username\";
\$mysql_password=\"$password\";
\$mysql_database=\"$name\";
\$dsn=\"mysql:host=\$mysql_server_name;dbname=\$mysql_database\";
";
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.'mydb.config.php');//获取带有文件扩展名的文件名
exit();