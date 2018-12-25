<?php

/**
*本文件用于建立网站地图以方便搜索引擎收录
*@date:2017年12月25日 上午9:28:45
*@author:JackieHan<gogoend@qq.com>
*/

include 'cms_core/include/view_article.class.php';
header("Content-type: application/xml; charset=utf-8"); 

//$doc=new DOMDocument("1.0","utf8");//声明文档类型
//$doc->formatOutput=true;
//$root=$doc->createElement("urlsets","xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"");

$sitemap_file=fopen("sitemap.xml", "w");//以写入模式建立文件
$sitemap=new view_article();
$sitemap->list_all_article('normal');
$xml_head='<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
fwrite($sitemap_file, $xml_head);
echo $xml_head;
foreach($sitemap->article_result as $result){
    $xml_content='<url><loc>http://game.h-cube.ga/html/view.php?view_id='.$result['article_id'].'</loc>'.
             '<lastmod>'.date("Y-m-d",strtotime($result['article_publish_time'])).'</lastmod>
                 <changefreq>monthly</changefreq>
      <priority>0.8</priority>
   </url>';
    
    fwrite($sitemap_file, $xml_content);
    
    echo $xml_content;
   
    /*
    //创建标签
    $url=$doc->createElement("url");
    $loc=$doc->createElement("loc");
    $lastmod=$doc->createElement("lastmod");
    $changefreq=$doc->createElement("changefreq");
    $priority=$doc->createElement("priority");
    //把标签附加到节点
    $url=$root->appendChild($url);
    $loc=$url->appendChild($loc);
    $lastmod=$url->appendChild($lastmod);
    $changefreq=$url->appendChild($changefreq);
    $priority=$url->appendChild($priority);
    //在标签中添加文本内容
    $loc->appendChild($doc->createTextNode('http://game.h-cube.ga/beta/my_editor/view.php?view_id='.$result['article_id']));
    $lastmod->appendChild($doc->createTextNode(date("Y-m-d",strtotime($result['article_publish_time']))));
    $changefreq->appendChild($doc->createTextNode("monthly"));
    $priority->appendChild($doc->createTextNode('0.8'));*/
}
fwrite($sitemap_file, '</urlset>');
fclose($sitemap_file);
echo '</urlset>';

    //$doc->save("sitemap2.xml");
