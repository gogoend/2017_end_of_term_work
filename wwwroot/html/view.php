<!doctype html>

<?php

/**
*本文件为文章查看模板，用于查询数据库中的文章，并把文章展现给用户
*@date:2017年12月22日 下午4:25:09
*@version:2.0
*@author:JackieHan<gogoend@qq.com>
*/

include_once dirname(__FILE__).'/../cms_core/include/db_test.inc.php';
db_test();

session_start();

require dirname(__FILE__).'/../cms_core/include/view_article.class.php';

$target_article = new view_article();
$target_article->query_article();


?>


<html>
<head>
<meta charset="utf-8">
<title><?php echo "$target_article->title".' - '."$target_article->category".' - H-Cube.ga门户'?></title>

<link href="../css/global.css" rel="stylesheet">
<link href="../css/cms_page.css" rel="stylesheet">



<style>
	

body {
	position: relative;
	background: #517693;
}
.game_logo {
	text-align: center;
	margin: 40px auto 0px auto;
}
.article_content {
	background: rgba(244,244,244,1.00);
	padding: 20px;
	width: 665px;
	z-index: -1;
	margin: 0 auto;
	border: 10px solid transparent;
	border-image: url(../img/cms_ui/banner_border.png) 10% 10%;
	border-image-width: 10px;
	border-radius: 8px;
	overflow: auto;	box-shadow: 4px 4px 10px rgba(0,0,0,0.4) ; 

}


.game_tip {
	color: white;
	clear: both;
	text-align: center;
	background: rgba(33,33,33,1.00);
	padding: 10px 10px 10px 20px;
	z-index: -1;
	margin: 10px auto;
	border-radius: 20px
}
.logo_content {
	float: left;
	margin: 5px;
}
.logo_content svg {
	display: inline-block;
	vertical-align: middle;
}
.top_bar_content {
	margin: 0 auto;
	width: 1024px;
}
.navi_part {
	position: relative;
}

.random_news {
    background: rgba(243,243,243,1.00);
	padding: 10px 15px ;
	z-index: -1;
	margin: -25px auto auto 25px;
	border: 10px solid transparent;
	border-image: url(../img/cms_ui/banner_border.png) 10% 10%;
	border-image-width: 10px;
	border-radius: 8px;
}


.random_news li{
	line-height:1.6em;
	font-size:14px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
	border-bottom: 1px dashed rgba(128,128,128,0.4);
}

.random_news a:hover{
	text-decoration:underline;
}
	
.random_news span{
	padding: 2px;
	margin: 2px;
	width: 100%;
	clear: both;
	height: 20px;
	border-bottom: 1px dashed rgba(0,0,0,0.1);
	line-height: normal;	
}
	
	header h1{
	text-align: center;
	line-height: 1.2em;
	font-weight: normal;
	}
	
	header h4{
		text-align: center;
		font-weight: normal;
	}
	
	.breed_navi{
		clear: both;
		margin-top:10px;
		line-height: 20px;
		background: rgba(244,244,244,1.00);
		padding:10px 20px;
		box-shadow: 2px 2px 1px rgba(0,0,0,0.4) inset; 
		border-radius: 20px;
	}
	
	.breed_navi a{
	display:inline
	}
	
		.share_btn_area{
		clear: both;
		line-height: 32px;
		background: rgba(244,244,244,1.00);
		padding:5px 10px;
		box-shadow: 4px 4px 10px rgba(0,0,0,0.4) ; 
		border-radius: 15px;
		float: right;
		margin-bottom: 10px
	}
	
	.share_btn_area svg{
		height: 32px;
		width:32px;
		vertical-align: middle;
		pointer-events: none;
	}
	

	.share_btn{
		display: inline-block;
		padding: 4px;
		transition: 0.3s ease all;
		cursor: pointer;
	}


	.share_btn:hover{
		background: rgba(54,48,48,1.00);
		border-radius: 16px
	}
	
	
	.breed_navi span{
		position: relative;
		padding:4px 10px;
		background: rgba(0,116,255,1.00);
		color: rgba(255,255,255,1.00);
		margin: 0px 5px;
		box-shadow: 2px 2px 4px rgba(0,0,0,0.5);
	}
	
	.breed_navi span:before{
		
	content: "";
	position: absolute;
	left: -18px;
	top: 5px;
	font-size: 0px;
	line-height: 0px;
	width: 0px;
	height: 0px;
	border: solid;
	border-width: 9px 9px;
	border-color: transparent rgba(0,116,255,1.00) transparent transparent;
	}
	
	.article_information span{
		margin: auto 0.5em;
	}
	
	.article_content article{
		line-height: 1.8em;
		font-size: 14px;
		width:90%;
		margin: 0 auto;
		word-break: break-all;
		
	}
	
	
	.article_information{
		font-size:14px
	}
	
	.breed_navi a:link,.breed_navi a:visited,.breed_navi a:active,.breed_navi a:hover{
	   color:#FFF
	}

.copy_license_area {
    line-height: 32px;
    background: rgba(244,244,244,1.00);
    padding: 5px 10px;
    box-shadow: 4px 4px 10px rgba(0,0,0,0.4);
    border-radius: 15px;
    clear: both;
    margin-bottom: 10px;
    text-align: center;
}

	


article p img{
	display:block;
	max-width:100%;
	margin:0 auto;
}
	
</style>
</head>
<body>
<div class="index_bg"></div>
<div class="top_bar">
  <div class="top_bar_content">
    <div class="logo_content">
                  <img height="70px" src="../img/cms_ui/logo.svg"/>

    </div>
  </div>
</div>
<div class="container">
  <div class="game_logo"><img height="80px" src="../img/cms_ui/game_logo.png" /></div>
  
<?php 

include './assets/nav.php';
echo $nav;

?>


<div class="left_part">
	<div class="breed_navi">您现在位置：
    <a target=_self  href="../index.php"><span>主页</span></a>
   
<?php 

echo '<a target=_self href="list.php?category='.$target_article->category.' "><span>'.$target_article->category.'</span></a>';

?>




    </div>

    <div class="part">
      <div class="article_content" id="article_content" style="">
      
		  <header>
      		
			  <h1 id="article_title"><?php 
			  
			  echo $target_article->title;
			  
			  ?></h1>
			  <h4 class="article_information">
			

 <?php
            if ($target_article->from != '') {
                echo '<span class="article_source"><a href="'.$target_article->from.'" target="_blank">文章来源'.'</a></span>';
            }
            if ($target_article->author != '') {
                echo '<span class="article_author">作者：' . $target_article->author . '</span>';
            }
            
            ?>
			  

			<span class="article_publish_time">发布时间：
			<?php 
			echo $target_article->publish_time;
			?>
			
			</span>
			<span class="article_click_rate">点击量：
			
			<?php 
			
			echo $target_article->click_rate;
			
			?>

     		
     		</h4>
      		</header>
       		<hr />
		  <article>
		  
       		  <?php 
               echo $target_article->content_code;
       ?>
       
       
       </article>
        
         
           </div>
           
           
           
    </div>
    
        <div class="copy_license_area">
    <?php
    switch($target_article->licence){
        case 'by-nc-sa40':echo '本文采用 署名-非商业性使用-相同方式共享 4.0 国际许可 进行许可';break;
        case 'by-nc-nd40':echo '本文采用 署名-非商业性使用-禁止演绎 4.0 国际许可 进行许可';break;
        case 'by-nc40':echo '本文采用 署名-非商业性使用 4.0 国际许可 进行许可';break;
        case 'by-sa40':echo '本文采用 署名-相同方式共享 4.0 国际许可 进行许可';break;
        case 'by-nd40':echo '本文采用 署名-禁止演绎 4.0 国际许可 进行许可';break;
        case 'by40':echo '本文采用 署名 4.0 国际许可 进行许可';break;
        case 'repost':echo '本文转载自网络，版权归原作者所有';break;
        case 'copyright':echo '本文版权所有，转载请附带本页网址<br/>http://'.$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];break;
        default:echo '本文版权所有';break;
    }
    if($target_article->from!=''||!empty($target_article->from)){
        echo '&nbsp;<a class="from_link" href="'.$target_article->from.'" target="_blank">原文链接</a>';
    }
    ?>		
    </div>
    
    <!-- 分享开始 -->
<?php 
    include './assets/share.php';
    echo $share;
?>
    <!-- 分享结束 -->
    
    
    

    
    
    
  </div>
  <div class="right_part">
    <div class="side part">
<div style="text-align: center"><a href="http://localhost/html/view.php?view_id=27" target="_blank"> <img height="70px" src="../img/cms_ui/fresh_icon.png" /></a> </div>    </div>
    <div class="side part">
      <div class="my_center" style="text-align: center">
        <div class="my_center_header"> <img height="60px" src="../img/cms_ui/my_center_icon.png" /> </div>
        <div class="sign_in_part">
          <?php 
        if(!isset($_SESSION['current_user'])){
            echo '
          <form id="sign_in_input_area" action="../auth/sign_in_handler.php" method="post">
            <section>
              <input onblur="sign_in_check_name()" name="name" id="name" type="text" placeholder="登录名">
            </section>
            <section>
              <input onblur="sign_in_check_password()" name="password" id="password" type="password" placeholder="密码">
            </section>
            <section style="float: left;display: inline-block;line-height: 40px">
              <input id="remember_name" type="checkbox" style="vertical-align: middle">
              <lable style="vertical-align: middle">记住用户名</lable>
            </section>
            <button type="button" onclick="sign_in_box_check_all()">登录</button>
			  <div id="sign_in_fail_msg"></div>
          </form>';
        }else{
            echo $_SESSION['current_user'];
        }
          ?>
        </div>
      </div>
    </div>
    
    
        <div class="side part">
         <div style="text-align: center"> <img height="50px" src="../img/cms_ui/click_top_icon.png" /> </div>
        <div class="random_news">
          
          <?php 
          
          $target_article->list_article_by_click_rate('10');
          foreach ($target_article->article_result as $result){
              echo '<li><a href="./view.php?view_id='.$result['article_id'].'" target="_blank"><span class="article_title">'.$result['article_title'].'</span></a> </li>';
          }
          unset($target_article->article_result);
          unset($result);
          
          ?>
        
        
          
          
        </div>
    </div>
    
    
    
  </div>
  <div class="game_tip"> 抵制不良游戏，拒绝盗版游戏。
    注意自我保护，谨防受骗上当。
    适度游戏益脑，沉迷游戏伤身。
    合理安排时间，享受健康生活。 </div>
</div>

<!--全页页脚开始-->

<?php 

include './assets/footer.php';
echo $footer;

?>

<!--全页页脚结束--> 

<script src="../js/sign_in_ui.js"></script> 
<script src="../js/share.js"></script>
</body>
</html>