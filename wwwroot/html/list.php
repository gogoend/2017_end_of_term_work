<!doctype html>
<?php 
    /**
    *本文件用于直接列出文章的内容
    *@date:2017年12月23日 下午4:01:37
    *@author:JackieHan<gogoend@qq.com>
    */
include_once dirname(__FILE__).'/../cms_core/include/db_test.inc.php';
db_test();
require dirname(__FILE__).'/../cms_core/include/view_article.class.php';
    $article_list=new view_article();
    session_start();
    
?>

<html>
<head>
<meta charset="utf-8">
<link href="../css/global.css" rel="stylesheet">
<link href="../css/cms_page.css" rel="stylesheet">

<style>
.game_logo {
	text-align: center;
	margin: 40px auto 0px auto;
}
	
	
		.article_title_area a:link{
		color: rgba(22,22,22,1.00);
	}
	
	.article_title_area a:visited{
		color: rgba(22,22,22,1.00);
	}
	
	.article_title_area a:hover{
		color: rgba(22,22,22,1.00);
	}
	
	.article_title_area a:active{
		color: rgba(22,22,22,1.00);
	}
	
		.article_list li:hover{
		background: rgba(210,210,210,1.00)
	}
	
	
.article_list li .article_title {
	display: block;
	float: left
}
.article_list li .article_date {
	display: block;
	float: right
}
.news_center_area {
	float: left;
	box-sizing: border-box;
}
	.article_tags{
		font-size: 0;
	}

	.article_tags li{
		display: inline-block;
		width: 80px;
		padding: 10px;
		background: rgba(81,81,81,1.00);
		font-size: 16px;
		text-align: center;
		color:#fff;
		transition: 0.5s ease all;
		cursor: pointer;
	}
	.news_center_area .tag_active, .news_center_area .article_tags li:hover{
		background: rgba(255,110,0,1.00);
	}	
	.news_center_area .article_tags{
		border-bottom: 2px solid rgba(255,110,0,1.00);
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
    <div class="part news_center_area">
      <div class="news_center_header">
      <?php 
switch ($_GET['category']){
    case '资讯公告': echo '<img height="60px" src="../img/cms_ui/news_icon.png" />';break;
    case '新手入门': echo '<img height="60px" src="../img/cms_ui/fresh_icon.png" />';break;
    case '攻略中心': echo '<img height="60px" src="../img/cms_ui/game_trick_icon.png" />';break;
    default:echo '<br/>';
}
      
      ?>
      </div>
      <div class="article_list" id="article_list" >      
      
      <?php 
        if($_GET['category']=='资讯公告')
            echo '
		  <ul class="article_tags" id="tags">
		  	<li class="tag_active" data-id="1">全部资讯</li>
		  	<li class=""  data-id="2">全服公告</li>
		  	<li class=""  data-id="3">赛事资讯</li>
		  </ul>';
		  
		  ?>
       <section class="article_title_area" data-id="1">
       
       
       <?php 
       $article_list->list_article_by_category();
                       foreach($article_list->article_result as $result){
                           echo '<a href="view.php?view_id='.$result['article_id'].
                           '"><li>
                <span class="article_title">'.
                                           $result['article_title']
                                           .'</span>
                <span class="article_date">'.
                                           date("Y-m-d",strtotime($result['article_publish_time']))
                                           .'</span>
                </li>
                </a>';
                       }
       unset($result);
       unset($article_list->article_result);
       ?>
	    </section>
       
       
       
       
       
       <?php 
       if($_GET['category']=='资讯公告'){
           echo '<section class="article_title_area" data-id="2" style="display: none">';
            $article_list->list_article_by_second_category_part('全服公告','9999');
            foreach ($article_list->article_result as $result){
                echo '<a href="view.php?view_id='.$result['article_id'].'" target="_blank"><li><span class="article_title">'.$result['article_title'].'</span> <span class="article_date">'.date("Y-m-d",strtotime($result['article_publish_time'])).'</span> </li></a>';
            }
            unset($article_list->article_result);
            unset($result);
       echo '</section><section class="article_title_area" data-id="3" style="display: none">';
       $article_list->list_article_by_second_category_part('赛事资讯','9999');
            foreach ($article_list->article_result as $result){
                echo '<a href="view.php?view_id='.$result['article_id'].'" target="_blank"><li><span class="article_title">'.$result['article_title'].'</span> <span class="article_date">'.date("Y-m-d",strtotime($result['article_publish_time'])).'</span> </li></a>';
            }
            unset($article_list->article_result);
            unset($result);
            echo '</section>';
       }
       ?>
	
        
        
      </div>
    </div>

    <div class="part shot_center_area"> </div>
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
<script src="../js/tab_page.js"></script>
</body>
</html>