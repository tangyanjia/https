<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>相册列表</title>

        <link href="/TT/Public/Admin/css/mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：相册管理-》XX的相册列表</span>
              
            </span>
        </div>
        <div></div>
        
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>大图</td>
                        <td>缩略图</td>
                        <td align="center">操作</td>
                    </tr>
                <?php if(is_array($data)): foreach($data as $key=>$d): ?><tr >
                        <td><?php echo ($d["id"]); ?></td>
                        <td><img src="/TT/Uploads/<?php echo ($d["pic_big"]); ?>" height="60" width="60"></td>
                        <td><img src="/TT/Uploads/<?php echo ($d["pic_small"]); ?>" height="40" width="40"></td>
                   
                        <td><a class="picdel" data-id="<?php echo ($d["id"]); ?>" href="javascript:;">删除</a></td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>

        </div>
         <form action="" method="post" enctype="multipart/form-data" >
         <div style="font-size: 13px; margin: 10px 5px;">
             <input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>">
            <table class="table_a" border="1" width="100%">
             
                    <tr style="font-weight: bold;">
                        <td>选择图片<a href="javascript:;" id='addPic'>[+]</a></td>
                       
                    </tr>
                  <tbody id="img_files">
                    <tr>
                        <td><input type="file" name='image[]'class="goods_image"/></td>
                    </tr>
                </tbody>

            </table>
             <input type="submit" value="确认保存" />
         </div>
         </form>
    </body>
    <script type="text/javascript" src="/TT/Public/Admin/js/jquery-1.7.2.js"></script>
    <script type="text/javascript">
        $(function () {
            //给 ＋ 添加点击事件
            $('#addPic').click(function () {
//                alert(1);
                //在tbody标签后面添加标签
                str = "<tr><td><input type='file' name='image[]'/><a href='javascript:;' class='del'>[-]</a></td></tr>";
                $('#img_files').append(str);
            })
            //给动态添加的内容绑定点击事件
            $('.del').live('click',function(){
//                alert(1);
                $(this).parents('tr').remove();
            })
            //删除Uploads目录下的图片
            $('.picdel').click(function(){
                _this = $(this);
                id = _this.attr('data-id');
//                _this.parents('tr').remove();
                $.post('/TT/index.php/Admin/Goods/delPic',{'id':id},function (data){
                        if(data.status==1){
                            _this.parents('tr').remove();
                        }
                },'json');
            })
        })
    </script>
</html>