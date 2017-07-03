<?php
/**
 * Created by PhpStorm.
 * User: tyj
 * Date: 2017/6/10
 * Time: 20:40
 *//*
*——————————————————佛祖保佑 ——————————————————
 *                   _ooOoo_
 *                  o8888888o
 *                  88" . "88
 *                  (| -_- |)
 *                  O\  =  /O
 *               ____/`---'\____
 *             .'  \|     |//  `.
 *            /  \|||  :  |||//  \
 *           /  _||||| -:- |||||-  \
 *           |   | \\  -  /// |   |
 *           | \_|  ''\---/''  |   |
 *           \  .-\__  `-`  ___/-. /
 *         ___`. .'  /--.--\  `. . __
 *      ."" '<  `.___\_<|>_/___.'  >'"".
 *     | | :  ` - `.;`\ _ /`;.`/ - ` : | |
 *     \  \ `-.   \_ __\ /__ _/   .-` /  /
 *======`-.____`-.___\_____/___.-`____.-'======
 *                   `=---='
 *——————————————————代码永无BUG —————————————————
 *
 */
namespace Home\Controller;

use Think\Controller;

class OrderController extends Controller
{
    public function buy()
    {
        $total = 0;
        if(IS_POST){
            //获取提交的数据
            $datas = I('post.');
            // dump($datas);exit;
            
            $buy_datas = serialize($datas);
            // dump($buy_datas);exit;
            
            //商品的基本信息展示
            $goods_data =M('goods')->find($datas['goods_id']);
            // dump($goods_data);exit;
            $datas['goods_name'] = $goods_data['goods_name'];
            $datas['goods_mprice'] = $goods_data['goods_mprice'];
            // 商品小计
            $datas['subtotal'] = $datas['number'] * $datas['goods_price'];
            $order_datas[] = $datas;
            // dump($order_datas);exit;
            $total = $datas['subtotal'];
            
        }
        //展示用户收货地址信息展示
        $location_datas = M('location')->where(array('user_id'=>session('uid')))->select();
        // dump($location_datas);die;
        
        //将收货人的信息展示到模板中
        $this->assign('lo_datas',$location_datas);
        //将商品的基本信息以字符串的形式加载到模板中
        $this->assign('buy_datas',$buy_datas);
        //展示总价
        $this->assign('total',$total);
        //将商品的信心展示到模板中
        $this->assign('order_datas',$order_datas);
        $this->display();
    }

    //订单入口操作，将获取的数据保存到订单详情表中，并订单id
    public function add()
    {
        if(IS_POST){
            //实例化模型
            $model = M('order');
            $data =$_POST;
            // dump($data);die;
        
            ////订单基础信息入口
            //create方法会过滤掉数据表中不存在的字段
            $order_data = $model->create($data);
            // dump($order_data);
            $order_data['order_number'] = date('YmdHis').session('uid');
            $order_data['user_id'] = session('uid');
            $order_data['order_addtime'] = time();
            $order_data['order_update'] = time();
            $order_data['order_price'] = $data['total'];
            
            //生成订单号的id
            //订单基本信息表的入库
            $order_id = $model->add($order_data);
            // dump($order_id);die;
            //组装订单商品表的数据
            $goods_order['order_id'] = $order_id;
            $goods_order['user_id'] = session('uid');

            //商品基本信息进行转换
            $goods_datas = unserialize($data['buy_datas']);
            // dump($goods_datas);die;
            $goods_order['og_goods_id'] = $goods_datas['goods_id'];
            $goods_order['og_price'] = $goods_datas['goods_price'];
            $goods_order['og_number'] = $goods_datas['number'];
            $goods_order['og_total_price'] = $goods_datas['number']*$goods_datas['goods_price'];
            $goods_order['og_goods_attr'] = serialize($goods_datas['goods_attr']);
            $res = M('goods_order')->add($goods_order);

            //增加成功跳转到订单详情，并且将订单号传递过去
            $this->redirect('order/orderinfo',array('oid'=>$order_id));

        }
    }

    public function orderinfo()
    {
        //获取订单号
        $oid = I('oid');
        // dump($oid);die;
        
        //获取订单总表信息[当前用户的订单]
        $order_data = M('order')->where(array('user_id' => session('uid') , 'id' => $oid))->find($oid);
        // dump($order_data);die;
        $this->assign('order_data',$order_data);
        $this->display();
    }


//发起支付请求
public function pay()
{
    //获取订单id
    $oid = I('oid');
    //获取订单信息[当前操作用的订单]
    $order_data = M('order')->where('user_id=' . session('uid') , 'and id='.$oid)->find($oid);
    $order_data['title'] = 'PHP商城-商品购买';
    $order_data['body'] = '商城内部购买的商品';

    //引用支付宝使用Vendor
    vendor('alipay.alipay_submit#class');
    $alipay_config = C('PAY_ALIPAY');

    //构造要请求的参数数组，无需改动
    $parameter = array(
            "service"           => $alipay_config['service'],
            "partner"           => $alipay_config['partner'],
            "seller_id"         => $alipay_config['seller_id'],
            "payment_type"      => $alipay_config['payment_type'],
            "notify_url"        => $alipay_config['notify_url'],
            "return_url"        => $alipay_config['return_url'],

            "anti_phishing_key" => $alipay_config['anti_phishing_key'],
            "exter_invoke_ip"   => $alipay_config['exter_invoke_ip'],
            "out_trade_no"      => $order_data['order_number'], //订单编号
            "subject"           => $order_data['title'],
            "total_fee"         => $order_data['order_price'],
            "body"              => $order_data['body'],
            "_input_charset"    => trim(strtolower($alipay_config['input_charset'])),
            //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
            //如"参数名"=>"参数值"

        );
    //建立请求
        $alipaySubmit = new \AlipaySubmit($alipay_config);
        $html_text    = $alipaySubmit->buildRequestForm($parameter, "get", "确认");
        echo $html_text;
    }
}






















