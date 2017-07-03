<?php
header('Content-Type:text/html;charset=utf-8');
define('APP_PATH','./Application/');//定义项目文件夹的路径
define('APP_DEBUG',true);    //开发模式
#网站根目录
define('WEB_ROOT', str_replace('\\','/',__DIR__));
#上传路径--绝对路径
define('UPLOAD',WEB_ROOT.'/Uploads/');
//绑定分组，如果绑定类分组，就无法访问别的分组
//define('BIND_MODULE','Admin');
//调试模式/运行模式
//不生成安全文件
define('DIR_SECURE_FILENAME', false);
require './ThinkPHP/ThinkPHP.php';
