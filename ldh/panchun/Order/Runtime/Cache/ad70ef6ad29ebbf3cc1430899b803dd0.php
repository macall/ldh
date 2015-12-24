<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>登录</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link rel="stylesheet" href="/panchun/templets/css/register_css/style.css">
    <script type="text/javascript" src="/panchun/templets/ct/js/jquery.js"></script>
</head>
<body>
<div class="heder">
    <h2>会员登录</h2>
    <P><a href="register_tel.html">注册</a> </P>
</div>
<div class="centent">
    <form>
        <ul>

            <li>
                <span>手机号</span>
                <input type="text"  placeholder="请输入11位手机号" id="tel" name='tel'>
            </li>
            <li>
                <span>密&nbsp;&nbsp;&nbsp;码</span>
                <input type="password" placeholder="请输入密码" id="password" name='password'>
            </li>

        </ul>
        <ul class="botton">
            <input type="button" value="登录" onclick="form_submit()">
            <p style="padding: 10px;">
                <input class="cheox" type="checkbox" id="auto_login" name="auto_login" >
                <i>下次自动登录</i>
                <a href="/panchun" style="float:right">返回首页</a>
            </p>
        </ul>
    </form>
</div>
</body>

<script>
    //发送给服务器做处理
    function form_submit(){
        var tel = $('#tel').val();
        var rex = /1[34578]{1}\d{9}$/;
        if(!rex.test(tel)){
            alert('请输入11位手机号');
            return;
        }
        var password = $('#password').val();
        var is_checked = $("input[type='checkbox']").is(':checked');
        
        var auto_login = 0;
        if(is_checked){
            auto_login = 1;
        }
        $.ajax({
            type : 'post',
            url : 'login.html',
            data : {'tel' : tel,'password' : password,'auto_login' : auto_login},
            dataType : 'json',
            success : function(data) 
            {
                if(data['data']['res'] == 1){
                    window.location = "/panchun";  
                }else{
                    alert(data['data']['res']);
                }
            },
            error: function ()
            {
                alert('登录发生错误！');
            }
        });
    }
</script>
</html>