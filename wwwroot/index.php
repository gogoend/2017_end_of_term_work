<!doctype html>
<html>
<?php 
/**
*本文件为主页模板，用于列出整个网站的内容
*@date:2017年12月26日 上午11:05:42
*@author:JackieHan<gogoend@qq.com>
*/
    include_once 'cms_core/include/db_test.inc.php';
    db_test();
    include 'cms_core/include/view_article.class.php';
    $article_list=new view_article();
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="跑跑卡丁车,疯玩游戏,PopKart,游戏资讯,Jackie,">
<meta name="author" content="Jackie Han">
<meta name="description" content="本站为您提供跑跑卡丁车的最新资讯、游戏攻略以及赛事盛况。本站点由Jackie Han设计制作，部分素材来源于《跑跑卡丁车》游戏官网。本站仅提供跑跑卡丁车游戏的资讯，并非游戏营方以及官方网站，所有提供信息仅供参考。">
<link href="css/global.css" rel="stylesheet">
<link href="css/cms_page.css" rel="stylesheet">

<title>跑跑卡丁车 游戏资讯 - 疯玩游戏</title>
<style>

body {
	position: relative;
	background: #517693;
}


.game_logo {
	text-align: center;
	margin: 40px auto 0px auto;
}


.banner {
	position: relative;
	height: 350px;
	width: 1024px;
	margin: 20px auto 10px auto;
}
.banner_slide_area {
	position: absolute;
	height: 300px;
	margin: 15px 0px;
	width: 715px;
	left: 0;
	border: 10px solid transparent;
	border-image: url(img/cms_ui/banner_border.png) 10% 10%;
	background: rgba(233,233,233,1.00);
	border-radius: 10px;
	border-image-width: 10px;
	box-shadow: 3px 3px 5px rgba(0,0,0,0.5);
	overflow: hidden;
}

.banner_news_area {
	position: absolute;
	height: 350px;
	width: 284px;
	background: #00A6CC;
	right: 0;
	border: rgba(0,132,255,1.00) 10px;
	border-radius: 0px 15px 15px 0px;
	box-shadow: 3px 3px 5px rgba(0,0,0,0.5);
}
.banner_news_area:before {
	position: absolute;
	content: " ";
	font-size: 0;
	height: 320px;
	border-top: 15px solid;
	border-right: 15px solid;
	border-bottom: 15px solid;
	border-left: 0;
	border-color: transparent #007396 transparent transparent;
	left: -15px;
}

.banner_news_header {
	position: relative;
	height: 30px;
	color: rgba(24,84,156,1.00);
	font-size: 25px;
	padding: 10px;
	margin-bottom: 4px;
}
.banner_news {
	height: 330px;
	width: 100%;
	width: 93%;
	border-radius: 0px 10px 10px 0px;
	margin: 10px auto;
}
.banner_news_header img {
	position: absolute;
	top: -30px
}
.banner_news_title {
	background: rgba(244,244,244,1.00);
	height: 278px;
	right: 0;
	box-shadow: 2px 2px 20px rgba(192,192,192,1) inset;
	/*border-radius: 0px 0px 10px 0px;*/
	overflow-x: auto;
}
.banner_news_title li {
	border-bottom: rgba(148,148,148,1.00) dashed 2px;
	transition: 0.3s ease all;
	cursor: pointer;
	padding: 4px;
}
.banner_news_title li:last-of-type {
	border-bottom: 0px;
}
.banner_news_title li:hover {
	background: rgba(200,200,200,1.00);
}


.news_center_area {
	float: left;
	box-sizing: border-box;
}


.banner_slides a{
	display:block;
	width:100%;
	height:100%
	
}




.banner_prev {
	position: absolute;
	height: 100%;
	width: 80px;
	background: linear-gradient(to right, rgba(0,0,0,0.78), rgba(0,0,0,0));
	left: 0;
	cursor: pointer;
	opacity: 0;
}
.banner_next {
	position: absolute;
	height: 100%;
	width: 80px;
	background: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.78));
	right: 0;
	cursor: pointer;
	opacity: 0;
	transition: 0.4s ease all;
}
.banner_slide_area:hover .banner_prev, .banner_slide_area:hover .banner_next {
	opacity: 1;
}
	

	
	
	/*主页各个栏目*/
	.news_center_area .tag_active, .news_center_area .article_tags li:hover{
		background: rgba(255,110,0,1.00);
	}	
	.news_center_area .article_tags{
		border-bottom: 2px solid rgba(255,110,0,1.00);
	}	
	
	.trick_center_area .tag_active,.trick_center_area .article_tags li:hover{
		background: rgba(0,163,0,1.00);
	}	
	.trick_center_area .article_tags{
		border-bottom: 2px solid rgba(0,163,0,1.00);
	}
	
	.shot_center_area .tag_active{
		background: rgba(255,110,0,1.00);
	}	
	.shot_center_area .article_tags{
		border-bottom: 2px solid rgba(255,126,0,1.00);
	}
	/*栏目中的图标*/
	.article_icon_part{
		position: relative;
		background: linear-gradient(to bottom,rgba(244,244,244,1.00),rgba(193,193,193,1.00),rgba(233,233,233,1.00));
		height: 110px;
		width: 120px;
		box-shadow: 2px 2px 5px rgba(0,0,0,0.5);
		border-radius: 10px;
		float: left;
		margin: 5px;
		text-align: center;
		padding:4px
	}
	
	
	.article_icon_part:active{
		background: linear-gradient(to bottom,rgba(193,193,193,1.00),rgba(244,244,244,1.00),rgba(193,193,193,1.00));
		box-shadow: 0 0 ;
	}
	
	.icon_title{
		display: block;
		margin:2px;
	}

	
</style>
</head>
<body>
<div class="index_bg"></div>
<div class="top_bar">
  <div class="top_bar_content">
    <div class="logo_content">
      <img height="70px" src="img/cms_ui/logo.svg"/>
    </div>
  </div>
</div>
<div class="container">
  <div class="game_logo"><img height="80px" src="img/cms_ui/game_logo.png" /></div>
  <?php 
  
  include './html/assets/nav.php';
  echo $nav;
  
  ?>
  <div class="banner">
    <div class="banner_slide_area" id="banner_slide_area">
      <ul class="banner_slides" id="banner_slides" style="left:-100%;">
		
       <li class="" data-id="6" style="background-image: url(img/banner/6.jpg)"><a href="html/view.php?view_id=11" target="_blank"></a></li>
       
        <li class="" data-id="1" style="background-image: url(img/banner/1.jpg)"><a href="html/view.php?view_id=6" target="_blank"></a></li>
   
        <li class="" data-id="2" style="background-image: url(img/banner/2.jpg)"><a href="html/view.php?view_id=9" target="_blank"></a></li>
        <li class="" data-id="3" style="background-image: url(img/banner/3.jpg)"><a href="html/view.php?view_id=8" target="_blank"></a></li>
        <li class="" data-id="4" style="background-image: url(img/banner/4.jpg)"><a href="html/view.php?view_id=17" target="_blank"></a></li>
        <li class="" data-id="5" style="background-image: url(img/banner/5.jpg)"><a href="html/view.php?view_id=12" target="_blank"></a></li>
        <li class="" data-id="6" style="background-image: url(img/banner/6.jpg)"><a href="html/view.php?view_id=11" target="_blank"></a></li>
        
        <li class="" data-id="1" style="background-image: url(img/banner/1.jpg)"><a href="html/view.php?view_id=6" target="_blank"></a></li>
  
      </ul>
      <ul class="banner_point_btn" id="banner_point_btn">
        <li class="slide_ctrl_active" data-id="1"></li>
        <li class="" data-id="2"></li>
        <li class="" data-id="3"></li>
        <li class="" data-id="4"></li>
        <li class="" data-id="5"></li>
        <li class="" data-id="6"></li>
      </ul>
      <div class="banner_prev" id="banner_prev" onClick="slideChange('prev')"></div>
      <div class="banner_next" id="banner_next" onClick="slideChange('next')"></div>
    </div>
    <div class="banner_news_area">
      <div class="banner_news">
        <div class="banner_news_header"><img height="80px" src="img/cms_ui/banner_top_icon.png" /></div>
        <ul class="banner_news_title">
        
        <?php 
        
        $article_list->list_article_by_if_top('6');
        foreach ($article_list->article_result as $result){
            echo '<li><a href="html/view.php?view_id='.$result['article_id'].'" target="_blank">'.$result['article_title'].'</a></li>';
        }
        unset($article_list->article_result);
        unset($result);
        
        ?>
        
        
        
         
        </ul>
      </div>
    </div>
  </div>
  <div class="left_part">
    <div class="part news_center_area">
      <div class="news_center_header">
      
      <a target="_blank" href="html/list.php?category=资讯公告"><img height="60px" src="img/cms_ui/news_icon.png" /></a>
      
      </div>
      <div class="article_list" id="article_list" style="height: 240px">
		  <ul class="article_tags" id="tags">
		  	<li class="tag_active" data-id="1">全部资讯</li>
		  	<li class=""  data-id="2">最新活动</li>
			<li class=""  data-id="3">全服公告</li>
		  	<li class=""  data-id="4">赛事资讯</li>
		  	
		  </ul>
       <section class="article_title_area" data-id="1">

			<?php 
			
			$article_list->list_article_by_category_part('资讯公告','7');
			foreach ($article_list->article_result as $result){
                echo '<a href="html/view.php?view_id='.$result['article_id'].'" target="_blank"><li><span class="article_title">'.$result['article_title'].'</span> <span class="article_date">'.date("Y-m-d",strtotime($result['article_publish_time'])).'</span> </li></a>';
			}
			unset($article_list->article_result);
			unset($result);
			?>

		  </section>
       
       
       <section class="article_title_area" data-id="2" style="display: none">
       
            
             
<?php 
       $article_list->list_article_by_second_category_part('最新活动','8');
            foreach ($article_list->article_result as $result){
                echo '<a href="html/view.php?view_id='.$result['article_id'].'" target="_blank"><li><span class="article_title">'.$result['article_title'].'</span> <span class="article_date">'.date("Y-m-d",strtotime($result['article_publish_time'])).'</span> </li></a>';
            }
            unset($article_list->article_result);
            unset($result);
       ?>
       

		</section>
        
        
        
      <section class="article_title_area" data-id="3" style="display: none">
        
       
       <?php 
       $article_list->list_article_by_second_category_part('全服公告','8');
            foreach ($article_list->article_result as $result){
                echo '<a href="html/view.php?view_id='.$result['article_id'].'" target="_blank"><li><span class="article_title">'.$result['article_title'].'</span> <span class="article_date">'.date("Y-m-d",strtotime($result['article_publish_time'])).'</span> </li></a>';
            }
            unset($article_list->article_result);
            unset($result);
       ?>


	</section>
        
        
              <section class="article_title_area" data-id="4" style="display: none">
        
        <?php 
       $article_list->list_article_by_second_category_part('赛事资讯', '8');
            foreach ($article_list->article_result as $result){
                echo '<a href="html/view.php?view_id='.$result['article_id'].'" target="_blank"><li><span class="article_title">'.$result['article_title'].'</span> <span class="article_date">'.date("Y-m-d",strtotime($result['article_publish_time'])).'</span> </li></a>';
            }
            unset($article_list->article_result);
            unset($result);
       ?>
	</section>
        
        
      </div>
    </div>
    
    <div class="part trick_center_area">
      <div class="trick_center_header"> <a target="_blank" href="html/list.php?category=资讯公告"><img height="60px" src="img/cms_ui/game_trick_icon.png" /> </a></div>
<div class="article_list">

        <a href="http://localhost/html/view.php?view_id=18"><div class="article_icon_part"><img height="75px" src="img/cms_ui/box_icon.png"/><span class="icon_title">道具介绍</span></div></a>
		<a href="http://localhost/html/view.php?view_id=19"><div class="article_icon_part"><img height="75px" src="img/cms_ui/role_icon.png"/><span class="icon_title">角色介绍</span></div></a>
        
      </div>
    </div>
   <!--  <div class="part shot_center_area">
      <div class="shot_center_header"> <img height="60px" src="img/cms_ui/player_shot_icon.png" /> </div>
<div class="article_list">

       

        
      </div>
    </div>
     -->
  </div>
  <div class="right_part">
    <div class="side part">
      <div style="text-align: center"><a href="http://localhost/html/view.php?view_id=27" target="_blank"> <img height="70px" src="img/cms_ui/fresh_icon.png" /></a> </div>
    </div>
    <div class="side part">
      <div class="my_center" style="text-align: center">
        <div class="my_center_header"> <img height="60px" src="img/cms_ui/my_center_icon.png" /> </div>
        <div class="sign_in_part">
          <?php 
        if(!isset($_SESSION['current_user'])){
            echo '
          <form id="sign_in_input_area" action="auth/sign_in_handler.php" method="post">
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
            echo '你好，'.$_SESSION['current_user'];
        }
          ?>
        </div>
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

include './html/assets/footer.php';
echo $footer;

?>
<!--全页页脚结束-->

<script src="js/sign_in_ui.js"></script> 
<script src="js/slides.js"></script>
<script src="js/tab_page.js"></script>
</body>
</html>