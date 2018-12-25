//访问网页标签
//UI控制
//全页面遮罩
function whole_page_mask_switch(operation) {
	if (operation == 'on') {
		document.getElementById("whole_page_mask").style.visibility = "visible";
		document.getElementById("whole_page_mask").style.background = "rgba(0,0,0,0.8)";
		document.getElementById("container").style.WebkitFilter = "blur(3px)";
		console.log("显示遮罩");
	}
	if (operation == 'off') {
		document.getElementById("sign_in_box").style.visibility = "hidden";
		document.getElementById("sign_up_box").style.visibility = "hidden";
		document.getElementById("whole_page_mask").style.visibility = "hidden";
		document.getElementById("whole_page_mask").style.background = "rgba(0,0,0,0)";
		document.getElementById("container").style.WebkitFilter = "blur(0px)";
		console.log("隐藏遮罩");
	}

}
//登录框注册框控制
function sign_in_box_switch(operation) {
	if (operation == 'on') {
		document.getElementById("sign_in_box").style.top = "50%";
		console.log("登录框下降");
		document.getElementById("sign_in_box").style.opacity = "1";
		console.log("设置登录框不透明");
		document.getElementById("sign_in_box").style.visibility = "visible";
		console.log("显示登录框");
	}
	if (operation == 'off') {
		document.getElementById("sign_in_box").style.top = "-50%";
		console.log("登录框上升");
		document.getElementById("sign_in_box").style.opacity = "0";
		console.log("设置登录框透明");
		document.getElementById("sign_in_box").style.visibility = "hidden";
		console.log("隐藏登录框");

	}

}

function sign_up_box_switch(operation) {
	if (operation == 'on') {
		document.getElementById("sign_up_box").style.top = "50%";
		console.log("注册框下降");
		document.getElementById("sign_up_box").style.opacity = "1";
		console.log("设置注册框不透明");
		document.getElementById("sign_up_box").style.visibility = "visible";
		console.log("显示注册框");
	}
	if (operation == 'off') {
		document.getElementById("sign_up_box").style.top = "-50%";
		console.log("注册框上升");
		document.getElementById("sign_up_box").style.opacity = "0";
		console.log("设置注册框透明");
		document.getElementById("sign_up_box").style.visibility = "hidden";
		console.log("隐藏注册框");
	}
}

function sign_in_ui_on() {
	sign_up_box_switch('off');
	whole_page_mask_switch('on');
	sign_in_box_switch('on');
}

function sign_in_ui_off() {
	whole_page_mask_switch('off');
	sign_in_box_switch('off');
}

function sign_up_ui_on() {
	sign_in_box_switch('off');
	whole_page_mask_switch('on');
	sign_up_box_switch('on');
}

function sign_up_ui_off() {
	whole_page_mask_switch('off');
	sign_up_box_switch('off');
}
//关闭所有浮动UI
function close_all_float_ui() {
	whole_page_mask_switch('off');
	sign_up_box_switch('off');
	sign_in_box_switch('off');
}

//登录表单检查	
function sign_in_check_name() {
	var input_name = document.getElementById("name").value;
	if (input_name == "" || input_name == null) {
		document.getElementById("name").style.borderColor = "#FFA300";
		document.getElementById("sign_in_fail_msg").style.display = "block";
		//document.getElementById("sign_in_fail_msg").innerHTML="请输入用户名和密码";
		return false;
	} else {
		document.getElementById("name").style.borderColor = "";
		document.getElementById("sign_in_fail_msg").style.display = "none";
		document.getElementById("sign_in_fail_msg").innerHTML = "";
		return true;
	}
}

function sign_in_check_password() {
	var input_password = document.getElementById("password").value;
	if (input_password == "" || input_password == null) {
		document.getElementById("password").style.borderColor = "#FFA300";
		document.getElementById("sign_in_fail_msg").style.display = "block";
		//document.getElementById("sign_in_fail_msg").innerHTML="请输入用户名和密码";
		return false;
	} else {
		document.getElementById("password").style.borderColor = "";
		document.getElementById("sign_in_fail_msg").style.display = "none";
		document.getElementById("sign_in_fail_msg").innerHTML = "";
		return true;
	}
}

function sign_in_remember_me() {
	remember_me_box = document.getElementById("remember_name");
	if (remember_me_box.checked) {
		name = document.getElementById("name").value;
		var now = new Date();
		//设置Cookie过期时间为10天后
		var ex_days = 10;
		now.setTime(now.getTime() + ex_days * 60 * 1000);
		document.cookie = "name=" + name + ";expires=" + now.toUTCString() + ";path=/";
	}
}

function sign_in_box_check_all() {
	sign_in_remember_me();
	sign_in_check_name();
	sign_in_check_password();
	if (!sign_in_check_name() || !sign_in_check_password()) {
		document.getElementById("sign_in_fail_msg").style.display = "block";
		document.getElementById("sign_in_fail_msg").innerHTML = "请输入用户名和密码";
		return false;
	} else {
		document.getElementById("sign_in_input_area").submit(); //提交表单
	}
}

//注册表单检查
//消息框显示隐藏都调用此函数，yes显示，no隐藏
function inputDivHandler(inputBox,msgId,msgContent,para){
	if(para=='yes'){
		document.getElementById(inputBox).style.borderColor = "#FFA300";
		document.getElementById(msgId).className="msg_box";
		document.getElementById(msgId).style.opacity="1";
		document.getElementById(msgId).style.left="320px";
		document.getElementById(msgId).innerHTML=msgContent;
	}
	if(para=='no'){
		document.getElementById(inputBox).style.borderColor = "";
		document.getElementById(msgId).className="msg_box hidden";
		document.getElementById(msgId).style.opacity="";
		document.getElementById(msgId).style.left="";
	}
}

function checkId() {
	showAjaxMsg('no');
	inputId = document.getElementById('sign_up_id').value;
	if (inputId == '' || inputId == null) {
		inputDivHandler('sign_up_id','id_err','<span class="error_icon">请输入您的工号</span>','yes');
		return false;
	}
	num_reg=/[^0-9]/;
	if(inputId.match(num_reg)!=null){
		inputDivHandler('sign_up_id','id_err','<span class="error_icon">您输入的工号格式有误</span>','yes');
	    return false;
	}
		inputDivHandler('sign_up_id','id_err','','no');
		return true;
}


function checkKey() {
	showAjaxMsg('no');
	inputKey = document.getElementById('sign_up_key').value;
	if (inputKey == '' || inputKey == null) {
		inputDivHandler('sign_up_key','key_err','<span class="error_icon">请输入管理员提供给您的密钥</span>','yes');
		return false;

	} 
	key_reg=/\s+/;
		if(inputKey.match(key_reg)!=null){
		inputDivHandler('sign_up_key','key_err','<span class="error_icon">请输入正确的密钥</span>','yes');
	    return false;
	}
	else {
		inputDivHandler('sign_up_key','key_err','','no');
		return true;
	}
}
var checkResult='';
function showAjaxMsg(para){
	if(para=='yes'){
		document.getElementById('sign_up_id').style.borderColor = "#FFA300";
		document.getElementById('sign_up_key').style.borderColor = "#FFA300";
		document.getElementById('check_err').className="msg_box check_err";
		document.getElementById('check_err').style.opacity="1";
		document.getElementById('check_err').style.left="230px";
		document.getElementById('check_err').innerHTML='<span class="error_icon">'+checkResult;
	}
	if(para=='no'){
		document.getElementById('sign_up_id').style.borderColor ="";
		document.getElementById('sign_up_key').style.borderColor = "";
		document.getElementById('check_err').className="msg_box check_err hidden";
		document.getElementById('check_err').style.opacity="0";
		document.getElementById('check_err').style.left="205px";
	}
}
function checkAdminSignUpInput(para) {
	checkId();
	checkKey();
	inputId = document.getElementById('sign_up_id');
	inputKey = document.getElementById('sign_up_key');
	continueBtn = document.getElementById('continueBtn');
	signUpFormDiv = document.getElementById('sign_up_hide');
	signUpBoxForm = document.getElementById('signUpBoxForm');
	if (checkId() && checkKey()) {
		xmlhttp = new XMLHttpRequest();
		//GET方法
		/*
		xmlhttp.open("get","ajax_handler.php?sign_up_id="+inputId.value+"&sign_up_key="+inputKey.value,true);
		xmlhttp.send();
		*/

		//POST方法
		xmlhttp.open("post", "../auth/sign_up_ajax.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("sign_up_id=" + document.getElementById('sign_up_id').value + "&sign_up_key=" + document.getElementById('sign_up_key').value);
		xmlhttp.onreadystatechange= function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				checkResult=xmlhttp.responseText;
				//console.log(checkResult);
				if (checkResult== 'true') {
					if (para != 'slient') {
						continueBtn.style.display = "none";
						signUpFormDiv.className = "sign_up_hide";
						signUpBoxForm.style.height = "450px";
						document.getElementById('sign_up_id').setAttribute("readonly", "readonly");
						document.getElementById('sign_up_key').setAttribute("readonly", "readonly");
						document.getElementById('admin_check').className = "admin_check hide";
						document.getElementById('sign_up_outer_box').style.marginTop = "-265px";
						return true;
					}
					if(para=='slient'){
						return true;
					}
				} else {
					showAjaxMsg('yes');
					//inputDivHandler('sign_up_id','check_err','<span class="error_icon">'+checkResult,'yes');
					return false;
				}
			}
			
		}
		if (checkResult=="true"){return true;}else{return false;}
		
	} else {
		//alert("请填写工号和管理员提供给您的密钥");
		return false;
	}
}

/*function adminSignUpCheckAll() {
	if (!sign_up_box_check_all('adminCheck')) {
		return false;
	}else{
		document.getElementById("sign_up_input_area").submit();
	}
}*/


function sign_up_check_name() {
	var input_name = document.getElementById("sign_up_name").value;
	if (input_name == "" || input_name == null||input_name.length==0) {
		document.getElementById("sign_up_name").style.borderColor = "#FFA300";
		//document.getElementById("sign_in_fail_msg").style.display="block";
		//document.getElementById("sign_in_fail_msg").innerHTML="请输入用户名";
		inputDivHandler('sign_up_name','sign_up_name_err','<span class="error_icon">请输入用户名</span>','yes');
		
		return false;
	}
	if(input_name.length<4||input_name.length>16){
		
		inputDivHandler('sign_up_name','sign_up_name_err','<span class="error_icon">用户名长度为4-16个字符</span>','yes');
		
		//alert(msg="用户名长度为4-16个字符");
		return false;
	}
	first_reg=/^[0-9_]{1}/;
	if(input_name.match(first_reg)!=null){
		
		inputDivHandler('sign_up_name','sign_up_name_err','<span class="error_icon">用户名开头第一个字符必须是字母或者汉字</span>','yes');
		
		//alert(msg="用户名开头第一个字符必须是字母或者汉字");
		return false;
	}
	char_reg=/[^_0-9a-zA-Z\u4e00-\u9fa5]/;
	if(input_name.match(char_reg)!=null){
		
		inputDivHandler('sign_up_name','sign_up_name_err','<span class="error_icon">用户名仅由汉字、字母和下划线组成</span>','yes');
		//console.log(input_name.match(char_reg));
		//alert(msg="用户名仅由汉字、字母和下划线组成");
		return false;
	}
	
	inputDivHandler('sign_up_name','sign_up_name_err','','no');
		//document.getElementById("sign_up_name").style.borderColor = "";
		//document.getElementById("sign_in_fail_msg").style.display="none";
		//document.getElementById("sign_in_fail_msg").innerHTML="";
		return true;
	
}

function sign_up_check_email() {
	var input_email = document.getElementById("sign_up_email").value;
	if (input_email == "" || input_email == null) {
		
		inputDivHandler('sign_up_email','email_err','<span class="error_icon">请输入您的电子邮箱</span>','yes');
		
		//document.getElementById("sign_in_fail_msg").style.display="block";
		//document.getElementById("sign_in_fail_msg").innerHTML="请输入用户名和密码";
		return false;
	}
		email_reg=/^([0-9A-Za-z_\-\.])+@{1}[0-9A-Za-z_\-]+(\.[a-zA-z0-9\-]+)+$/;

		if(input_email.match(email_reg)==null){
			inputDivHandler('sign_up_email','email_err','<span class="error_icon">您输入的电子邮箱地址格式有误</span>','yes');
			return false;
		}

		
	 else {
		inputDivHandler('sign_up_email','email_err','','no');
		return true;
	}
}

function sign_up_check_password() {
	var input_confirm_password = document.getElementById("sign_up_confirm_password").value;
	var input_password = document.getElementById("sign_up_password").value;
	if (input_password == "" || input_password == null) {
		inputDivHandler('sign_up_password','pwd_err','<span class="error_icon">请输入密码</span>','yes');
		return false;
	} 
	
	if (input_password.length<6||input_password.length>16) {
		inputDivHandler('sign_up_password','pwd_err','<span class="error_icon">密码长度为6-16字符</span>','yes');
		return false;
	}
	pwd_reg=/[^0-9a-zA-Z~!@\%\^&\(\)\-_=\+,\.<>]/;
	if(input_password.match(pwd_reg)!=null){
		inputDivHandler('sign_up_password','pwd_err','<span class="error_icon">您的密码包含非法字符</span>','yes');
				return false;
	}
		inputDivHandler('sign_up_password','pwd_err','','no');
		inputDivHandler('sign_up_confirm_password','pwd_confirm_err','','no');
		return true;
}

function sign_up_check_confirm_password() {

	var input_confirm_password = document.getElementById("sign_up_confirm_password").value;
	var input_password = document.getElementById("sign_up_password").value;
	
	if (input_confirm_password == "" || input_confirm_password == null) {
		inputDivHandler('sign_up_confirm_password','pwd_confirm_err','<span class="error_icon">请再次输入密码</span>','yes');
		//document.getElementById("sign_up_confirm_password").style.borderColor = "#FFA300";
		//document.getElementById("sign_in_fail_msg").style.display="block";
		//document.getElementById("sign_in_fail_msg").innerHTML="请输入用户名和密码";
		return false;
	} 
	
	if(!sign_up_check_password()){
		inputDivHandler('sign_up_confirm_password','pwd_confirm_err','<span class="error_icon">您上一步输入的密码有误</span>','yes');
		return false;
	}
	

		if (input_confirm_password !== input_password) {
			inputDivHandler('sign_up_confirm_password','pwd_confirm_err','<span class="error_icon">您两次输入的密码不一致，请重新输入</span>','yes');
			document.getElementById("sign_up_password").style.borderColor = document.getElementById("sign_up_confirm_password").style.borderColor = "#FF0000";
			return false;
		} 	
			inputDivHandler('sign_up_confirm_password','pwd_confirm_err','','no');
			document.getElementById("sign_up_confirm_password").style.borderColor = "";
			document.getElementById("sign_up_password").style.borderColor = "";

			//document.getElementById("sign_in_fail_msg").style.display="none";
			//document.getElementById("sign_in_fail_msg").innerHTML="";
			return true;
	
}

function sign_up_check_captcha() {
	var input_captcha = document.getElementById("sign_up_captcha").value;
	if (input_captcha == "" || input_captcha == null) {
				inputDivHandler('sign_up_captcha','captcha_err','<span class="error_icon">请输入验证码</span>','yes');

		//document.getElementById("sign_up_captcha").style.borderColor = "#FFA300";
		//document.getElementById("sign_in_fail_msg").style.display="block";
		//document.getElementById("sign_in_fail_msg").innerHTML="请输入用户名和密码";
		return false;
	} 
		inputDivHandler('sign_up_captcha','captcha_err','','no');
		//document.getElementById("sign_in_fail_msg").style.display="none";
		//document.getElementById("sign_in_fail_msg").innerHTML="";
		return true;
	

}

function sign_up_box_check_all(para) {
	sign_up_check_name();
	sign_up_check_email();
	sign_up_check_password();
	sign_up_check_confirm_password();
	sign_up_check_captcha();
		if (!sign_up_check_name() ||
			!sign_up_check_email() ||
			!sign_up_check_password() ||
			!sign_up_check_confirm_password() ||
			!sign_up_check_captcha()
		) {
			alert("请将注册表单中的所有信息填写完整");
			return false;
		} else {
			
			if (para == 'adminCheck') {
				if (checkAdminSignUpInput('slient')!=true) {
				return false;
				}
			}
			
			document.getElementById("sign_up_input_area").submit(); //提交表单
		}
	
}
