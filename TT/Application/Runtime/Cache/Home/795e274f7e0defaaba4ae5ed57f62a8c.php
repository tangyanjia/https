<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="Generator" content="YONGDA v1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="Keywords" content="YONGDA商城" />
        <meta name="Description" content="YONGDA商城" />
        
        <title>YONGDA商城 - Powered by YongDa</title>
        
        <link href="/TT/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
        <style>

        </style>
       
    </head>
    <body class="index_body">
       
        <div class="block clearfix" style="position: relative; height: 98px;">
            <a href="#" name="top"><img class="logo" src="/TT/Public/Home/images/logo.gif"></a>

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
                <input name="imageField" value=" " class="go" style="cursor: pointer; background: url('/TT/Public/Home/images/sousuo.gif') no-repeat scroll 0% 0% transparent; width: 39px; height: 20px; border: medium none; float: left; margin-right: 15px; vertical-align: middle;" type="submit" />

            </form>
        </div>
        <div class="blank5"></div>
        <div class="header_bg_b">
            <div class="f_l" style="padding-left: 10px;">
                <img src="/TT/Public/Home//images/biao6.gif" />
                    北京市区，现在下单(截至次日00:30已出库)，<b>明天上午(9-14点)</b>送达 <b>免运费火热进行中！</b>
            </div>
            <div class="f_r" style="padding-right: 10px;">
                <img style="vertical-align: middle;" src="/TT/Public/Home//images/biao3.gif">
                    <span class="cart" id="ECS_CARTINFO">
                        <a href="#" title="查看购物车">您的购物车中有 0 件商品，总计金额 ￥0.00元。</a></span>
                    <a href="#"><img style="vertical-align: middle;" src="/TT/Public/Home//images/biao7.gif"></a>

            </div>
        </div>





       <div class="block box">
            <div class="blank"></div>
            <div id="ur_here">
                当前位置: <a href="#">首页</a> <code>&gt;</code> <a href="#">手机类型</a> <code>&gt;</code> <a href="#">GSM手机</a> <code>&gt;</code> 诺基亚E66 
            </div>
        </div>
        <div class="blank"></div>



        <div class="block clearfix">
            <div class="AreaL">
                <h3><span>商品分类</span></h3> 
                <div id="category_tree" class="box_1">
                    <dl>
                        <dt><a href="#">CDMA手机</a></dt>
                        <dd>       </dd>
                    </dl>
                    <dl>
                        <dt><a href="#">GSM手机</a></dt>
                        <dd>       </dd>
                    </dl>
                    <dl>
                        <dt><a href="#">3G手机</a></dt>
                        <dd>       </dd>
                    </dl>
                    <dl>
                        <dt><a href="#">双模手机</a></dt>
                        <dd>       </dd>
                    </dl>

                </div>
                <div class="blank"></div>

                <div style="display: block;" class="box" id="history_div">
                    <h3><span>浏览历史</span></h3>
                    <div class="box_1">

                        <div class="boxCenterList clearfix" id="history_list">
                            <ul class="clearfix"><li class="goodsimg"><a href="#" target="_blank"><img src="/TT/Public/Home/images/8_thumb_G_1241425513488.jpg" alt="飞利浦9@9v" class="B_blue"></a></li><li><a href="#" target="_blank" title="飞利浦9@9v">飞利浦9@9v</a><br />本店售价：<font class="f1">￥399元</font><br /></li></ul><ul class="clearfix"><li class="goodsimg"><a href="#" target="_blank"><img src="/TT/Public/Home/images/9_thumb_G_1241511871555.jpg" alt="诺基亚E66" class="B_blue"></a></li><li><a href="#" target="_blank" title="诺基亚E66">诺基亚E66</a><br />本店售价：<font class="f1">￥2298元</font><br /></li></ul><ul class="clearfix"><li class="goodsimg"><a href="#" target="_blank"><img src="/TT/Public/Home/images/17_thumb_G_1241969394587.jpg" alt="夏新N7" class="B_blue"></a></li><li><a href="#" target="_blank" title="夏新N7">夏新N7</a><br />本店售价：<font class="f1">￥2300元</font><br /></li></ul><ul id="clear_history"><a onclick="clear_history()">[清空]</a></ul>  </div>
                    </div>
                </div>
                <div class="blank5"></div>
            </div>
<link rel="stylesheet" type="text/css" href="/TT/Public/Home/css/zzsc.css">

<script type="text/javascript" class="library" src="/TT/Public/Home/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" class="library" src="/TT/Public/Home/js/jquery.colorbox-min.js"></script>
<script type="text/javascript" class="library" src="/TT/Public/Home/js/zzsc.js"></script>
            <div class="AreaR">
                <div id="goodsInfo" class="clearfix">
                   
                   
                   
 <div class="con-FangDa" id="fangdajing">
     <div class="con-fangDaIMg">
         <!-- 正常显示的图片-->
         <img src="/TT/Uploads/<?php echo ($datas_pic[0]['pic_big']); ?>">
         <!-- 滑块-->
         <div class="magnifyingBegin"></div>
         <!-- 放大镜显示的图片 -->
         <div class="magnifyingShow"><img src="/TT/Uploads/<?php echo ($datas_pic[0]['pic_big']); ?>"></div>
     </div>

     <ul class="con-FangDa-ImgList">
         <!-- 图片显示列表 -->
         <?php if(is_array($datas_pic)): foreach($datas_pic as $k=>$d): ?><li <?php if($k == 0): endif; ?> >
             <img src="/TT/Uploads/<?php echo ($d["pic_small"]); ?>" data-bigimg="/TT/Uploads/<?php echo ($d["pic_big"]); ?>">
         </li><?php endforeach; endif; ?>
     </ul>

</div>

                   
                   
                   
                   
                    <div class="textInfo">
                            <div class="clearfix" style="font-size: 14px; font-weight: bold; padding-bottom: 8px;">
                                <?php echo ($datas["goods_name"]); ?>      
                            </div>
                        <ul>
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品货号：</strong><?php echo ($datas["goods_number"]); ?>  
                                    </dd>
                                </li> 
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品库存：</strong>
                                        <?php echo ($datas["goods_count"]); ?>
                                    </dd>
                                </li>  
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品品牌：</strong><a href="#"><?php echo ($datas["brand_name"]); ?></a>
                                    </dd>
                                </li>  
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品重量：</strong><?php echo ($datas["goods_weight"]); ?>      
                                    </dd>
                                </li>
                                <li class="clearfix">
                                    <dd>
                                        <strong>上架时间：</strong><?php echo (date('Y-m-d H:i:s',$datas["goods_edittime"])); ?>     
                                    </dd>
                                </li>
                                <li class="clearfix">
                                    <dd>
                                        <strong>商品点击数：</strong><?php echo ($datas["goods_click"]); ?>      </dd>
                                </li>
                                <li class="clearfix">
                                    <dd>
                                        <strong>市场价格：</strong><font class="market">￥<?php echo ($datas["goods_mprice"]); ?>元</font><br />

                                        <strong>本店售价：</strong><font class="shop" id="ECS_SHOPPRICE">￥<?php echo ($datas["goods_price"]); ?>}元</font><br />

                        <form action="" id="form_cart" method="post">
                            <input type="hidden" name="goods_id" value="<?php echo ($datas["id"]); ?>" />
                            <input type="hidden" name="goods_price" value="<?php echo ($datas["goods_price"]); ?>" />
                                <li class="clearfix">
                                    <dd>
                                        <strong>购买数量：</strong>
                                        <input name="number" id="number" value="1" size="4" onblur="changePrice()" style="border: 1px solid rgb(204, 204, 204);" type="text" />
                                    </dd>
                                </li>
                                

                                <?php if(is_array($goods_attr)): foreach($goods_attr as $key=>$d): ?><li class="padd loop">
                                    <strong><?php echo ($d["attr_name"]); ?>:</strong>
                                    
                                    <?php if(is_array($d[goods_attr_val])): foreach($d[goods_attr_val] as $k=>$dd): ?><label for="spec_value_226">
                                        <input name="goods_attr[<?php echo ($d["attr_name"]); ?>]" value="<?php echo ($dd); ?>" <?php if($k == 0): ?>checked="checked"<?php endif; ?> type="radio" /><?php echo ($dd); ?>
                                        </label><?php endforeach; endif; ?>
                                </li><?php endforeach; endif; ?>

                        </form>

                                <li class="padd">
                                        <a href="javascript:void(0);" class="goods_buy"><img src="/TT/Public/Home/images/goumai2.gif"></a>
                                    <a href="javascript:void(0);" id="add_cart"><img src="/TT/Public/Home/images/shoucang2.gif"></a>
                                    <a href="#"><img src="/TT/Public/Home/images/tuijian.gif"></a>
                                </li>
                            </ul>

                    </div>
                    <script src="/TT/Public/Home/js/jquery-1.11.1.js"></script>
                    <script src="/TT/Public/Home/layer/layer.js"></script>

                    <script type="text/javascript">
                        $(function(){
                            //加入购物车增加点击事件
                            $('#add_cart').click(function(){
//                                alert(1);
                                //修改增加到购物车的提交链接地址
                                $('#form_cart').attr('action','<?php echo U("cart/add");?>');
                                //提交到购物车
                                $('#form_cart').submit();
                            });
//                            官网欢迎页
                            $('.goods_buy').click(function(){
                                    layer.open({
                                        type: 1, //1.html页面 2.框架引入页面
                                        title: '用户登陆！', //
                                        skin: 'layui-layer-rim', //加上边框
                                        area: ['420px', '240px'], //宽高
                                        content: '<form action="" method="post" id="login_form"><table align="left" border="0" cellpadding="3" cellspacing="5" width="100%"><tbody><tr><td align="right" width="15%">用户名</td><td width="85%"><input name="username" size="25" class="inputBg" type="text"></td></tr><tr><td align="right">密码</td><td><input name="password" size="15" class="inputBg" type="password"></td></tr><tr><td colspan="2"></td></tr><tr><td>&nbsp;</td><td align="left"><input  value="" onclick="login_submit()" class="us_Submit" type="button" /></td></tr><tr><td></td><td><a href="#" class="f3">注册邮件找回密码</a></td></tr></tbody></table></form>'
                                    });
                            });


                    });
                        function login_submit(){
                            //获取用户数据
                            user_name = $('#login_form input[name=username]').val();
                            user_pwd = $('#login_form input[name=password]').val();
                            //发送ajax请求
                            $.post('<?php echo U("login/login");?>',{'username':user_name,'password':user_pwd},function(data){
                               if(data.status==1){
                                   //登录成功操作，要将用户的选择的表单信息获取
                                   //将数据提交到购买页面
                                   $('#form_cart').attr('action','<?php echo U("order/buy");?>');
                                   //提交到购物车
                                   $('#form_cart').submit();
                               }else{
                                   //使用layer的跳出样式
                                   layer.msg(data.info);
                               }
                            },'json');

                        }
                    </script>
                </div>
                <div class="blank"></div>
                <div class="box">
                    <div class="box_1">
                        <h3 style="padding: 0pt 5px;">
                            <div id="com_b" class="history clearfix">
                                <h2 style="cursor: pointer;">商品描述：</h2>
                                <h2 style="cursor: pointer;" class="h2bg">商品属性</h2>
                            </div>
                        </h3>
                        <div id="com_v" class="boxCenterList RelaArticle">
                                <?php echo ($datas["goods_description"]); ?>
                        </div>
                        <div class="none" id="com_h">
                            <blockquote>
                                {}
                                </blockquote>
                                }
                            <blockquote>
                                <table bgcolor="#dddddd" border="0" cellpadding="3" cellspacing="1" width="100%">
                                    <tbody><tr>
                                            <th colspan="2" bgcolor="#ffffff">商品属性</th>
                                        </tr>
                                        <tr>
                                            <td class="f1" align="left" bgcolor="#ffffff" width="30%">[外观样式]</td>
                                            <td align="left" bgcolor="#ffffff" width="70%">滑盖</td>
                                        </tr>
                                    </tbody></table>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="blank"></div>

                <div class="box">
                    <div class="box_1">
                        <h3><span class="text">商品标签</span></h3>
                        <div class="boxCenterList clearfix ie6">
                            <form name="tagForm"   id="tagForm">
                                <p id="ECS_TAGS" style="margin-bottom: 5px;">
                                </p>
                                <p>
                                    <input name="tag" id="tag" class="inputBg" size="35" type="text" />
                                    <input value="添 加" class="bnt_blue" style="border: medium none;" type="submit" />
                                    <input name="goods_id" value="9" type="hidden" />
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="blank5"></div>
                <div class="box">
                    <div class="box_1">
                        <h3><span class="text">购买过此商品的人还购买过</span></h3>
                        <div class="boxCenterList clearfix ie6">
                            <div class="goodsItem">
                                <a href="#">
                                    <img src="/TT/Public/Home/images/24_thumb_G_1241971981429.jpg" alt="P806" class="goodsimg"></a><br />
                                <p><a href="#" title="P806">P806</a></p> 
                                <font class="shop_s">￥2222000元</font>
                            </div>
                            <div class="goodsItem">
                                <a href="#">
                                    <img src="/TT/Public/Home/images/22_thumb_G_1241971076803.jpg" alt="多普达Touch HD" class="goodsimg" /></a><br />
                                <p><a href="#" title="多普达Touch HD">多普达Touc...</a></p> 
                                <font class="shop_s">￥5999元</font>
                            </div>
                            <div class="goodsItem">
                                <a href="#">
                                    <img src="/TT/Public/Home/images/13_thumb_G_1241968002527.jpg" alt="诺基亚5320 XpressMusic" class="goodsimg" /></a><br />
                                <p><a href="#" title="诺基亚5320 XpressMusic">诺基亚5320...</a></p> 
                                <font class="shop_s">￥1311元</font>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blank5"></div>
                <div id="ECS_BOUGHT"><div class="box">
                        <div class="box_1">
                            <h3><span class="text">购买记录</span>(近期成交数量<font class="f1">0</font>)</h3>
                            <div class="boxCenterList">
                                还没有人购买过此商品               
                                <div id="buy_pagebar" class="f_r" style="margin-top: 10px;">
                                    <form name="selectPageForm" action="/goods.php" method="get">
                                        <div id="buy_pager">
                                            总计 0 个记录，共 1 页。 <span> <a href="#">第一页</a> <a href="#">上一页</a> <a href="#">下一页</a> <a href="#">最末页</a> </span>
                                        </div>
                                    </form>
                                </div>

                                <div class="blank5"></div>
                            </div>
                        </div>
                    </div>
                    <div class="blank5"></div></div><div id="ECS_COMMENT"> <div class="box">
                        <div class="box_1">
                            <h3><span class="text">用户评论</span>(共<font class="f1">0</font>条评论)</h3>
                            <div class="boxCenterList clearfix" style="height: 1%;">
                                <ul class="comments">
                                    <li>暂时还没有任何用户评论</li>
                                </ul>

                                <div id="pagebar" class="f_r">
                                    <form name="selectPageForm" action="/goods.php" method="get">
                                        <div id="pager">
                                            总计 0 个记录，共 1 页。 <span> <a href="#">第一页</a> <a href="#">上一页</a> <a href="#">下一页</a> <a href="#">最末页</a> </span>
                                        </div>
                                    </form>
                                </div>

                                <div class="blank5"></div>

                                <div class="commentsList">
                                    <form action="#"  method="post" name="commentForm" id="commentForm">
                                        <table border="0" cellpadding="0" cellspacing="5" width="710">
                                            <tbody><tr>
                                                    <td align="right" width="64">用户名：</td>
                                                    <td width="631">匿名用户</td>
                                                </tr>
                                                <tr>
                                                    <td align="right">E-mail：</td>
                                                    <td>
                                                        <input name="email" id="email" maxlength="100" class="inputBorder" type="text" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right">评价等级：</td>
                                                    <td>
                                                        <input name="comment_rank" value="1" id="comment_rank1" type="radio" /> 
                                                        <img src="/TT/Public/Home/images/stars1.gif" />
                                                        <input name="comment_rank" value="2" id="comment_rank2" type="radio" /> 
                                                        <img src="/TT/Public/Home/images/stars2.gif" />
                                                        <input name="comment_rank" value="3" id="comment_rank3" type="radio" /> 
                                                        <img src="/TT/Public/Home/images/stars3.gif" />
                                                        <input name="comment_rank" value="4" id="comment_rank4" type="radio" /> 
                                                        <img src="/TT/Public/Home/images/stars4.gif" />
                                                        <input name="comment_rank" value="5" checked="checked" id="comment_rank5" type="radio" /> 
                                                        <img src="/TT/Public/Home/images/stars5.gif" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" valign="top">评论内容：</td>
                                                    <td>
                                                        <textarea name="content" class="inputBorder" style="height: 50px; width: 620px;"></textarea>
                                                        <input name="cmt_type" value="0" type="hidden" />
                                                        <input name="id" value="9" type="hidden" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div style="padding-left: 15px; text-align: left; float: left;">
                                                            验证码：<input name="captcha" class="inputBorder" style="width: 50px; margin-left: 5px;" type="text" />
                                                            <img src="/TT/Public/Home/images/captcha.png" alt="captcha" onclick="this.src='captcha.php?'+Math.random()" class="captcha" />
                                                        </div>
                                                        <input name="" value="评论咨询" class="f_r bnt_blue_1" style="margin-right: 8px;" type="submit" />
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="blank5"></div>

                   </div>
            </div>

        </div>
        <div class="blank"></div>





        
        <div class="block">
            <a href="#" target="_blank" title="YONGDA商城"><img alt="YONGDA商城" src="/TT/Public/Home/images/di.jpg"></a>
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