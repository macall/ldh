<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>订单管理系统-订单列表</title>

        <link href="__PUBLIC__/dwz/themes/default/style.css" rel="stylesheet" type="text/css" />
        <link href="__PUBLIC__/dwz/themes/css/core.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/ldh/templets/css/admin_css/style.css">
        <script type="text/javascript" src="/ldh/templets/ct/js/jquery.js"></script>
        <style type="text/css">
            #header{height:85px}
            #leftside, #container, #splitBar, #splitBarProxy{top:90px}
        </style>
    </head>
    <body style="background:#ebf5fb; height:100%;">
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
                    <li><a href="__APP__/admin/user_list.html">用户列表</a> </li>
                    <li class="no"><a href="__APP__/admin/order_list.html">订单列表</a> </li>
                </ul>
            </div>
            <div class="right">
                <a href="__APP__/admin/order_list_export.html">导出excel</a>
                <table class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <td>订单编号</td>
                            <td>用户</td>
                            <td>产品</td>
                            <td>送货地址</td>
                            <td>收货人</td>
                            <td >联系电话</td>
                            <td>QQ号码</td>
                            <td>用户留言</td>
                            <td>下单时间</td>
                            <td>订单状态</td>
                            <td>订单操作</td>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($order_list as $order):?>
                            <tr>
                                <td class="gy"><?php echo $order['order_id'];?></td>
                                <td><?php if($order['user_name']){echo $order['user_name'];}else{echo '<span style="color:red;font-size:16px;">游客购买</span>';}?></td>
                                <td class="ddd"><?php echo $order['remark'];?></td>
                                <td class="ddd"><?php echo $order['buyer_address'];?></td>
                                <td><?php echo $order['uname'];?></td>
                                <td><?php echo $order['tel'];?></td>
                                <td><?php echo $order['qq'];?></td>
                                <td class="diz"><?php echo $order['message'];?></td>
                                <td class="gy"><?php echo $order['created_at'];?></td>
                                <?php if($order['status'] == 1):?>
                                <td class="blou ffff gy">未处理</td>
                                <td class="gy"><button onclick="setting_status(this,'<?php echo $order['order_id'];?>')">设为已处理</button></td>
                                <?php else:?>
                                <td class="blou gy">已处理</td>
                                <td class="zuihou gy"><button>已处理</button></td>
                                <?php endif;?>
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
            });
            
            function setting_status(obj,order_id){
                if(confirm("确定要将订单状态设为已处理吗?")){
                    $.ajax({
                        type : 'post',
                        url : '__APP__/admin/update_order_status.html',
                        data : {'order_id' : order_id},
                        dataType : 'json',
                        success : function(data) 
                        {
                            if(data['data']['res'] == 1){
                                $(obj).html('已处理');
                                $(obj).parent().prev().html('已处理');
                                $(obj).parent().prev().removeClass('ffff');
                                $(obj).parent().addClass('zuihou');
                            }else{
                                alert(data['data']['res']);
                            }
                        },
                        error: function ()
                        {
                            alert('登录发生错误！');
                        }
                    });
                }else{
                    
                }
            }
        </script>
    </body>
</html>