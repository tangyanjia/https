<?php
namespace Home\Controller;

use Think\Controller;
class TestController extends Controller
{
    public function show()
    {
        gbk2utf8();exit;
        $this->display('test');
    }
    public function index()
    {
        echo U('index/index');
//        $this->error('操作失败','index/index');
    }

    public function test()
    {
       $title = 'php9发送的邮件';
       $this->assign('title',$title);
       //获取模板内容
//        $content = $this->fetch();
        $content = $this->display();
        var_dump($content);exit;
    }
    public function test2()
    {
        $stu = new Stu();
        $stu->getName();
    }
    public function test1()
    {
        $a = 10;
        $b = 12;
        $this->assign('a',$a);
        $this->assign('b',$b);
        $this->display('test');
    }
    public function test10()
    {
        $arr = array('西游记','三国演义','水浒传','红楼梦');
        $arr2 = array(
            array('西游记','三国演义','水浒传','红楼梦'),
            array('关羽','吕布','张飞','赵云'),
            array('鲁智深','吕方','关胜','武松'),
            array('林黛玉','贾宝玉','薛宝钗','秀娘')
        );
        $this->assign('arr',$arr);
        $this->assign('arr2',$arr2);
        $this->display('test');
    }

    //if判断语句
    public function week()
    {
        $date = date('w');
//        dump($date);exit;
        $this->assign('date',$date);

        $this->display('test');
    }

    //实例化练习
    public function brand()
    {
        $arr = array (
            'brand_name'=>'FaceBook',
            'brand_sort'=>1,
            'id'=>1,
        );
        $arr1 = array (
            'brand_name'=>'You Tube',
            'brand_sort'=>1,
            'id'=>2,
        );


//        $model = D('Brand');
//        $model = M('Brand');
//        dump($model);exit;
//        $model->getList();
        $model = M('brand');
        $res = $model->select();
        dump($res[0]);exit;
    }

    //CURD操作数据库
    public function test16()
    {
        G('start_for');
        for($i=0;$i<=1000;$i++){
//            echo $i;
        }
        G('end_for');
        //第三个参数如果为数字则表示统计时间小数点几位数，默认值4，
        //字母m统计执行的内存小号多少内存
        echo G('start_for','end_for',6);
    }
    public function test17(){
        $model = M('brand');
        $datas = $model->count('id');
        echo M('brand')->_sql();
//        dump($datas);
    }

    public function test18(){
        $model = M('brand');
        $datas = $model->avg('id');
        echo M('brand')->_sql();
//        dump($datas);
    }
    //AR操作
    public function test110()
    {
        $model = M('brand');
//        $model->find(13);
        $model->delete();
    }
    /**
     * Thinkphph中常用的辅助方法
     */
    public function test19()
    {
        //实例化模型
        $model = M('brand');
        $data = $model->group('id')->select();
        dump($data);
        echo $model->_sql();
    }
    //session
    public function test20()
    {
        session('username','小红');
        session('uid','1');
//        dump($_SESSION);
        $value = session('username');
//        echo $value;
//          session('username',null);
//          dump($_SESSION);
        dump(session('?username'));
    }
    //cookie
    public function test21()
    {
//        echo (cookie('username','小行'));
        dump($_COOKIE);
        //获取cookie的值
        $value = cookie('PHPSESSID');
        echo $value;
        //设置cookie的值
        cookie('username', 'xiaoming');
        cookie('truename', '小红红',3600);
        dump(cookie());
        cookie('username', null);
        dump(cookie());
        cookie(null);//只能删除有前缀的cookie的值
        dump(cookie());
    }
}





















