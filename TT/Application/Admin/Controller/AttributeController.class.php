<?php
/**
 * Created by PhpStorm.
 * User: tyj
 * Date: 2017/6/6
 * Time: 15:35
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
namespace Admin\Controller;

class AttributeController extends CommonController
{

    public $attrModel;

    /**
     * AttributeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->attrModel = D('attribute');
    }

    /**
     * 属性列表
     */
    public function attrList()
    {
        $model = M('attribute');
        $datas = $model->field('a.*,b.cate_name')->alias('a')->join('LEFT JOIN tp_cate AS b ON a.cate_id = b.id')->select();
        $this->assign('attr_datas', $datas);
        $this->display();
    }
    /**
     * 属性添加
     */
    public function attrAdd()
    {
        if (IS_POST) {
        //实例化模型
        $model = M('Attribute');
        $datas = $model->create();
//        dump($datas);exit;
        //将中文逗号切换成英文
        $datas['attr_val'] = str_replace('，', ',', $datas['attr_val']);
        $res               = $model->add($datas);
        if ($res) {
            $this->success('操作成功!', U('attrList'));exit;
        } else {
            $this->error('操作失败!');
        }

        }
        $this->assign('cate_datas', M('cate')->select());
        $this->display();
    }

    /**
     * 属性修改
     */
    public function attrEdit()
    {
        //获取id
        $id = I('id');
        $data = $this->attrModel->find($id);
        $this->assign('data',$data);
        if(IS_POST){
            $datas = I('post.');
            $res = $this->attrModel->save($datas);
            if ($res) {
                $this->success('操作成功!', U('attrList'));exit;
            } else {
                $this->error('操作失败!');
            }
        }
        $this->assign('cate_datas',M('cate')->select());
        $this->display();
    }

    /**
     * 属性删除
     */
    public function attrDel()
    {
        //获取id
        $id = I('id');
        //根据获取的id删除属性
        $res = $this->attrModel->delete($id);
        if ($res) {
            $this->success('操作成功!', U('attrList'));exit;
        } else {
            $this->error('操作失败!');
        }
    }

    /**
     * 接受ajax请求
     */
    public function getArr()
    {
        $id = I('cate_id');
        $data = $this->attrModel->where('cate_id='.$id)->select();
        //返回json数据
        echo json_encode($data);exit;
    }
}












































