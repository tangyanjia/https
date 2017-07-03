<?php 
namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{
	/**
	 * 用户注册方法
	 * @return [type] [description]
	 */
	public function reg()
	{
        //用户是否否提交数据
        if(IS_POST){
            //实例化模型
            $model = D('user');
            $datas = $model->create();
            
//            dump($datas);exit;
            if(!$datas){
                $this->error($model->getError());
            }
            //写入数据到数据库中
            $res = $model->add($datas);
            if($res){
                $this->success('操作成功！',U('login'));exit;
            }else{
                $this->error('操作失败！');
            }
        }
		$this->display();
	}

    /**
     * 用户登陆
     */
	public function login()
    {
        //获取SERVER数据
//        dump($_SERVER);exit;
//        dump(session());exit;
        //判断用户是否提交数据
        if(IS_POST){
            $datas = I('post.');
//            dump($datas);exit;
            //实例化模型
            $model = M('user');
            $data = $model->where(array('user_name'=>$datas['username'],'user_pwd'=>md5($datas['password'])))->find();
//            dump($data);exit;
            //判断接受的数据是否正确
            if($data){
                //成功使用session保存信息
                session('uid',$data['id']);
                session('user_name',$data['user_name']);
                session('user_pwd',$data['user_pwd']);
                $this->success('操作成功！',U('index/index'));exit;
            }else{
                $this->error('操作失败！');
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
            'useZh'     =>  false,             //是否中文验证码
            'fontSize'  =>  10,
            'imageH'    =>  30,               // 验证码图片高度
            'imageW'    =>  100,               // 验证码图片宽度
            'length'    =>  2,                  //验证码长度
            'fontttf'=> '4.ttf',                //字体
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    #退出系统
    public function logout()
    {
        session(null);
        if(!session('?uid')){
            $this->success('退出成功！',U('login/login'));
        }
    }
}
