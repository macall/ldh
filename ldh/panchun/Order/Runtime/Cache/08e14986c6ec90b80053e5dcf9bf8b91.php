<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>系统登录</title>
        <link href="__PUBLIC__/czy/css/login.css" rel="stylesheet" rev="stylesheet" type="text/css" media="all" />
        <link href="__PUBLIC__/czy/css/demo.css" rel="stylesheet" rev="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <div class="header">
            <h1 class="headerLogo"><a title="后台管理系统" target="_blank" href="/"><img alt="logo" src="__PUBLIC__/czy/images/logo.gif"></a></h1>
            <div class="headerNav">
                <a target="_blank" href="/panchun">钰盈堂净颜梅手机官网</a>	
            </div>
        </div>
        <div class="banner">
            <div class="login-aside">
                <div id="o-box-up"></div>
                <div id="o-box-down"  style="table-layout:fixed;">
                    <div class="error-box"></div>
                    <form class="registerform"  method="post" action="admin_login.html">
                        <div class="fm-item">
                            <label for="logonId" class="form-label">登陆帐号：</label>
                            <input type="text" placeholder="输入登陆帐号" maxlength="100" name="account" class="i-text">    
                            <div class="ui-form-explain"></div>
                        </div>
                        <div class="fm-item">
                            <label for="logonId" class="form-label">登陆密码：</label>
                            <input type="password" placeholder="输入登陆密码" maxlength="100" name="password" class="i-text">    
                            <div class="ui-form-explain"></div>
                        </div>
                        <?php if($error):?>
                            <br>
                            <div style="color: white">
                                <?php echo $error;?>
                            </div>
                        <?php endif;?>
                        <div class="fm-item">
                            <label for="logonId" class="form-label"></label>
                            <input type="submit" value="" tabindex="4" id="send-btn" class="btn-login"> 
                            <div class="ui-form-explain"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bd">
                <ul>
                    <li style="background:url(__PUBLIC__/czy/themes/theme-pic1.jpg) #CCE1F3 center 0 no-repeat;"></li>
                    <li style="background:url(__PUBLIC__/czy/themes/theme-pic2.jpg) #BCE0FF center 0 no-repeat;"></li>
                </ul>
            </div>
        </div>
        <div class="banner-shadow"></div>
        <div class="footer">
            <p>Copyright &copy; 2014 左右互联订单管理系统</p>
        </div>
    </body>
</html>