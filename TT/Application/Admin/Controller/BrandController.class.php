<?php
namespace Admin\Controller;


class BrandController extends CommonController
{
        //品牌列表
        public function showList()
        {
            //实例化模型
            $model = D('brand');
//            var_dump($model);exit;
//            $model = M('Brand');
            $model->order('id asc');
//            //执行查询
            $datas = $model->where('brand_status=1')->select();
            //模板变量赋值
            $this->assign('datas', $datas);
            $this->display();
        }
        //增加品牌
        public function add()
        {
            $this->display();
        }
        public function addok()
        {
            //获取用户写入的数据($_POST)
            //获取用户写入的数据
//            $data = I('post.');
            //实例化模型
            $model = D('Brand');
            $data = $model->create();
            if(!$data){
                $this->error($model->getError());
            }
            //执行写入操作
            $res = $model->add($data);
    //        var_dump($res);exit;
            if ($res){
                $this->success('添加成功！',U('showlist'));
            }else{
                $this->error('添加失败！');
            }
        }
    //修改品牌
    public function edit()
    {
        //获取要修改的数据【ID】
        $id = I('id');
//        echo $id;exit;
        //实例化模型
        $model = M('brand');
        //查找数据
        $data = $model->find($id);
//        dump($data);exit;
        //将数据加载到模板中
        if(IS_POST){
            $datas = I('post.');
//        var_dump($datas);exit;
            //获取要修改的数据的ID
//        $id = I('id');
            //实例化模型
            $model = M('brand');
            $res = $model->save($datas);
//        dump($res);exit;
            if($res){
                $this->success('修改成功！',U('showlist'));exit;
            }else{
                $this->error('修改失败！');
            }
        }
        $this->assign('data', $data);
        $this->display();
    }
    public function delete()
    {
        $id = I('id');
        //实例化模型
        $model = M('brand');
        //执行语句
        //物理删除
//        $res = $model->delete($id);
//        dump($res);exit;
        //逻辑删除
        $arr['id'] = $id;
        $arr['brand_status'] = 0;
        $res = $model->save($arr);
//        dump($res);exit;
        if($res){
            $this->success('删除成功！',U('showlist'));
        }else{
            $this->error('删除失败');
        }
    }






















}