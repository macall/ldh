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
    <h2>手机注册</h2>
    <P><a href="login.html">登录</a> </P>
</div>
<div class="centent">
    <form action="" method="post">
        <ul>

            <li>
                <span>手机号</span>
                <input id="tel" type="text" placeholder="请输入11位手机号" name="tel">
                <a href="javascript:void(0)" id="sendVerifyCode" onclick="send()">发送验证码</a>
            </li>
            <li>
                <span>验证码</span>
                <input type="text" placeholder="请输入验证码" name="verify_code">
                <input type="hidden" name="invite_code" value="<?php echo ($invite_code); ?>">
            </li>
        </ul>
        <ul class="botton">
            <input type="submit" value="下一步">
        </ul>
    </form>
</div>
</body>

<script>
    var wait=60;
    
    //发送验证码
    function send(){
        sendVerifyCode();
        var obj = $('#sendVerifyCode').get(0);
        time(obj);
    }
    
    //倒计时
    function time(e) {
        if (wait == 0) {
            e.setAttribute("href","javascript:void(0)");
            e.setAttribute("onclick","send()");           
            e.innerHTML="发送验证码";
            wait = 60;
        } else {
            e.removeAttribute("href");
            e.removeAttribute("onclick");
            e.innerHTML="重新发送(" + wait + ")";
            wait--;
            setTimeout(function() {
                time(e);
            },1000);
        }
    }
    
    //发送给服务器做处理
    function sendVerifyCode(){
        var tel = $('#tel').val();
        var rex = /1[34578]{1}\d{9}$/;
        if(!rex.test(tel)){
            alert('请输入11位手机号');
            return;
        }
        $.ajax({
            type : 'get',
            url : 'register_tel.html',
            data : {'tel' : tel},
            dataType : 'json',
            success : function(data) 
            {
                if(data['error_message']['error_mess']){
                    alert(data['error_message']['error_mess']);
                }
            },
            error: function ()
            {
                alert('验证码发送错误');
            }
        });
    }
    
</script>
</html>