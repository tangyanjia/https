<?php
namespace Admin\Controller;


class IndexController extends CommonController
{
    public function index(){
//        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $this->display();
    }
    public function head()
    {
        $this->display();
    }
    public function left()
    {
        //         SELECT
        // a.menu_id,
        // b.id,
        // b.menu_name,
        // b.menu_controller,
        // b.menu_action,
        // b.is_show,
        // b.menu_sort,
        // b.pid
        // FROM
        // tp_access AS a
        // LEFT JOIN tp_menu AS b ON a.menu_id = b.id where a.role_id=1
        //实例化模型
        $model = M('access');
        $menu_data = $model->alias('a')->join('LEFT JOIN tp_menu AS b ON a.menu_id = b.id')->where(array('a.role_id'=>session('rid'),'is_show'=>1))->select();
        //生成树状结构
        $menu_data = list_to_tree($menu_data);
        $this->assign('menu_data',$menu_data);
        $this->display();
    }
    public function right()
    {
        $this->display();
    }
    public function logout(){
        $this->redirect('Login/login');
    }


}