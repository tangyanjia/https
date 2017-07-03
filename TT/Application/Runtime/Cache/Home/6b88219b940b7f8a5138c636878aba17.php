<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="Generator" content="YONGDA v1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="Keywords" content="YONGDA商城" />
        <meta name="Description" content="YONGDA商城" />
        
        <title>YONGDA商城 - Powered by YongDa</title>
        
        <link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
        <style>

        </style>
       
    </head>
    <body class="index_body">
       
        <div class="block clearfix" style="position: relative; height: 98px;">
            <a href="#" name="top"><img class="logo" src="/Public/Home/images/logo.gif"></a>

            <div id="topNav" class="clearfix">
                <div style="float: left;">
                    <?php if(session('?uid')): ?><font id="ECS_MEMBERZONE">
                            <div id="append_parent"></div>

                            <font class="f4_b"><?php echo (session('user_name')); ?></font>, 欢迎您回来！
                            <a href="#">用户中心</a>
                            <a href="<?php echo U('login/logout');?>">退出</a>

                        </font>
                        <?php else: ?>
                        <font id="ECS_MEMBERZONE">

                            <div id="append_parent"></div>
                            欢迎光临本店&nbsp;
                            <a href="<?php echo U('Login/login');?>"> 登录</a>
                            <a href="<?php echo U('Login/reg');?>">注册</a>


                        </font><?php endif; ?>
                </div>
                <div style="float: right;">
                    <a href="#">查看购物车</a>
                    |
                    <a href="#">选购中心</a>
                    |
                    <a href="#">标签云</a>
                    |
                    <a href="#">报价单</a>
                </div>
            </div>
            <div id="mainNav" class="clearfix">
                <a href="<?php echo U('index/index');?>" class="cur">首页<span></span></a>
                <a href="<?php echo U('goods/catelist');?>">GSM手机<span></span></a>
                <a href="#">双模手机<span></span></a>
                <a href="#">手机配件<span></span></a>
                <a href="#">优惠活动<span></span></a>
                <a href="#">留言板<span></span></a>
            </div>
        </div>

        <div class="header_bg">
            <div style="float: left; font-size: 14px; color:white; padding-left: 15px;">
            </div>  

            <form id="searchForm" method="get" action="#">
                <input name="keywords" id="keyword" type="text" />
                <input name="imageField" value=" " class="go" style="cursor: pointer; background: url('/Public/Home/images/sousuo.gif') no-repeat scroll 0% 0% transparent; width: 39px; height: 20px; border: medium none; float: left; margin-right: 15px; vertical-align: middle;" type="submit" />

            </form>
        </div>
        <div class="blank5"></div>
        <div class="header_bg_b">
            <div class="f_l" style="padding-left: 10px;">
                <img src="/Public/Home//images/biao6.gif" />
                    北京市区，现在下单(截至次日00:30已出库)，<b>明天上午(9-14点)</b>送达 <b>免运费火热进行中！</b>
            </div>
            <div class="f_r" style="padding-right: 10px;">
                <img style="vertical-align: middle;" src="/Public/Home//images/biao3.gif">
                    <span class="cart" id="ECS_CARTINFO">
                        <a href="#" title="查看购物车">您的购物车中有 0 件商品，总计金额 ￥0.00元。</a></span>
                    <a href="#"><img style="vertical-align: middle;" src="/Public/Home//images/biao7.gif"></a>

            </div>
        </div>






<link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    table {border:1px solid #dddddd; border-collapse: collapse; width:99%; margin:auto;}
    td {border:1px solid #dddddd;}
    #consignee_addr {width:450px;}
</style>
<div class="block box">
    <div class="blank"></div>
    <div id="ur_here">
        当前位置: <a href="#">首页</a> <code>&gt;</code> 购物流程
    </div>
</div>
<div class="blank"></div>

<div class="blank"></div>
<div class="block">
    <div class="flowBox">
        <h6><span>商品列表</span></h6>
        <form id="formCart">
            <table cellpadding="5" cellspacing="1">
                <tbody><tr>
                        <th>商品名称</th>
                        <th>属性</th>
                        <th>市场价</th>
                        <th>本店价</th>
                        <th>购买数量</th>
                        <th>小计</th>
                        <th>操作</th>
                    </tr>
                <?php if(is_array($cart_datas)): foreach($cart_datas as $key=>$d): ?><tr>
                        <td align="center">
                            <a href="<?php echo U('goods/catelist');?>" target="_blank"><img style="width: 80px; height: 80px;" src="/Uploads/<?php echo ($d["goods_smallpic"]); ?>" title="P806" /></a><br />
                            <a href="<?php echo U('goods/catelist');?>" target="_blank" class="f6"><?php echo ($d["goods_name"]); ?></a>
                        </td>

                        <td>
                            <?php if(is_array($d[goods_attr])): foreach($d[goods_attr] as $k=>$dd): echo ($k); ?>:<?php echo ($dd); ?><br /><?php endforeach; endif; ?>
                        </td>

                        <td align="center">￥<?php echo ($d["goods_mprice"]); ?>元</td>
                        <td align="center" >￥<span class="goods_price"><?php echo ($d["goods_price"]); ?></span>元</td>
                        <td align="center">
                            [<a href="javascript:;" class="num_cut" data_id="{d.goods_id}"> - </a>]<input name="number" id="goods_number" value="<?php echo ($d["number"]); ?>" size="4" style="text-align: center;" />
                            [<a href="javascript:;" class="num_add" data_id="{d.goods_id}"> + </a>]
                        </td>
                        <td align="center">￥<sapn class="subtotal"><?php echo ($d["subtotal"]); ?></sapn>元</td>
                        <td align="center">
                            <a href="javascript:;" data_id="<?php echo ($d["goods_id"]); ?>" class="cart_del">删除</a>
                        </td>
                    </tr><?php endforeach; endif; ?>
                </tbody></table>

            <table cellpadding="5" cellspacing="1">
                <tbody><tr>
                        <td>
                            总计 ￥<span id="totalprice">0</span>元              </td>
                    <!--，比市场价 ￥2400.00元 节省了 ￥400.00元 (17%)-->
                        <td align="right">
                            <input value="清空购物车" class="bnt_blue_1"  type="button" />
                            <input name="submit" class="bnt_blue_1" value="更新购物车" type="submit" />
                        </td>
                    </tr>
                </tbody></table>
            <script src="/Public/Home/js/jquery-1.11.1.js"></script>
            <script type="text/javascript">
                $(function(){
                    $('.cart_del').click(function(){
                        //获取点击商品的id
                        _this = $(this);
                        goods_id = _this.attr('data_id');
                        //发送ajax请求
                        $.post('/index.php/Home/Cart/del',{'goods_id':goods_id},function(data){
                            if(data.status == 1){
                                _this.parents('tr').remove();
                            }
                        },'json');
                    });

                    //增加事件
                    $('.num_add').click(function(){
                        _this = $(this);
                        val = _this.prev('input').val();
                        val ++;
                        _this.prev('input').val(val);
                        //获取商品的id,传递数据，修改数据库中的信息
                        goods_id = _this.attr('data_id');
                        $.post('/index.php/Home/Cart/edit',{'goods_id':goods_id,'number':val});
//                        //获取小计
//                        price = _this.parents('tr').find('.goods_price').text();
//                        subtotal = val*price;
//                        _this.parents('tr').find('.subtotal').text(subtotal);
//                        //获取总价 totalprice 需要将所有小计遍历出来each
//                        var totalprice = 0;
//                        $('.subtotal').each(function(){
//                            subprice = $(this).text();
//                            totalprice += parseInt(subprice);
//                        });
//                        $('#totalprice').html(totalprice);
                        get_subtotal($(this),val);
                        get_total();
                    });



                    //减少事件
                    $('.num_cut').click(function(){
                        _this = $(this);
                        val = _this.next('input').val();
                        //获取商品的id,传递数据，修改数据库中的信息
                        goods_id = _this.attr('data_id');
                        if(val > 1){
                            val --;
                            _this.next('input').val(val);
                            $.post('/index.php/Home/Cart/edit',{'goods_id':goods_id,'number':val});
//                            //获取小计
//                            price = _this.parents('tr').find('.goods_price').text();
//                            subtotal = val*price;
//                            _this.parents('tr').find('.subtotal').text(subtotal);
//                            //获取总价 totalprice 需要将所有小计遍历出来each
//                            var totalprice = 0;
//                            $('.subtotal').each(function(){
//                                subprice = $(this).text();
//                                totalprice += parseInt(subprice);
//                            });
//                            $('#totalprice').html(totalprice);
                            get_subtotal($(this),val);
                            get_total();
                        }
                    });
                    //小计方法
                    function get_subtotal(obj,val){
                        //获取小计
                        price = obj.parents('tr').find('.goods_price').text();
                        subtotal = val*price;
                        obj.parents('tr').find('.subtotal').text(subtotal);
                    }
                    //总价
                    function get_total(){
                        //获取总价 totalprice 需要将所有小计遍历出来each
                        var totalprice = 0;
                        $('.subtotal').each(function(){
                            subprice = $(this).text();
                            totalprice += parseInt(subprice);
                        });
                        $('#totalprice').html(totalprice);
                    }

                });
            </script>
            <input name="step" value="update_cart" type="hidden" />
        </form>
        <table cellpadding="5" cellspacing="0" width="99%">
            <tbody><tr>
                    <td><a href="#"><img src="/Public/Home/images/continue.gif" alt="continue" /></a></td>
                    <td align="right"><a href="#"><img src="/Public/Home/images/checkout.gif" alt="checkout" /></a></td>
                </tr>
            </tbody></table>
    </div>
    <div class="blank"></div>
    <div class="blank5"></div>
</div>





        
        <div class="block">
            <a href="#" target="_blank" title="YONGDA商城"><img alt="YONGDA商城" src="/Public/Home/images/di.jpg"></a>
            <div class="blank"></div>
        </div>
        <div class="block">
            <div class="box">
                <div class="helpTitBg" style="clear: both;">
                    <dl>
                        <dt><a href="#" title="新手上路 ">新手上路 </a></dt>
                        <dd><a href="#" title="售后流程">售后流程</a></dd>
                        <dd><a href="#" title="购物流程">购物流程</a></dd>
                        <dd><a href="#" title="订购方式">订购方式</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="#" title="手机常识 ">手机常识 </a></dt>
                        <dd><a href="#" title="如何分辨原装电池">如何分辨原装电池</a></dd>
                        <dd><a href="#" title="如何分辨水货手机 ">如何分辨水货手机</a></dd>
                        <dd><a href="#" title="如何享受全国联保">如何享受全国联保</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="#" title="配送与支付 ">配送与支付 </a></dt>
                        <dd><a href="#" title="货到付款区域">货到付款区域</a></dd>
                        <dd><a href="#" title="配送支付智能查询 ">配送支付智能查询</a></dd>
                        <dd><a href="#" title="支付方式说明">支付方式说明</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="#" title="会员中心">会员中心</a></dt>
                        <dd><a href="#" title="资金管理">资金管理</a></dd>
                        <dd><a href="#" title="我的收藏">我的收藏</a></dd>
                        <dd><a href="#" title="我的订单">我的订单</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="#" title="服务保证 ">服务保证 </a></dt>
                        <dd><a href="#" title="退换货原则">退换货原则</a></dd>
                        <dd><a href="#" title="售后服务保证 ">售后服务保证</a></dd>
                        <dd><a href="#" title="产品质量保证 ">产品质量保证</a></dd>
                    </dl>
                    <dl>
                        <dt><a href="#" title="联系我们 ">联系我们 </a></dt>
                        <dd><a href="#" title="网站故障报告">网站故障报告</a></dd>
                        <dd><a href="#" title="选机咨询 ">选机咨询</a></dd>
                        <dd><a href="#" title="投诉与建议 ">投诉与建议</a></dd>
                    </dl>
                </div>
            </div>


        </div>
        <div class="blank"></div>
        <div id="bottomNav" class="box block">
            <div class="box_1">
                <div class="links clearfix"> 
                  

                    


                    [<a href="#" target="_blank" title="免费申请网店">免费申请网店</a>]
                    [<a href="#" target="_blank" title="免费开独立网店">免费开独立网店</a>]


                    [<a href="#" target="_blank" title="免费开独立网店">yongda商城</a>]
                </div>
            </div>
        </div>
        <div class="blank"></div>
        <div id="bottomNav" class="box block">
            <div class="bNavList clearfix">
                <a href="#">免责条款</a>
                |
                <a href="#">隐私保护</a>
                |
                <a href="#">咨询热点</a>
                |
                <a href="#">联系我们</a>
                |
                <a href="#">Powered&nbsp;by&nbsp;<strong><span style="color: rgb(51, 102, 255);">YongDa</span></strong></a>
                |
                <a href="#">批发方案</a>
                |
                <a href="#">配送方式</a>

            </div>
        </div>

        <div id="footer">
            <div class="text">
                © 2005-2012 YONGDA 版权所有，并保留所有权利。<br />
            </div>
        </div>
    </body>
</html>