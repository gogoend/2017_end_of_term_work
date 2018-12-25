<?php
/**
*本文件用于定义管理员注册类
*@date:2017年12月5日 上午9:15:10
*@author:JackieHan<gogoend@qq.com>
*/

require 'public_function.inc.php';

class admin_reg{
    public $admin_id;
    public $admin_group;
    public $admin_status;
    public $admin_key;
    public $user_id;
    public $user_name;
    public $user_password;
    public $user_salt;
    public $user_group;
    public $user_email;
    public $user_status;
    public $user_sign_up_time;
    public $captcha;
    
    public function check_captcha(){
        if(isset($_REQUEST['captcha'])&&!empty($_REQUEST['captcha'])){
            session_start();
            if(!isset($_SESSION['captcha'])){
                echo '非法访问';
                return false;
            }else{
                if(strtolower($_REQUEST['captcha'])==strtolower($_SESSION['captcha'])){
                    return true;
                }else{
                    echo '验证码不正确';
                    return false;
                }
            }
        }else{
            echo '请输入验证码';
            return false;
        }
    }
    
    //验证管理员信息
    public function admin_check($para){
        require dirname(__FILE__).'/../config/mydb.config.php';
        //前端传来的id和key已经设置并且不是空的
        if(isset($_POST['sign_up_id'])&&
            !empty($_POST['sign_up_id'])&&
            isset($_POST['sign_up_key'])&&
            !empty($_POST['sign_up_key'])
            ){
        $pdo=new PDO($dsn,$mysql_username,$mysql_password);
        $sql='SELECT * from h_cube_admin_list WHERE admin_id=:admin_id';
        $stmt=$pdo->prepare($sql);
        $data_array=array(":admin_id"=>$_POST['sign_up_id']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $stmt->execute($data_array);
            while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
                $this->admin_id=$result['admin_id'];
                $this->admin_key=$result['admin_key'];
                $this->admin_status=$result['admin_status'];
            }
            $pdo=null;
            if($this->admin_id==''||
                $this->admin_id==null||
                empty($this->admin_id)||
                $this->admin_key==''||
                $this->admin_key==null||
                empty($this->admin_key)||
                $this->admin_id!=$_POST['sign_up_id']||
                $this->admin_key!=$_POST['sign_up_key']
                ){
                if($para=='ajax'){echo "您输入的工号或密码有误";}
                return false;
            }else {
                if($this->admin_status!='false'){
                    if($para=='ajax'){echo "您的账户已被激活，请直接登录";}
                    return false;
                }else{
                    if($para=='ajax'){echo "true";}
                return true;}
            }
        }catch(Exception $e){
            die($e->getMessage());
        }
        }else{
            if($para=='ajax'){echo "请填写工号和管理员给您提供的密钥";}
            return false;
        }
    }
    
    public function sign_up_check(){
        $name=$_POST['sign_up_name'];
        $email=$_POST['sign_up_email'];
        $pwd=$_POST['sign_up_password'];
        $confirm_pwd=$_POST['sign_up_confirm_password'];
        $captcha=$_POST['sign_up_captcha'];
        if(strlen($name)>16||strlen($name)<4)
        {echo '用户名长度为4-16个字符';}
    }
    
    //把管理员信息插入到数据库中
    public function admin_ok(){
        require dirname(__FILE__).'/../config/mydb.config.php';
        if($this->admin_check(null)){
         $this->admin_id;   
         $this->admin_status='activated';
         $this->user_name=$_POST['sign_up_name'];
	 $this->user_salt=get_random_char(8);
         $this->user_password=md5(sha1($_POST['sign_up_password'].base64_encode($this->user_salt)));
         $this->user_group=1;
         $this->user_email=$_POST['sign_up_email'];
		 $this->user_status='normal';
         $this->user_sign_up_time=now();
       }
        $pdo=new PDO($dsn,$mysql_username,$mysql_password);
        //把管理员的注册信息插入到用户中心表中
        $sql_user_sign_up='INSERT INTO h_cube_passport_center
            (user_name,
            user_password,
            user_salt,
            user_group,
            user_email,
            user_status,
            user_sign_up_time)
            VALUES
            (:user_name,
            :user_password,
            :user_salt,
            :user_group,
            :user_email,
            :user_status,
            :user_sign_up_time)';
        $stmt_user_sign_up=$pdo->prepare($sql_user_sign_up);
        $data_array_user_sign_up=array(
            ":user_name"=>$this->user_name,
            ":user_password"=>$this->user_password,
            ":user_salt"=>$this->user_salt,
            ":user_group"=>$this->user_group,
            ":user_email"=>$this->user_email,
            ":user_status"=>$this->user_status,
            ":user_sign_up_time"=>$this->user_sign_up_time,
        );
        //设置管理员账号为激活状态
        $sql_admin_sign_up='
            UPDATE h_cube_admin_list 
            SET 
            admin_status=:admin_status,
            admin_passport_name=:admin_passport_name
            WHERE admin_id=:admin_id'; 
        $stmt_admin_sign_up=$pdo->prepare($sql_admin_sign_up);
        $data_array_admin_sign_up=array(
            ":admin_status"=>$this->admin_status,
            ":admin_passport_name"=>$this->user_name,
            ":admin_id"=>$this->admin_id,
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $stmt_user_sign_up->execute($data_array_user_sign_up);
            $stmt_admin_sign_up->execute($data_array_admin_sign_up);
            return true;
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    }
    
}
class admin_sign_in{
    public $input_username;
    public $input_password;
    public $result_admin_id;
    public $result_username;
    public $result_password;
    public $result_salt;
    public $result_admin_status;
    public $result_user_group;
    var $check_password;
    public function sign_out(){
        session_start();
        session_destroy();
    }
    public function check_input(){
        require dirname(__FILE__).'/../config/mydb.config.php';
        $this->input_username=$_POST['name'];
        $this->input_password=$_POST['password'];
        $pdo=new PDO($dsn,$mysql_username,$mysql_password);
        $sql='SELECT
                  `h_cube_admin_list`.`admin_id`,
                  `h_cube_passport_center`.`user_name`,
                  `h_cube_passport_center`.`user_password`,
                  `h_cube_passport_center`.`user_salt`,
                  `h_cube_admin_list`.`admin_status`,
                  `h_cube_passport_center`.`user_group`
                  FROM
                  `h_cube_admin_list`
                  INNER JOIN `h_cube_passport_center`
                  ON `h_cube_admin_list`.`admin_passport_name` =
                  `h_cube_passport_center`.`user_name`
                  WHERE `h_cube_passport_center`.`user_name`=:input_username';
        $stmt=$pdo->prepare($sql);
        $data_array=array(":input_username"=>$this->input_username);
        try{
            $stmt->execute($data_array);
            while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
              $this->result_admin_id=$result['admin_id'];
              $this->result_username=$result['user_name'];
              $this->result_password=$result['user_password'];
              $this->result_salt=$result['user_salt'];
              $this->result_admin_status=$result['admin_status'];
              $this->result_user_group=$result['user_group'];
            }
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
        $check_password=md5(sha1($this->input_password.base64_encode($this->result_salt)));
        if($check_password==$this->result_password){
            //echo '密码正确';
            return true;
        }else{
            echo '密码错误';
            return false;
        }
    }
}