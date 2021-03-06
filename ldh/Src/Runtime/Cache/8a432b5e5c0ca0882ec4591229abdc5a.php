<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>订单管理系统</title>

        <link href="__PUBLIC__/dwz/themes/default/style.css" rel="stylesheet" type="text/css" />
        <link href="__PUBLIC__/dwz/themes/css/core.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/ldh/templets/css/admin_css/style.css">
        <script type="text/javascript" src="/ldh/templets/ct/js/jquery.js"></script>
        <!--[if IE]>
        <link href="__PUBLIC__/dwz/themes/css/ieHack.css" rel="stylesheet" type="text/css" />
        <![endif]-->
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
                    <li class="no"><a href="__APP__/admin/index.html">系统主页</a> </li>
                    <li><a href="__APP__/admin/user_list.html">用户列表</a> </li>
                    <li><a href="__APP__/admin/order_list.html">订单列表</a> </li>
                </ul>
            </div>
            <div class="right right_1">
                <ul>
                    <li>
                        <p  class="fl"><span>尊敬的用户：</span><i><?php echo $admin['nickname']?></i></p>
                        <p class="fr"> <span>当前订单总量：</span><i><?php echo $order['total']?></i></p>
                    </li>
                    <li>
                        <p class="fl"> <span>已处理订单：</span><i><?php echo $order['done']?></i></p>
                        <p class="fr"><span>未处理订单：</span><i><?php echo $order['pending']?></i></p>
                    </li>
                    <li>
                        <p class="fl"><span>有效总用户：</span><i><?php echo $user?></i></p>
                        <p class="fr"> <span>总奖品数：</span><i><?php echo $price['total']?></i></p>
                    </li>
                    <li>
                        <p class="fl"><span>已发放奖品数：</span><i><?php echo $price['used']?></i></p>
                        <p class="fr"><span>还剩奖品数：</span><i><?php echo $price['unused']?></i></p>
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