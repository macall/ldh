<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>订单管理系统-用户列表</title>
        <link href="__PUBLIC__/dwz/themes/default/style.css" rel="stylesheet" type="text/css" />
        <link href="__PUBLIC__/dwz/themes/css/core.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/ldh/templets/css/admin_css/style.css">
        <script type="text/javascript" src="/ldh/templets/ct/js/jquery.js"></script>
        <style type="text/css">
            #header{height:85px}
            #leftside, #container, #splitBar, #splitBarProxy{top:90px}
        </style>
    </head>
    <body scroll="no" style="background:#ebf5fb; height:100%;">
        <div id="layout">
            <div id="header">
                <div class="headerNav">
                    <a class="logo" href="__APP__/admin/index.html">Logo</a>
                    <ul class="nav">
                        <li><a href="__APP__/admin/index.html"><?php echo $admin['nickname']?></a></li>
                        <li><a href="__APP__/admin/logout.html">退出</a></li>
                    </ul>
                </div>
                <div id="navMenu">
                </div>
            </div>
        </div>
        <div class="ho_centent">
            <div class="fl hotai_left">
                <ul>
                    <li><a href="__APP__/admin/index.html">系统主页</a> </li>
                    <li class="no"><a href="__APP__/admin/user_list.html">用户列表</a> </li>
                    <li><a href="__APP__/admin/order_list.html">订单列表</a> </li>
                </ul>
            </div>
            <div class="right">
                <a href="__APP__/admin/user_list_export.html">导出excel</a>
                <table class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <td>用户ID</td>
                            <td>姓名</td>
                            <td class="dianhu">电话</td>
                            <td>地址</td>
                            <td>注册时间</td>
                            <td>成功分享次数</td>
                            <td>购买件数</td>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($user_list as $user):?>
                            <tr>
                                <td><?php echo $user['user_id'];?></td>
                                <td><?php echo $user['name'];?></td>
                                <td><?php echo $user['tel'];?></td>
                                <td class="diz"><?php echo $user['address'];?></td>
                                <td><?php echo $user['created_at'];?></td>
                                <td><?php echo $user['share_count'];?></td>
                                <td><?php echo $user['order_count'];?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <ul>
                    <li>
                        <?php echo ($page); ?>
                    </li>
                </ul>
            </div>
        </div>
        <div id="footer">Copyright &copy; 2014 左右互联订单管理系统</div>
        <script>
            $(function () {
                var hrightobg = $(window).height();
                $(".hotai_left").height(hrightobg)
            })
        </script>
    </body>
</html>