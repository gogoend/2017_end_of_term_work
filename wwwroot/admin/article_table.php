<!doctype html>
<?php 
require dirname(__FILE__).'/../cms_core/include/view_article.class.php';
    session_start();
    if(!isset($_SESSION['current_user'])){
        header('Location:sign_in.html');
    }
    $article_list=new view_article();
    $article_list->list_all_article('everything');
?>
<html>
<head>
<meta charset="utf-8">

<title>文章列表</title>
	<style>
	
		.article_table{
			width:90%;
			margin: 0 auto;
			border-collapse:collapse;
		}
		.article_table th{
			background: rgba(255,87,0,1.00);
			color: rgba(255,255,255,1.00);
		}

		.article_table tr{
			height: 40px
		}
		.article_table tr:nth-child(even){
			background: rgba(255,255,255,1.00);
		}
		.article_table tr:nth-child(odd){
			background:rgba(224,224,224,1.00);
		}
		
		.article_table td{
			border: rgba(128,128,128,1.00) 1px solid;
		}
		
		.article_table th{
			border: rgba(255,255,255,1.00) 1px solid;
		}


	</style>
</head>

<body>

<table class="article_table" border="0">
  <tbody>
    <tr>
      <th>id</th>
      <th>标题</th>
      <th>作者</th>
      <th>发布时间</th>
      <th>状态</th>
      <th>分类</th>
      <th>二级分类</th>
      <th>置顶</th>
    </tr>
    
    <?php 
    
    foreach ($article_list->article_result as $result){
        echo "
            <tr>
                <td>".$result['article_id']."</td>
                <td>".$result['article_title']."</td>
                 <td>".$result['article_author_id']."</td>
                <td>".$result['article_publish_time']."</td>
                <td>".$result['article_status']."</td>
                <td>".$result['article_category']."</td>
                <td>".$result['article_second_category']."</td>
                <td>".$result['article_if_top']."</td>
            </tr>
        ";
    }
    unset($result);
    ?>
  </tbody>
</table>
</body>
</html>