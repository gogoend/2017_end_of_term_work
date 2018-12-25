<!doctype html>
<?php 

include_once dirname(__FILE__).'/../cms_core/include/db_test.inc.php';
db_test();
?>
<html>
<head>
<meta charset="utf-8">

<title>疯玩游戏 - H-Cube.ga CMS</title>
<link rel="stylesheet" href="../css/global.css">
		<style>
		html,body{
			padding: 0;
			margin: 0;
			height: 100%;
		}
			body{
				background: url(../img/web_ui/bg.jpg);
				min-width: 800px;
			}
			.container{
				overflow-y: hidden;
                height: 100%;
                max-width: 1920px;
                margin: 0 auto;
                width: 100%;
                position: relative;
			}
		.menu_panel{
			background: rgba(18,18,18,0.8);
    position: absolute;
    width: 250px;
    height: 100%;
    color: #fff;
    float: left;
    box-shadow: 2px 2px 5px rgba(0,0,0,0.8);
			
			
			
			
		}
		.operation_area{
			/*width: 100%;*/
    height: 100%;
    /* float: right; */
    resize: horizontal;
    margin-left: 250px;
    /* position: absolute; */
		}
			.operation_area iframe{
				background: #fff;
				height: 100%;
				width:100%;
				border: 0;
			}
			.menu_panel_option li{
				height: 25px;
				padding: 5px;
				transition: 0.3s ease all;
			}
			
			.menu_panel_option li:hover{
				background: rgba(255,71,0,1.00);
			}
			
			.user_hello{
				height:160px;
				background: rgba(0,0,0,1.00);
			}
			a:link,a:visited{
				color:#fff;
			}
			a:hover,a:active{
				color:#fff;
				text-decoration: underline;
			}
	</style>
</head>

<body>
<div class="container">
	<div class="menu_panel">
	<div class="user_hello">
		<?php 
		session_start();
		if(!isset($_SESSION['current_user'])){
			header("Location:sign_in.html");
		}
		 echo '你好，'.$_SESSION['current_user'];
		?>
		</div>
		<ul class="menu_panel_option">
		
			<a href="editor.php"  target="operation_page"><li>发布新文章</li></a>
			<a href="article_table.php" target="operation_page"><li>所有文章</li></a>
		<!--<hr />
				<li>用户管理</li>-->
		<hr />
			<a href="../auth/sign_out_handler.php" target="_self"><li>退出登录</li></a>
		
		</ul>
	</div>
	<div class="operation_area">
		<iframe name="operation_page" src="editor.php"></iframe>
	</div>
	</div>
<!--删除页面上的空白字符-->
<script>
var xxx=document.body.innerHTML;
document.body.innerHTML=xxx.replace(/\ufeff/g,"");
</script>
<!--删除页面上的空白字符-->
</body>
</html>
