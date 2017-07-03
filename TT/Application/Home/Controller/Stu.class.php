<?php
/**
 * Created by PhpStorm.
 * User: tyj
 * Date: 2017/5/26
 * Time: 14:30
 */

namespace Home\Controller;


class Stu
{
    public function test(){
        $stu = new \Home\Controller\Stu();
        $stu->username = '妖猴';
        $this->assign('Stu',$stu);
        $this->display('test1');
    }
}