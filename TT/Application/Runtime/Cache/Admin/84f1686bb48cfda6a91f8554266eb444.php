<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>会员列表</title>

        <link href="/TT/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：商品管理-》商品列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('goods_add');?>">【添加商品】</a>
                </span>
            </span>
        </div>
        <div></div>
        
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>商品名称</td>
                        <td>商品描述</td>
                         <td>品牌</td>
                        <td>库存</td>
                        <td>价格</td>
                        <td>商品展示</td>
                        <td>缩略图</td>
                        <td>创建时间</td>

                        <td align="center" colspan="3">操作</td>
                    </tr>
                <?php if(is_array($data)): foreach($data as $key=>$d): ?><tr>
                        <td><?php echo ($d["id"]); ?></td>
                        <td><a href="<?php echo U('home/goods/detail');?>"><?php echo ($d["goods_name"]); ?></a></td>
                        <td><?php echo ($d["goods_description"]); ?></td>
                        <td><?php echo ($d["brand_name"]); ?></td>
                        <td><?php echo ($d["goods_count"]); ?></td>
                        <td><?php echo ($d["goods_price"]); ?></td>
                        <td><img src="/TT/Uploads/<?php echo ($d["goods_bigpic"]); ?>" height="60" width="60"></td>
                        <td><img src="/TT/Uploads/<?php echo ($d["goods_smallpic"]); ?>" height="40" width="40"></td>
                        <!--<td><img src="/TT/Public/Admin/img/20121018-174034-58977.jpg" height="60" width="60"></td>-->

                        <td>2012-10-18 17:40:34</td>
                        <td><a href="<?php echo U('pic','id='.$d[id]);?>">商品相册管理</a></td>
                        <td><a href="<?php echo U('goods_edit','id='.$d[id]);?>">修改</a></td>
                        <!--<td><a class="goods_del" data-id="<?php echo ($d["id"]); ?>" href="javascript:;" ><?php if($d["goods_status"] == 1): ?>下架  <?php else: ?>  上架<?php endif; ?></a></td>-->
                        <td>
                            <a href="javascript:;" class="goods_del" gid="<?php echo ($d["id"]); ?>">
                                <?php if($d['goods_status'] == 1): ?>下架
                                <?php else: ?>
                                    上架<?php endif; ?>
                            </a>
                        </td>
                    </tr><?php endforeach; endif; ?>
                <script src="/TT/Public/Admin/js/jquery-1.7.2.js"></script>
                <script type="text/javascript">
                 $(function () {
                    $('.goods_del').click(function(){
                        _this = $(this);
                        id = _this.attr('gid');
                        //使用ajax的post方法将获取的id传出去
                        $.post('/TT//index.php/Admin/Goods/del',{'id':id},function(data){
                            if(data.status == 1){
//                                console.log(data);exit;
                                _this.text(data.info);
                            }
                        },'json');
                    })
                 })
                </script>
                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <?php echo ($pages); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>