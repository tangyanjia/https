<?php
return array(
    //'配置项'=>'配置值'
    'SHOW_PAGE_TRACE' => true,//在页面下面显示日志信息
    'TMPL_PARSE_STRING' => array(
        '__HOME__' => __ROOT__.'/Public/Home/',
        '__ADMIN__' => __ROOT__.'/Public/Admin/',
        '__UPLOAD__'=>__ROOT__.'/Uploads/',
    ),
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'tp_brand',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tp_',    // 数据库表前缀
    'LOAD_EXT_FILE'     => 'treeList',
    'DEFAULT_FILTER'        =>  'htmlPurifier', // 默认参数过滤方法 用于I函数...
);
