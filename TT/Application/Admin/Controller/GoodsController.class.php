<?php
/**
 * Created by PhpStorm.
 * User: tyj
 * Date: 2017/5/30
 * Time: 23:50
 */
namespace Admin\Controller;



class GoodsController extends CommonController
{


    public function goods_list()
    {
        $model = M('goods');
        /*
         *  1.获取表的总记录数，count();
         *  2.实例化分页方法 【初始化总记录数，每页显示格式】
         *  3.根据页面获取相应的数据，limit(起始位置，每页显示的个数); 【firstRow,listRows】
         *  4.展示页码信息
         *  5.展示分页数据
         */
        $count = $model->count();
        //实例化分页方法
        $page = new \Think\Page($count,5);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        //展示页码信息
        $pages = $page->show();
        //将页码信息加载到模板中
        $this->assign('pages', $pages);
        //
        //分类信息即品牌
        $brand_model = M('brand');
        //1.使用循环的方式商品品牌数据的获取
//        foreach ($data as $key => $value) {
//            $brand_data = $brand_model->find($value['brand_id']);
//            $data[$key]['brand_name'] = $brand_data['brand_name'];
//        }
        //2.使用table的方法获取商品的数据
//        $data = $model->field('a.*,b.brand_name')->table('tp_goods a,tp_brand b')->where(array('a.brand_id=b.id', 'a.goods_status=1'))->limit($page->firstRow.','.$page->listRows)->select();
//        echo $model->_sql();exit;

        $data = $model->order('id desc')->field('a.*,b.brand_name')->alias('a')->join('left join tp_brand b on a.brand_id = b.id')->limit($page->firstRow.','.$page->listRows)->select();
//        echo $model->_sql();exit;
        $this->assign('data', $data);
        $this->display();
    }

    //添加商品
        public function goods_add()
    {

        //首先判断是否POST提交数据
        if (IS_POST) {
            //接受数据
            $data = I('post.');
//            dump($data);exit;
            #上传缩略图和大图
            #判断是否上传
            /**
             * 上传单张图片的方法
             */
            if($_FILES['goods_image']['name']!=''){
                #调用公公上传文件的方法,上传文件到Uploads文件夹下
                $info = uploadPic();
                #实例化缩略图和大图
                $images = new \Think\Image();
                #打开要缩略的图片
                $images->open(UPLOAD.$info['goods_image']['savepath'].$info['goods_image']['savename']);
                #进行图片的裁剪，生成缩略图
                $images->thumb(100,100)->save(UPLOAD.$info['goods_image']['savepath'].'thumb_'.$info['goods_image']['savename']);
                #将上传参数，将文件保存的路径放入表中
                $data['goods_bigpic'] = $info['goods_image']['savepath'].$info['goods_image']['savename'];
                $data['goods_smallpic'] = $info['goods_image']['savepath'].'thumb_'.$info['goods_image']['savename'];
            }
            //将数据写入到数据库中
            $data['goods_description'] = htmlPurifier($data['goods_description']);
            $model = M('goods');
            //增加操作
            $res = $model->add($data);
            if ($res) {
                //商品的ID

                foreach ($data['goods_attr'] as $key => $value) {
                    $attr_datas[] = array(
                        'goods_id'       => $res,
                        'attr_id'        => $key,
                        'goods_attr_val' => implode(',', $value),
                    );

                }
                M('goodsattr')->addAll($attr_datas);

                $this->success('操作成功!', U('goods_list'));exit;
            } else {
                $this->error('操作失败!');
            }
        }

        //品牌数据查询
        $brand_data = D('brand')->getList();
        $this->assign('brand_data', $brand_data);
        //添加商品类型，获取所有类型名
        $this->assign('cate_data',M('cate')->select());
        $this->display();
    }

    //修改商品
    public function goods_edit()
    {
        //获取品牌信息
        $brand_data = D('Brand')->getList();
        $this->assign('brand_data', $brand_data);
        //获取商品详细
        $id = I('id');
        $this->assign('data', M('Goods')->find($id));
        if (IS_POST) {
            $data = $_POST;
            //             1.首先要确定文件能接受到
            // dump($_FILES);exit;
            // 2.判断用户是否上传文件
            if ($_FILES['goods_image']['name'] != '') {

                $info = uploadPic();
                //实例化缩略图类
                $images = new \Think\Image();
                //打开要缩略的图片
                //open D:/itcast/php9/tp_shop/Uploads/2017-06-02/5930d34b4e8eb.jpg
                $images->open(UPLOAD . $info['goods_image']['savepath'] . $info['goods_image']['savename']);
                //进行图片的裁剪
                //save D:/itcast/php9/tp_shop/Uploads/2017-06-02/thumb_5930d34b4e8eb.jpg
                $images->thumb(100, 100)->save(UPLOAD . $info['goods_image']['savepath'] . 'thumb_' . $info['goods_image']['savename']);
                //上传代码里面
                // 3.如果用户上传图片，实例化上传图片类，实现图片上传
                // 4.接受上传参数，最终将文件储存路径放表中
                $data['goods_bigpic']   = $info['goods_image']['savepath'] . $info['goods_image']['savename'];
                $data['goods_smallpic'] = $info['goods_image']['savepath'] . 'thumb_' . $info['goods_image']['savename'];

            }

            //将数据写入到数据库中
            $data['goods_description'] = htmlPurifier($data['goods_description']);

            $model = M('goods');
            $res   = $model->save($data);
            if ($res) {
                $this->success('操作成功!', U('goods_list'));exit;
            } else {
                $this->error('操作失败!');
            }

        }
        $this->display();
    }





    /**
     * 商品下架操作
     */
    public function del()
    {
        #获取接受的参数
        $id = I('id');
        #实例化模型类
        $model = M('goods');
        #获取制定id的数据
        $res = $model->find($id);
        $msg = '';
//        dump($res);exit;
        if($res['goods_status']==1){
            $data['goods_status']=0;
            $msg = '上架';
        }else{
            $data['goods_status']=1;
            $msg = '下架';
        }
        $data['id'] = $id;
        $res = $model->save($data);

        if($res){
            $this->success($msg);
        }else{
            $this->error('操作失败！');
        }
    }

    /**
     * 相册管理
     */
    public function pic()
    {
        #获取参数ID
        $id = I('id');

        if($_FILES['image']['name'][0]!=''){
            #上传文件
            $info = uploadPic();
//            dump($info);exit;
            #实例化缩略图类
            $images = new \Think\Image();
            #多图上传使用foreach循环
            foreach ($info as $keys => $value) {
                #打开要上传的图片
                $images->open(UPLOAD.$value['savepath'].$value['savename']);
                #处理图片
                $images->thumb(100,100)->save(UPLOAD.$value['savepath'].'thumb_'.$value['savename']);
                #获取大图的路径
                $data[$keys]['pic_big'] = $value['savepath'].$value['savename'];
                #获取缩略图的路径
                $data[$keys]['pic_small'] = $value['savepath'].'thumb_'.$value['savename'];
                #获取对应商品的id
                $data[$keys]['goods_id'] = $id;
            }
//            dump($data);exit;
            #上传多张图片使用addAll()方法
            $model = M('pic');
            $res = $model->addAll($data);
            if($res){
                $this->success('操作成功！',U('pic','id='.$id));exit;
            }else{
                $this->error('操作失败！');exit;
            }
        }
        #根据传递的id查询对应的所有图片
        $model = M('pic');
        $data = $model->where('goods_id='.$id)->select();
        $this->assign('data',$data);
        $this->display();
    }

    /**
     * 点击删除，删除该条记录
     * 并且删除Uploads文件夹下的图片
     */
    public function delPic()
    {
        #获取传递的id
        $id = I('id');
        #实例化模型
        $model = M('pic');
        #查询对应id的记录
        $data = $model->find($id);
        #删除对应id的记录
        $res = $model->delete($id);
        #判断是否删除成功
        if($res){
            unlink(UPLOAD.$data['pic_big']);
            unlink(UPLOAD.$data['pic_small']);
            $this->success('操作成功！');
        }else{
            $this->error('操作失败！');
        }

    }
























}