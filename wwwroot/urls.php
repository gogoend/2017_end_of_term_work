<?php 
$urls = array(
    'http://www.h-cube.ga/index.html',
    'http://h-cube.ga/index.html',
    );
$api = 'http://data.zz.baidu.com/urls?site=h-cube.ga&token=xo6TAWAwxS4euyk5';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
echo $result;