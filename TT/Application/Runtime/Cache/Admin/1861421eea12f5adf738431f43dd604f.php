<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>权限列表</title>

        <link href="/TT/Public/Admin//css/mine.css" type="text/css" rel="stylesheet" />
         <script src="/TT/Public/Admin//js/jquery-1.7.2.js" type="text/javascript"></script>
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：角色管理-》权限列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo U('roleList');?>">【返回角色管理】</a>
                </span>
            </span>
        </div>
        <div></div>
      
        <div style="font-size: 13px; margin: 10px 5px;">
        <form action="<?php echo U('accessEdit');?>" method="post" name='access'>
            <input type="hidden" name="role_id" value="<?php echo ($_GET['id']); ?>" />
            <table id="menu_list" class="table_a" border="1" width="100%">
                <tbody>
                      <tr>
                        <td>当前角色：</td>
                         <td>
                           <?php echo ($datas["role_name"]); ?>
                         </td>
                       
                    </tr>
                  <?php if(is_array($menu_datas)): foreach($menu_datas as $key=>$d): ?><tr >
                        <td><input <?php if(in_array($d[id],$access_datas)): ?>checked<?php endif; ?> data-id="<?php echo ($d["id"]); ?>" value="<?php echo ($d["id"]); ?>" name="menus[]" class="checkpart" type="checkbox"><?php echo ($d["menu_name"]); ?></td>
                        <td id="checkbox_<?php echo ($d["id"]); ?>">
                            <?php if(is_array($d[_child])): foreach($d[_child] as $key=>$dd): ?><div style="width:100px;float:left;"><input <?php if(in_array($dd[id],$access_datas)): ?>checked<?php endif; ?> value="<?php echo ($dd["id"]); ?>" name="menus[]" type="checkbox"/><?php echo ($dd["menu_name"]); ?></div><?php endforeach; endif; ?>
                        </td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
            <table class="table_a" border="1" width="100%">
                <tbody>
                     <tr >
                        <td  style="text-align: center;"><input class="checkall" value="1" type="checkbox" /> 全选/反选</td>
                        <td>&nbsp <input type="submit" name="保存"/>
                         </td>
                       
                    </tr>
                </tbody>
            </table>
            </form>
        </div>
        
    </body>
    <script type="text/javascript">
        $(function () {
            //给全选添加点击事件
            $('.checkall').click(function(){
                //遍历所有的选择框
                $('#menu_list :checkbox').each(function(){
                    $(this).attr('checked',!$(this).attr('checked'));
                });
            });

            //给顶级菜单权限添加点击事件，点击选中他的子级选项
            $('.checkpart').click(function () {
                //获取点击的父类id
                id = $(this).attr('data-id');

                //根据获取的id遍历所有子级
                $("#checkbox_"+id+" :checkbox").each(function(){
                    $(this).attr('checked',!$(this).attr('checked'));
                });
            });
        })
    </script>
   
</html>