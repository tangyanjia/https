<?php
/**
* Created by PhpStorm.
 * User: tyj
* Date: 2017/5/30
* Time: 15:50
*/
namespace Admin\Model;
use Think\Model;

class BrandModel extends Model
{
    protected $_validate = array (
        array('brand_name','require','不能为空的熊得！' ),
    );
    protected $_map = array (
        'name' => 'brand_name',
    );

    //获取品牌列表信息
    public function getList()
    {
        //品牌数据查询
        //实例化模型不是使用M() = $this
        $brand_data = $this->where('brand_status=1')->select();
        return $brand_data;
    }
}