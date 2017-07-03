<?php
/**
 * Created by PhpStorm.
 * User: tyj
 * Date: 2017/5/25
 * Time: 19:51
 */
namespace Admin\Controller;

use Think\Controller;
class LoginController extends Controller
{
   public function login()
   {
       //验证用户输入信息是否正确
       if(IS_POST){
           //获取用户输入的数据
           $data = I('post.');
           //验证验证码
           //实例验证码
           $verify = new \Think\Verify();
           //使用check方法来验证用户输入的验证码是否正确
           if($verify->check($data['captcha'])) {
                //验证用户
               //实例化模型
               $user = M('Admin');
               //查询用户操作
               //使用这种方法容易被sql注入
               //$data = $user->where("username='".$data['admin_user']."' and password=".$data['admin_psd'])->find();
               //使用数组的形式传递参数
               $data = $user->where(array('username' => $data['admin_user'], 'password' =>md5($data['admin_psd'])))->find();
//               dump($data);
//               dump($user->_sql) ;exit;
               //判断用户是否存在
               if ($data) {
                    //将用户的信息保存到session中去
                   session('uid', $data['id']);
                   session('username', $data['username']);
                   session('rid', $data['role_id']);
                   $this->success('用户登陆成功!', U('index/index'));exit;
               }else{
                   $this->error('用户名或者密码错误！');
               }
           }else{
               $this->error('验证码输入有误');
           }
       }
       $this->display();

   }
   //获取验证码
    public function verifyImage()
    {
       $config = array(
       'useCurve'  =>  false,            // 是否画混淆曲线
       'useNoise'  =>  false,            // 是否添加杂点
       'useZh'     =>  false,
       'fontSize'  =>  15,
        'imageH'    =>  30,               // 验证码图片高度
        'imageW'    =>  100,               // 验证码图片宽度
        'length'    =>  2,
        'fontttf'=> '4.ttf',
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    #退出系统
    public function logout()
    {
        session(null);
        if(!session('?username')){
            $this->success('退出成功！',U('login/login'));
        }
    }

}































