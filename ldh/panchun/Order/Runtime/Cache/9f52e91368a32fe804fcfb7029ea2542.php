<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo (C("sitename")); ?> - 后台系统</title>

        <link href="__PUBLIC__/dwz/themes/default/style.css" rel="stylesheet" type="text/css" />
        <link href="__PUBLIC__/dwz/themes/css/core.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/panchun/templets/css/admin_css/style.css">
        <script type="text/javascript" src="/panchun/templets/ct/js/jquery.js"></script>
        <style type="text/css">
            #header{height:85px}
            #leftside, #container, #splitBar, #splitBarProxy{top:90px}
        </style>
    </head>
    <body scroll="no" style="background:#ebf5fb; height:100%;">
        <div id="layout">
            <div id="header">
                <div class="headerNav">
                    <a class="logo" href="__APP__">Logo</a>
                    <ul class="nav">
                        <li><a href="admin_index.html"><?php echo $admin['nickname']?></a></li>
                        <li><a href="admin_logout.html">退出</a></li>
                    </ul>
                </div>
                <div id="navMenu">
                </div>
            </div>
        </div>
        <div class="ho_centent">
    <div class="fl hotai_left">
        <ul>
            <li class="no"><a href="admin_user_list.html">用户列表</a> </li>
            <li><a href="admin_order_list.html">订单列表</a> </li>
        </ul>
    </div>
    <div class="right">
        <a href="#">导出excel</a>
        <table class="table table-striped table-bordered" width="100%">
            <thead>
            <tr>
                <td>订单编号</td>
                <td>用户</td>
                <td>产品</td>
                <td >联系电话</td>
                <td>QQ号码</td>
                <td class="diz">用户留言</td>
                <td>下单时间</td>
                <td>订单状态</td>
                <td>订单操作</td>

            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td class="blou">已处理</td>
                    <td class="zuihou"><button>已处理</button></td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td class="blou">已处理</td>
                    <td class="zuihou"><button>已处理</button></td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td class="blou">已处理</td>
                    <td class="zuihou"><button>已处理</button></td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td class="blou">已处理</td>
                    <td class="zuihou"><button>已处理</button></td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td class="blou ffff">未处理</td>
                    <td><button>设为已处理</button></td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td class="blou ffff">未处理</td>
                    <td><button>设为已处理</button></td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td class="blou ffff">未处理</td>
                    <td><button>设为已处理</button></td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td>2011-12-12</td>
                    <td>￥1000</td>
                    <td>@jS</td>
                    <td class="blou ffff">未处理</td>
                    <td><button>设为已处理</button></td>
                </tr>
            </tbody>
        </table>
        <ul>
            <li>
                <a href="#">首页</a>
                <a href="#">上一页</a>
                <a class="no"  href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">...</a>
                <a href="#">4</a>
                <a href="#">下一页</a>
                <a href="#">尾页</a>
            </li>
        </ul>
    </div>
</div>
        <div id="footer">Copyright &copy; 2014 左右互联订单管理系统</div>
        <script>
            $(function(){
                var hrightobg = $(window).height();
                $(".hotai_left").height(hrightobg)
            })
        </script>
    </body>
</html>