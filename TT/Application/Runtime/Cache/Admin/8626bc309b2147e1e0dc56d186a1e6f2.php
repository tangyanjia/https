<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>增加商品类型</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="/TT/Public/Admin//css/mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：类型管理-》修改类型</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo U('showlist');?>">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="/TT/index.php/Admin/Cate/cateEdit/id/1.html" method="post" >
                <input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>" />
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>类型名称</td>
                    <td><input type="text" name="cate_name" value="<?php echo ($datas["cate_name"]); ?>" /></td>
                </tr>
               
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="点击修改">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>