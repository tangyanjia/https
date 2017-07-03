<?php
/**
 * Created by PhpStorm.
 * User: tyj
 * Date: 2017/5/29
 * Time: 13:58
 */
function gbk2utf8()
{
    echo '小不忍则乱大谋！';
}

/**
 * htmlpurifier防XSS攻击第三方插件
 * @param $str
 * @return string
 */
function htmlPurifier($str)
{
    //引入第三方类库过滤敏感标签
    Vendor('htmlpurifier.library.HTMLPurifier#auto');

    //获取默认配置
    $config = HTMLPurifier_Config::createDefault();
    //根据配置项来设置
    $purifier = new HTMLPurifier($config);
    //过滤字符串
    $clean_html = $purifier->purify($str);
    return $clean_html;
}

    /**
     * 公共上传函数
     * @param return array
     */

function uploadPic()
{
        #上传配置
        $config = array(
            'maxSize' => 3145728, //上传文件大小
            'rootPath' => UPLOAD,//定义的上传路径---最好使用绝对路径
        );
        #实例化上传类
        $upload = new \Think\Upload($config);
        #调用上传的方法
        $info = $upload->upload();//没有参数
        if (!$info) {
            #获取错误信息
            echo $upload->getError();exit;
        }
        return $info;

}

#递归方法实现无限极分类
function getTree($list,$pid=0,$level=0) {
    static $tree = array();
    foreach($list as $row) {
        if($row['pid']==$pid) {
            $row['level'] = $level;
            $tree[] = $row;
            getTree($list, $row['id'], $level + 1);
        }
    }
    return $tree;
}
/**
 * 创建一个表示状态的函数
 */
function getStatus($key){
    $array = array(
        '0'=>'否',
        '1'=>'是',
    );
    return $array[$key];
}

/**
 * 接口请求方法
 *@param $url 请求的地址
 *@param $https 使用启用https协议
 *@param $method 请求方式
 *@param $data 请求参数
 */
function request($url, $https = true, $method = 'get', $data = null)
{
    //1.初始化，开打网页
    $ch = curl_init($url);
    //2.设置参数
    //设置请求的数据直接保存成字符串
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //支持https协议
    if ($https) {
        //绕过证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    }
    //支持post请求 参数名称=参数的值&参数2=值2
    if ($method = 'post') {
        curl_setopt($ch, CURLOPT_POST, true);
        //param=val&param2=val2
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    //3.发送请求
    $content = curl_exec($ch);
    //4.关闭资源链接
    curl_close($ch);
    //返回请求获取的数据
    return $content;
}




















