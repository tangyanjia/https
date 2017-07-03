<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="/TT/Public/Admin/css/mine.css" type="text/css" rel="stylesheet">
        <link href="/TT/Public/Admin/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="/TT/Public/Admin/umeditor/third-party/jquery.min.js"></script>
        <script src="/TT/Public/Admin/js/jquery-1.7.2.js"></script>
        <script type="text/javascript" src="/TT/Public/Admin/umeditor/third-party/template.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="/TT/Public/Admin/umeditor/umeditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="/TT/Public/Admin/umeditor/umeditor.min.js"></script>
        <script type="text/javascript" src="/TT/Public/Admin/umeditor/lang/zh-cn/zh-cn.js"></script>
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》添加商品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo U('goods_list');?>">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>商品名称</td>
                    <td><input type="text" name="goods_name" /></td>
                </tr>
                <tr>
                    <!--<td>商品分类</td>-->
                    <!--<td>-->
                        <!--<select name="brand_name">-->
                            <!--<option value="brand_id">请选择</option>-->

                        <!--</select>-->
                    <!--</td>-->
                <!--</tr>-->
                <tr>
                    <td>商品品牌</td>
                    <td>
                        <select name="brand_id" >
                            <option value="0">请选择</option>
                            <?php if(is_array($brand_data)): foreach($brand_data as $key=>$d): ?><option value="<?php echo ($d["id"]); ?>"><?php echo ($d["brand_name"]); ?></option><?php endforeach; endif; ?>
                           
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>商品类型</td>
                    <td>
                        <select name="cate_id" class="goods_cate">
                            <option value="0">请选择</option>
                            <?php if(is_array($cate_data)): foreach($cate_data as $key=>$d): ?><option value="<?php echo ($d["id"]); ?>"><?php echo ($d["cate_name"]); ?></option><?php endforeach; endif; ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>商品价格</td>
                    <td><input type="text" name="goods_price" /></td>
                </tr>
                <tr>
                    <td>商品封面图片</td>
                    <td><input type="file" name="goods_image" /></td>
                </tr>
                 <tr>
                    <td>商品数量</td>
                    <td><input type="text" name="goods_count" /></td>
                </tr>
                <tr>
                    <td>商品排序</td>
                    <td><input type="text" name="goods_sort" /></td>
                </tr>
                <tr>
                    <td>商品详细描述</td>
                    <td>
                        <script type="text/plain" name="goods_description" id="myEditor" style="width:1000px;height:240px;">
                       </script>
                    </td>
                </tr>
                <script type="text/javascript">  //实例化编辑器
                var um = UM.getEditor('myEditor');

                //给下拉菜单添加change事件
                    $(function(){
                        $('.goods_cate').change(function(){
                            _this = $(this);
                            cate_id = _this.val();
                            //使用ajax请求并获取数据
                            $.post('<?php echo U("attribute/getArr");?>',{'cate_id':cate_id},function(data){
                                //使用$,each方法便利数据
                                console.log(data);
                                str = '';
                                $.each(data,function(key,item){
                                    var options = '';
                                    if(item.attr_sel==0){
                                        //组装input 框架
                                        str = '<tr class="newTag"><td>'+item.attr_name+'</td><td><input name="goods_attr['+item.id+'][]" type="text" value="" /></td></tr>';
                                    }else{
                                        //组装下拉框
                                        //将下拉框的值遍历出来
                                        tmp = item.attr_val.split(',');
                                        for(i=0;i<tmp.length;i++){
                                            options +='<option value="'+tmp[i]+'"> '+tmp[i]+'</option>'
                                        }
                                        str = '<tr class="newTag"><td>'+item.attr_name+'</td><td><select class="goods_cate" name="goods_attr['+item.id+'][]">'+options+'</select><a href="javascript:void(0);"  class="add_attr"> [+] </a></td></tr>';
                                    }
                                    //将属性追加到 类型下面去

                                    _this.parents('tr').after(str);

                                })

                            },'json');

                        });
                        //增加属性选项
                        $('.add_attr').live('click',function(){
                            trDom = $(this).parents('tr');
                            //克隆出来的对象
                            domclone =  trDom.clone();
                            //找到加号的a标签
                            domclone.find('a').remove();
                            // 自定义a标签的内容
                            a = '<a href="javascript:void(0);"  class="mus_attr"> - </a>';
                            //将内容追加到克隆对象里面去
                            domclone.find('select').after(a);

                            trDom.after(domclone);

                        })
                        //删除属性项
                        $('.mus_attr').live('click',function(){
                            $(this).parents('tr').remove();
                        })
                    });


                </script>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加" />
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>