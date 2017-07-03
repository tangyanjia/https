<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>增加角色</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="/TT/Public/Admin//css/mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：角色管理-》添加角色信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo U('system/roleList');?>">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="" method="post" >
                <input type="hidden" value="<?php echo ($data["id"]); ?>" name="id"/>
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>角色名称</td>
                    <td><input type="text" name="role_name" value="<?php echo ($data["role_name"]); ?>" /></td>
                </tr>
                
                
                <tr>
                    <td>角色状态</td>
                    <td>
                        <select name="role_status" value="<?php echo ($data["role_status"]); ?>">
                            <option value='1'>启用</option>
                            <option value='0'>禁用</option>
                        </select>
                    </td>
                </tr>
               
                
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="修改提交">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>