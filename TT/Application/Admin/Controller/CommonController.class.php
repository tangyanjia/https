<?php
/**
 * d
 * @authors 大漠落日 (liumeng1@itcast.cn)
 * @date    2017-06-04 10:38:01
 * @url     http://www.itcast.cn
 * @desc    公共的权限控制器
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
namespace Admin\Controller;

use Think\Controller;

class CommonController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!session('?username')) {
            $this->error('请登陆后在操作!', U('login/login'));
        }

        if (session('username') != 'admin') {
            //权限用户防止翻墙
            $controller = CONTROLLER_NAME;
            $action     = ACTION_NAME;
            //获取当前用户所有的权限
            //         SELECT
            // a.role_id,
            // a.menu_id,
            // b.id,
            // b.menu_name,
            // b.menu_controller,
            // b.menu_action,
            // b.pid,
            // b.is_show
            // FROM
            // tp_access AS a
            // LEFT JOIN tp_menu AS b ON a.menu_id = b.id where a.role_id=2
            $datas = M('access')->alias('a')->join('LEFT JOIN tp_menu AS b ON a.menu_id = b.id')->where(array('a.role_id' => session('rid'), 'b.pid' => array('neq', 0)))->select();
            //当前用户访问的地址
            $access_url = strtolower($controller . $action);

            foreach ($datas as $key => $value) {
                //防止有大小写区分，全部转换成小写
                $access_arr[] = strtolower($value['menu_controller'] . $value['menu_action']);
            }
            if (!in_array($access_url, $access_arr)) {
                $this->error('没有权限访问!');exit;
            }
        }

        //将所有的权限提取出来组合成新的数组

    }

}
