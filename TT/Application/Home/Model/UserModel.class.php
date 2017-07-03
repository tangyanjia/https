<?php
/**
 * Created by PhpStorm.
 * User: tyj
 * Date: 2017/6/8
 * Time: 19:20
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
namespace Home\Model;

use Think\Model;

class UserModel extends Model
{
    //自动验证方法
    protected $_validate = array (
        array('user_name','require','用户名不能为空！',),
        array('user_pwd','require','密码不能为空！'),
        array('user_pwd2','user_pwd','确认密码不正确！',0,'confirm'),

    );


    //数据库写入之间调用的方法
    protected function _before_insert(&$datas, $options)
    {
        //写过程代码
        $datas['user_addtime'] = time();
        $datas['user_pwd']     = md5($datas['user_pwd']);
    }
}








































