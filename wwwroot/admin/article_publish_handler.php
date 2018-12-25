<?php
require dirname(__FILE__).'/../cms_core/include/publish_article.class.php';
    $target_article=new article();
    $target_article->preview_submit();
    $target_article->insert_into_mydb();