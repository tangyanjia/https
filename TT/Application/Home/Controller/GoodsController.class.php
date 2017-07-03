<?php
/**
 * Created by PhpStorm.
 * User: tyj
 * Date: 2017/6/2
 * Time: 0:17
 */
namespace Home\Controller;

use Think\Controller;

class GoodsController extends Controller
{
    //商品搜索列表
    public function cateList()
    {
         //获取传递的餐宿
        $brand_id = !empty(I('brand_id')) ? I('brand_id') : 0;
        //价格获取
        $price = !empty(I('price')) ? I('price') : 0;
        //price 获取的值 200-2000 要将其拆分
        $price_arr = explode('-', $price);

        $where = ' goods_status=1';
        if ($brand_id) {
            $where .= ' and brand_id=' . $brand_id;
        }
        if ($price) {
            $where .= ' and goods_price>' . $price_arr[0] . ' and goods_price<' . $price_arr[1];
        }

        //获取商品信息
        $datas = M('goods')->where($where)->select();
        $this->assign('goods_datas', $datas);
        //获取搜索条件中的品牌
        $brand_datas = M('brand')->select();
        $this->assign('brand_id', $brand_id);
        // 价格数据获取
        $this->assign('price_datas', getPrice());
        //价格参数展示在模板中
        $this->assign('price', $price);
        $this->assign('brand_datas', $brand_datas);
        $this->display();
    }
	//详情页
    public function detail()
    {
        //获取传递的id
        $id = I('id');
        //输出点击的商品id
//        dump($id);exit;

        //开启ob缓存
        ob_start();
        if (file_exists('./goods_detail_'.$id . '.html') && filemtime('./goods_detail_'.$id . '.html') + 3600 > time()){
            require './goods_detail_'.$id . '.html';
        }else{
                //实现商品点击次数的增加
                $model = M('goods');
                $model->where('id='.$id)->setInc('goods_click',1);

                //原生的sql语句在做项目中不要使用
                $datas = M('goods')->field('a.*,b.brand_name')->alias('a')->join('left join tp_brand as b on a.brand_id=b.id')->where('a.id='.$id)->find();
    //        $datas = M('goodsView')->find($id);
    //        dump($datas);exit;
                //echo M('goods')->_sql();exit;


                //excute 方法增加sql语句
    //        $res = M()->execute('UPDATE `tp_goods` set goods_click=goods_click+1 where id=1;');
    //        dump($res);exit;


                //获取商品属性展示
                $goods_attr = M()->query('select b.attr_name,b.attr_type,a.id,a.goods_id,a.attr_id,a.goods_attr_val from tp_goodsattr AS a left join tp_attribute as b on a.attr_id = b.id where b.attr_type = 1 and a.goods_id =' . $id);
    //         dump($goods_attr);exit;
                foreach ($goods_attr as $key => $value){
                    $goods_attr[$key]['goods_attr_val'] = explode(',',$value['goods_attr_val']);
                }
                // dump($goods_attr);exit;
                $this->assign('goods_attr',$goods_attr);
                //商品相册展示
                $datas_pic = M('pic')->where('goods_id=' . $id)->select();
    //        dump($datas_pic);exit;
                //将链表查询的数据展示到模板中
                $this->assign('datas_pic',$datas_pic);
                $this->assign('datas', $datas);
                $this->display();
    //         $html = $this->fetch();
    //         echo $html;
                $content = ob_get_contents();
                ob_end_clean();
    //         echo $content;
                file_put_contents('./goods_detail_'.$id . '.html',$content);
            }
        }



}