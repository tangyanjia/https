<?php
/**
 *
 * @authors 大漠落日 (liumeng1@itcast.cn)
 * @date    2017-06-08 10:52:14
 * @url     http://www.itcast.cn
 * @desc    购物车控制器
 *
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

class CartController extends Controller
{

    //增加方法
    public function add()
    {
        $data = I('post.');
        // $num = $data['number']*1;
       // dump($num);die;
        //判断是否登陆
        if(session('?uid')){
            //将获取的数据保存到session中去
            $data['goods_attr'] = json_encode($data['goods_attr']);
            $data['user_id'] = session('uid');
            $model = M('cart');
            $where = array('goods_id'=>$data['goods_id'],'user_id'=>session('uid'));
            $cart_datas = $model->where($where)->find();
            //判断该用户下的该商品是否存在
            if($cart_datas){
                //存在number自动增加
                $model->where($where)->setInc('number', $data['number']);
            }else{
                $model->add($data);
            }

        }else{
            //判断cookie中是否有数据
            if(cookie('goods_cart')){
                //获取已有的cookie数据，并反序列化为数组
                $cookie_str = cookie('goods_cart');
                $datas = unserialize($cookie_str);
                if($datas[$data['goods_id']]){
                    $datas[$data['goods_id']]['number'] += $data['number'];
                }else{
                    //将数据保存到数组里
                    $datas[$data['goods_id']] = $data;
                }
            }else{
                //将数据保存到数组里
                $datas[$data['goods_id']] = $data;
            }
            //将数组序列化，将数据存到cookie中
            $cart_str = serialize($datas);
            cookie('goods_cart',$cart_str);
        }
        $this->redirect('showlist');
    }
    //购物车展示
    public function showList()
    {
        //判断用户是否登陆
        if(session('?uid')){
            $cart_datas = M('cart')->where('user_id=' . session('uid'))->select();
           // dump($cart_datas);exit;
            //获取通过goods_id 商品表的数据 将表中的数据遍历出来
            foreach ($cart_datas as $key => $value) {
                $goods_data = M('goods')->find($value['goods_id']);
                $cart_datas[$key]['goods_name']     = $goods_data['goods_name'];
                $cart_datas[$key]['goods_mprice']   = $goods_data['goods_mprice'];
                $cart_datas[$key]['goods_smallpic'] = $goods_data['goods_smallpic'];
                $cart_datas[$key]['subtotal']       = $value['number'] * $value['goods_price'];
                $cart_datas[$key]['goods_attr']     = json_decode($value['goods_attr'], true);//这里的true表示转换为数组形式
//          dump($cart_datas);exit;
            }
//           dump($cart_datas);exit;
        }else{
            //获取cookie中的数据
            $cart_str = cookie('goods_cart');
            //将字符串转换成数组
            $cart_datas = unserialize($cart_str);
//            dump($cart_datas);exit;
            //数据获取
            foreach ($cart_datas as $key => $value) {
                $goods_data                         = M('goods')->find($key);
                $cart_datas[$key]['goods_name']     = $goods_data['goods_name'];
                $cart_datas[$key]['goods_mprice']   = $goods_data['goods_mprice'];
                $cart_datas[$key]['goods_smallpic'] = $goods_data['goods_smallpic'];
                $cart_datas[$key]['subtotal']       = $value['number'] * $value['goods_price'];
            }
        }
        $this->assign('cart_datas', $cart_datas);
            $this->display();
    }
    /**
     * 删除购物车列表中的商品
     */
    public function del()
    {
        //接受数据
        $goods_id = I('goods_id');
        if(session('?uid')){
            //已登陆
            $where = array('goods_id' => $goods_id, 'user_id' => session('uid'));
            M('cart')->where($where)->delete();
            $this->success('删除成功!');
        }else{
            //未登录，操作cookie中的数据
            //获取所有cookie数据
            $cookie_str = cookie('goods_cart');
            $cart_datas = unserialize($cookie_str);
            unset($cart_datas[$goods_id]);
            //序列化，保存到cookie中去
            $cookie_str = serialize($cart_datas);
            cookie('goods_cart',$cookie_str);
            $this->success('操作成功！');
        }
    }

    /**
     * 修改购物车
     * 这种修改是直接修改数据库，cart表中的数据，即用户已登陆状态
     */
    public function edit()
    {
        //获取传递的参数
        $goods_id = I('goods_id');
        $number = I('number');
        //判断用户是否登录
        if (session('?uid')) {
            //实例化模型
            $model = M('cart');
            //修改当前用户下购物车中的商品
            $model->where('goods_id=' . $goods_id . ' and user_id=' . session('uid'))->save(array('number' => $number));
        } else {
            //cookie中的数据进行修改
            $cart_str = cookie('goods_cart');
            //转换成数组
            $cart_data = unserialize($cart_str);
            $cart_data[$goods_id]['number'] = $number;
            cookie('goods_cart', serialize($cart_data));
        }
    }
}