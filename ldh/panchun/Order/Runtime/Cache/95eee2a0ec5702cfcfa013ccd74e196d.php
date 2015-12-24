<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no;" name="viewport" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name='apple-touch-fullscreen' content='yes'>
<meta name="full-screen" content="yes">
<meta name="format-detection" content="telephone=no"/>
<meta name="format-detection" content="address=no"/>
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="images/startup/apple-touch-icon-57x57-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/startup/apple-touch-icon-72x72-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/startup/apple-touch-icon-114x114-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/startup/apple-touch-icon-144x144-precomposed.png" />
<link rel="apple-touch-startup-image" href="images/startup/startup5.jpg" media="(device-height:568px)">
<link rel="apple-touch-startup-image" size="640x920" href="images/startup/startup.jpg" media="(device-height:480px)">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="/panchun/templets/css/base.css" rel="stylesheet" type="text/css">
<link href="/panchun/templets/css/cc.css" rel="stylesheet" type="text/css">

<title></title>
</head>
<body>
<div class="wrap clearfix">
	<div class="SpecialTop">
		<a href="demo.html"><i></i></a>我的订单  <a href="vip.html" class="Tlogin">会员中心</a>
	</div>
	<div class="login">
	<div style="height:auto;margin:15px 40px;font-size:26px;font-weight:bold;">
		<p><span>姓名：</span><?php echo $_POST['uname']; ?></p>
		<br/>
		<p><span>订购商品：</span><?php echo $_POST['product']; ?></p>
		<br/>
		<p><span>收货人电话：</span><?php echo $_POST['tel']; ?></p>
		<br/>
		<p><span>详细地址：</span><?php echo $_POST['address']; ?></p>
	</div>
	</div>
	<!--<div class="login-footer">
    	<p>粤ICP备09196652号-2</p>
    </div>-->
	</div>


</body>
</html>