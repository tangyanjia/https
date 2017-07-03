<?php
namespace Home\Controller;

use Think\Controller;

class ApiController extends Controller
{

    public function getApi()
    {
        // //使用file_get_contents 来请求接口
        $url = 'http://api.map.baidu.com/telematics/v2/weather?location=%E4%B8%8A%E6%B5%B7&ak=B8aced94da0b345579f481a1294c9094';
        // $content = file_get_contents($url);
//         $ch = curl_init($url);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         $content = curl_exec($ch);
//         curl_close($ch);
//         dump($content);

        $content = request($url);
        dump($content);exit;

    }
    public function phpinfo()
    {
        phpinfo();
    }
    //创建一个json 数据
    public function createJson()
    {
        $arr = array(
            'username' => '小明',
            'age'      => '28',
        );
        $str = json_encode($arr);
        echo $str;
    }
    //读取json 数据
    public function readJson()
    {
        // $str = file_get_contents('http://www.tpshop.com/index.php/Home/api/createJson');
        $arr = array(
            'username' => '小明',
            'age'      => '28',
        );
        $str = json_encode($arr);

        $arr = json_decode($str, true);
        dump($arr['username']);exit;
    }
    public function createxml()
    {
        $str = "<?xml version='1.0' encoding='utf-8'?>";
        $str .= '<books>';
        $str .= '<book>';
        $str .= '<name>';
        $str .= '葵花宝典';
        $str .= '</name>';
        $str .= '</book>';
        $str .= '</books>';
        //保存文件
        $res = file_put_contents('./books.xml', $str);
        dump($res);

    }
    public function readxml()
    {
        //读取xml
        $xml = file_get_contents('./books.xml');
        //xml数据读取将xml 转换成对象
        $objxml = simplexml_load_string($xml);
        //访问name
        echo $objxml->book->name;exit;

    }

    //综合案例 读取天气预报
    public function getWeather()
    {
        $url     = 'http://api.map.baidu.com/telematics/v2/weather?location=%E4%B8%8A%E6%B5%B7&ak=B8aced94da0b345579f481a1294c9094';
        $content = file_get_contents($url);
        // 将字符串转换成对象
        $xmlobj = simplexml_load_string($content);
        foreach ($xmlobj->results->result as $key => $value) {
            echo '今天实时天气：' . $value->date . '</br>';
            echo '天气情况：' . $value->weather . '</br>';
            echo '白天天气情况：<img src="' . $value->dayPictureUrl . '" /></br>';

        }
        // dump($content);exit;       
    }
    //获取电话号码
    public function getPhone()
    {
        //17621658657
        $url     = 'http://cx.shouji.360.cn/phonearea.php?number=13101972482';
        $content = file_get_contents($url);
        $arr     = json_decode($content, true);
        dump($arr);exit;

    }

}
