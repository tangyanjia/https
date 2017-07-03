<?php
/**
 * Created by PhpStorm.
 * User: tyj
 * Date: 2017/6/5
 * Time: 10:52
 */
namespace Admin\Controller;

class CateController extends CommonController
{
    public $cateModel;
    public function __construct()
    {
        parent::__construct();
        $this->cateModel = D('cate');
    }

    //类型列表
    public function cateList()
    {
        //获取数据中的数据
        $datas = $this->cateModel->select();
        $this->assign('cate_datas',$datas);
        $this->display();
    }

    //类型列表
    public function cateAdd()
    {
        if(IS_POST){
            $data = I('post.');
            $res = $this->cateModel->add($data);
            if($res){
                $this->success('操作成功！',U('catelist'));exit;
            }else{
                $this->error('操作失败！');
            }
        }
        $this->display();
    }
    //类型列表
    public function cateDel()
    {
        //获取id
        $id = I('id');
        //根据id执行删除操作
        $res = $this->cateModel->delete($id);
        if($res){
            $this->success('操作成功！',U('catelist'));exit;
        }else{
            $this->error('操作失败！');
        }
    }
    //类型列表
    public function cateEdit()
    {
        //获取传递的id
        $id = I('id');
        //根据id的值获取对应的数据
        $datas = $this->cateModel->find($id);
        if(IS_POST){
            //获取提交的数据
            $datas = I('post.');
            //写入数据库中
            $res = $this->cateModel->save($datas);
            if($res){
                $this->success('操作成功！',U('catelist'));exit;
            }else{
                $this->error('操作失败！');
            }
        }
        //将获取的数据传给模板
        $this->assign('datas',$datas);
        $this->display();
    }
}















