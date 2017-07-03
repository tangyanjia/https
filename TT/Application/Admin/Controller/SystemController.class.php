<?php
/**
 * Created by PhpStorm.
 * User: tyj
 * Date: 2017/6/4
 * Time: 21:19
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

class SystemController extends CommonController
{
    public $menuModel;
    public $roleModel;
    public $accessModel;
    public function __construct()
    {
        parent::__construct();
        $this->roleModel = D('Role');
        $this->menuModel = D('Menu');
        $this->accessModel = D('access');
    }
    /**
     * 菜单列表 MenuList
     */
    //菜单列表
    public function menuList()
    {
        //实例化模型获取所有信息
//        $model = M('Menu');
        $data = $this->menuModel->select();
//        dump($data);exit;
        $newdata = getTree($data);
        $this->assign('data',$newdata);
        $this->display();
    }
    /**
     * 菜单添加 MenuAdd
     */
    //菜单添加
    public function menuAdd()
    {
        if(IS_POST){
            //获取提交的数据
            $data = I('post.');
//            dump($data);exit;
            //实例化模型
//            $model = M('Menu');
            //将获取的数据保存到数据库中
            $res = $this->menuModel->add($data);
            if($res){
                $this->success('操作成功！',U('menulist'));exit;
            }else{
                $this->error('操作失败！');
            }
        }
        $data = $this->menuModel->select();
        $newdata = getTree($data);
        $this->assign('data',$newdata);
//        dump($newdata);exit;
        $this->display();
    }

    //菜单修改
    public function menuEdit()
    {
        //获取传递的ID
        $id = I('id');
//        dump($id);exit;
        //根据id获取表中数据
        $data = $this->menuModel->find($id);
        $this->assign('data',$data);
        if(IS_POST){
            $data = I('post.');
//            dump($data);exit;
            $res = $this->menuModel->save($data);
            if($res){
                $this->success('操作成功！',U('menuList'));exit;
            }else{
                $this->error('操作失败！');
            }
//            dump($data);exit;
        }
        $menu_data = $this->menuModel->select();
        $newdata = getTree($menu_data);
        $this->assign('menu_data',$newdata);
        $this->display();
    }

    //菜单删除
    public function menuDel()
    {
        //获取参数id
        $id = I('id');
        $res = $this->menuModel->delete($id);
        if($res){
            $this->success('操作成功！',U('menu_list'));exit;
        }else{
            $this->error();
        }
    }

    /**
     * 管理员列表
     */
    public function roleList()
    {
        $data = $this->roleModel->select();
        $this->assign('data',$data);
        $this->display();
    }

    /**
     * 管理员添加  roleAdd
     */
    public function roleAdd()
    {
        //获取
        if(IS_POST){
            $data = I('post.');
//            dump($data);exit;
            $res = $this->roleModel->add($data);
            if($res){
                $this->success('操作成功！',U('roleList'));exit;
            }else{
                $this->error('操作失败！');
            }
        }
        $this->display();
    }

    //管理员修改
    public function roleEdit()
    {
        //获取id的值
        $id = I('id');
        //根据传递的id查询数据
        $data = $this->roleModel->find($id);
        $this->assign('data', $data);
        if(IS_POST){
            $data = I('post.');
            $res = $this->roleModel->save($data);
            if($res){
                $this->success('操作成功！',U('roleList'));exit;
            }else{
                $this->error('操作失败！');
            }
        }

//        dump($id);exit;
        $this->display();
    }

    //管理员删除
    public function roleDel()
    {
        echo '这是删除方法';
    }

    /**
     * 管理员的权限管理
     */
    public function accesslist()
    {
        //查询获取菜单表中的所有数据
        $menu_datas = $this->menuModel->select();
        //将菜单数据树状结构化
        $newmenu_datas = list_to_tree($menu_datas);

        //根据返回的id获取角色表中的数据
        $id = I('id');
        $datas = $this->roleModel->find($id);
        
        //默认勾选权限【获取相应角色的权限】
        $access_datas = M('access')->field('menu_id')->where('role_id='.$id)->select();
        //将二维数组转换成一维数组
        //普通方法
        $access_datas = array_column($access_datas, 'menu_id');
        

        //将数据保存到模板
        $this->assign('access_datas',$access_datas);
        $this->assign('datas',$datas);
        $this->assign('menu_datas',$newmenu_datas);
        $this->display();

    }

    //全选分配方法
    public function accessEdit()
    {
        if(IS_POST){
            //获取提交的数据
            $datas = I('post.');

            //重新组装数组
            foreach ($datas['menus'] as $key => $value) {
                $data[$key]['role_id'] = $datas['role_id'];
                $data[$key]['menu_id'] = $value;
            }
//            dump($data);exit;
            //删除角色所有权限然后在来增加,如果不三处
            M('access')->where('role_id=' . $datas['role_id'])->delete();
            $res = $this->accessModel->addAll($data);
            if($res){
                $this->success('操作成功！',U('rolelist'));exit;
            }else{
                $this->error('操作失败！');
            }

        }
    }
}




























































