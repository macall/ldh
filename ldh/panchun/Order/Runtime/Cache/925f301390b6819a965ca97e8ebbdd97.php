<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<link href="/panchun/templets/style/vmcss2.css" rel="stylesheet" type="text/css">
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" name="viewport">
<script>
var mediaPath = "http://res.vmall.com/pimages/";
var cartMaxNum = 100000;
var cartDomain = "http://cart.vmall.com";
var remarkDomain = "http://remark.vmall.com";
var addressDomain = "http://addr.vmall.com";
</script>
<link href="/panchun/templets/style/main2.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>


<body>
<article class="breadcrumb " id="breadcrumb">
	<header>
		<a id="btn-back" href="javascript:history.go(-1);"></a>
		<em id="pageTitle">会员中心</em>
	</header>
	
	
	<!-- 21030531-捷径栏-start -->	
	<!--<section class="shortcut" id="shortcut-btn">
		<ul>
			    
				<li id="btn-cart">
					<a  id="prdDetailShoppingCart" onClick="_hmt.push(['_trackEvent', 'click icon2', 'click', '记录【购物车】图标按钮的点击次数'])"  href="http://m.vmall.com/shoppingCart" class="icon-shoppingCart" title="购物车">
						<span id="cartNum">0</span>
					</a>
				</li>
			
		</ul>
	</section>-->
	<!-- 21030531-捷径栏-end -->
</article>
<script>
(function(){ var curUri = document.location.pathname; if (curUri == '/personal/' || curUri == '/personal'){ document.getElementById('btn-back').setAttribute('href', '/index'); }else if(curUri == '/priority/' || curUri == '/priority') { document.getElementById('btn-back').setAttribute('href', '/index'); }else if(curUri == '/member/order/' || curUri == '/member/order' || curUri == '/order/address/manager' || curUri == '/order/address/manager/') { document.getElementById('btn-back').setAttribute('href', '/personal'); }else if(curUri == '/member/gotoPay/' || curUri == '/member/gotoPay') { document.getElementById('btn-back').setAttribute('href', '/index'); }else if(curUri == '/order/create/' || curUri == '/order/create') { document.getElementById('btn-back').setAttribute('href', '/index'); } })();</script>
<div class="hr-150-1"></div>
<!-- 21030314-用户信息-start -->


<!-- 20140521-个人中心-菜单-end -->
<section class="mc-menu">
	<ul>
		<li>
			<a id="orderHref" href="dingdan.html">
				<p class="m-title"><span>我的订单</span></p>
				<s class="m-arrows"><i class="icon-arrows-right"></i></s>
			</a>
		</li>

		<li>
			<a id="addressHref" href="http://m.vmall.com/account/applogin?url=/personal/">
				<p class="m-title"><span>我的分享</span></p>
				<s class="m-arrows"><i class="icon-arrows-right"></i></s>
			</a>
		</li>

		<li>
			<a id="couponHref" href="http://m.vmall.com/account/applogin?url=/personal/">
				<p class="m-title"><span>我的奖品(</span><em id="couponNum">0</em><span>)</span></p>
				<s class="m-arrows"><i class="icon-arrows-right"></i></s>
			</a>
		</li>
	</ul>
<ul>

<section id ="bottom-area" class="bottom-area">
  <p class="login"> 
  	<a href="/login.html" id='loginBtn'> 登录</a>
  	<a href="/demo.html"> 注册</a>

  </p>
  
  <p class="copyright"><span>Copyright &copy; 2011-2015</span></p>
</section>
<script>
$(document).ready(function(){var uri = document.location.pathname;if (null == uri || '' == uri || '/member/exchange' == uri) uri = '/index';if(null != Utils.cookie.get('uid') && '' != Utils.cookie.get('uid')){$('#loginBtn').html('注销').attr('href', '/account/logout?url=' + uri);}else{$('#loginBtn').html('登录').attr('href', '/account/applogin?url=' + uri);}});
go2PC = function(){Utils.cookie.set('redirectWap', '1', {domain : '.vmall.com'});location.href='http://www.vmall.com/cps/track?cid=12009&url=http://www.vmall.com';};
</script>

</body>
</html>