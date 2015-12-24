/**
  ************************************************************************
  WFPHP订单系统版权归WENFEI所有，凡是破解此系统者都会死全家，非常灵验。
  ************************************************************************
  WFPHP订单系统官方网站：http://www.wforder.com/   （盗版盗卖者死全家）
  WFPHP订单系统官方店铺：http://889889.taobao.com/ （破解系统者死全家）
  ************************************************************************
  郑重警告：凡是破解此系统者出门就被车撞死，盗卖此系统者三日内必死全家。
  ************************************************************************ 
  盗版模仿本页面样式者必死全家（包括但不限于CSS代码、JS代码、html代码）。
  ************************************************************************
 */
window.onerror=function(){return true;} 
function $_wfah(id){return document.getElementById(id);}
function getHeight(){$_wfah("wffahuo").style.height=$_wfah("wfforml").offsetHeight-86+"px";}
window.onload=function(){getHeight();}
//////////////////////////// WFORDERJSFGX ////////////////////////////
function postcheck(){
	var ifname=/^[\u4e00-\u9fa5]{2,6}$/;
	var ifmob=/^1[3,4,5,7,8]\d{9}$/;
	var ifmobcode=/^\d{6}$/;
	var ifemail=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	try{
		var flag1=0;
		var radio1=document.getElementsByName("product");		
		for(var i=0;i<radio1.length;i++){
			if(radio1.item(i).checked==true){
				flag1=1;
				break;
			}
		}
		if(!flag1&&radio1.item(0).getAttribute("type")=="radio"){
			alert('请选择您要订购的产品！');
			return false;
		}
    }catch(ex){}
	try{		
		var cbxs=document.getElementsByName("product[]");
		var flag2=0;
		for(var i=0;i<cbxs.length;i++){
			if(cbxs[i].checked){
				flag2+=1;
			}
		}
		if(flag2<1&&cbxs[0].getAttribute("type")=='checkbox'){
			alert('请选择您要订购的产品！');
			return false;
		}
	}catch(ex){}	
	try{
		if(document.wfform.wfproduct.value==""){
			alert('请选择您要订购的产品！');
			document.wfform.wfproduct.focus();
			return false;
		}
    }catch(ex){}	
	try{
		if(document.wfform.wfproductb.value==""){
			alert('请选择产品规格！');
			document.wfform.wfproductb.focus();
			return false;
		}
    }catch(ex){}
	try{
		if(document.wfform.wfproductc.value==""){
			alert('请选择产品颜色！');
			document.wfform.wfproductc.focus();
			return false;
		}
    }catch(ex){}		
	try{
		if(document.wfform.wfname.value==""){
			alert('请填写姓名！');
			document.wfform.wfname.focus();
			return false;
		}
		if(!ifname.test(document.wfform.wfname.value)){
			alert('姓名格式不正确，请重新填写！');
			document.wfform.wfname.focus();
			return false;
		}
    }catch(ex){}
    try{
		if(document.wfform.wfmob.value==""){
			alert('请填写手机号码！');
			document.wfform.wfmob.focus();
			return false;
		}
		if(!ifmob.test(document.wfform.wfmob.value)){
			alert('手机号码格式不正确，请重新填写！');
			document.wfform.wfmob.focus();
			return false;
		}
    }catch(ex){}	
    try{
		if(document.wfform.wfmobcode.value==""){
			alert('请填写手机验证码！');
			document.wfform.wfmobcode.focus();
			return false;
		}
		if(!ifmobcode.test(document.wfform.wfmobcode.value)){
			alert('手机验证码格式不正确，请重新填写！');
			document.wfform.wfmobcode.focus();
			return false;
		}
    }catch(ex){}
	try{
		if(document.wfform.wfprovince.value==""){
			alert('请选择所在地区！');
			document.wfform.wfprovince.focus();
			return false;
		}
    }catch(ex){}
    try{
		if(document.wfform.wfaddress.value==""){
			alert('请填写详细地址！');
			document.wfform.wfaddress.focus();
			return false;
		}
    }catch(ex){}
    try{
		if(document.wfform.wfemail.value==""){
			alert('请填写E-MAIL！');
			document.wfform.wfemail.focus();
			return false;
		}
		if(!ifemail.test(document.wfform.wfemail.value)){
			alert('E-MAIL格式不正确，请重新填写！');
			document.wfform.wfemail.focus();
			return false;
		}
    }catch(ex){}
    try{
		if(document.wfform.wfinvcode.value==""){
			alert('请填写邀请码！');
			document.wfform.wfinvcode.focus();
			return false;
		}
    }catch(ex){}
    try{
		if(document.wfform.wfcode.value == ""){
			alert('请填写验证码！');
			document.wfform.wfcode.focus();
			return false;
		}
    }catch(ex){}
    try{
		var onwfpay = document.getElementsByName("pay"); 
		for(var i=0;i<onwfpay.length;i++){
			if(onwfpay[i].checked){
			var wfpay = onwfpay[i].value;
			}
		}
		if(wfpay=="alipay"||wfpay=="alipaywap"||wfpay=="ebank"){
			document.wfform.wfsubmit.value="重新提交";
		}
		else{
			document.wfform.wfsubmit.value="正在提交，请稍等 >>";
		}
		return true;
    }catch(ex){}
}
//////////////////////////// WFORDERJSFGX ////////////////////////////
try{
	new PCAS("province","city","dist");
}catch(ex){}
try{
	var thissrc = document.getElementById("wfcode").src;
	function refreshCode(){
		document.getElementById("wfcode").src=thissrc+"&temp="+Math.random(); 
	}
}catch(ex){}
//////////////////////////// WFORDERJSFGX ////////////////////////////
function pricea(){
	var wfproduct = document.wfform.wfproduct.alt;
	for(var i=0;i<document.wfform.wfproduct.length;i++){
		if(document.wfform.wfproduct[i].checked==true){
			var wfproduct = document.wfform.wfproduct[i].alt;
			break;
		}
	}
    if(document.wfform.wfmun.value=="" || document.wfform.wfmun.value==0){	
		var wfmun=1;
	}
	else{
		var wfmun=document.wfform.wfmun.value;
	}	
	var wfprice=wfproduct*wfmun;
	document.wfform.wfprice.value=wfprice;
	document.getElementById("showprice").innerHTML=wfprice;
}
function priceb(){
    var wfcpxljg = document.getElementById("wfproduct");
    var wfproduct = wfcpxljg.options[document.getElementById("wfproduct").options.selectedIndex].title; 
    if(document.wfform.wfmun.value=="" || document.wfform.wfmun.value==0){	
		var wfmun=1;
	}
	else{
		var wfmun=document.wfform.wfmun.value;
	}	
	var wfprice=wfproduct*wfmun;
	document.wfform.wfprice.value=wfprice;
	document.getElementById("showprice").innerHTML=wfprice;
}
function pricec(){
	var wfmun=0;
	var wfprice=0;	
	var obj=document.getElementsByName("product[]");
    for(var i=0;i<obj.length;i++){
		if(obj[i].checked){
			wfmun++;
			wfprice+=parseInt(obj[i].alt);
		}
	}
	document.wfform.wfmun.value=wfmun;
	document.wfform.wfprice.value=wfprice;
	document.getElementById("showmun").innerHTML=wfmun;
	document.getElementById('showprice').innerHTML=wfprice;
}
//////////////////////////// WFORDERJSFGX ////////////////////////////
function changeItem(i){
    var k=4;
	for(var j=0;j<k;j++){
	    if(j==i){
		    document.getElementById("paydiv" + j).style.display="block";
		}
		else{		
		    document.getElementById("paydiv" + j).style.display="none";
		}
	}
}
function opay(){
	document.getElementById("wfform").target="_parent";
}
function opay2(){
    document.getElementById("wfform").target="_blank";
}
//////////////////////////// WFORDERJSFGX ////////////////////////////
function wfsmscode(obj){
  $.ajax({
	  url:"../wfpublic/wfsmscode.php",
	  type:"Post",
	  data:"wfmob="+$("#wfmob").val(),
	  success:function(msg){
		  if (msg=="ok"){
			  alert("验证码已成功发送到你的手机上，请注意查收。");
			  var count=60;
			  var countdown=setInterval(CountDown,1000);
			  function CountDown(){
				  $("#getcode").attr("disabled",true);
				  $("#getcode").val("等待"+count+"秒后可重新获取");
				  if(count==0){
					  $("#getcode").val("重新获取验证码 >>").removeAttr("disabled");
					  clearInterval(countdown);
				  }
				  count--;
			  }
			  return;
		  }
		  if(msg=="error"){
			  alert("验证码发送失败，请联系管理员。");
			  return;
		  }
		  alert(msg);
	  }
  })
}
//////////////////////////// WFORDERJSFGX ////////////////////////////
function WFDDURL(){
	var WFDDURL=null;
	if(parent!==window){
		WFDDURL=document.referrer;
	}else{
		if(top!==window){
			WFDDURL=top.location.href;
		}else{
			WFDDURL=window.location.href;
		}
	}
	return WFDDURL;
}
document.getElementById("WFDDURL").value=WFDDURL();
function setCookie(){
	var WFLLURL=window.top.document.referrer;			
    document.cookie="WFLLURL="+escape(WFLLURL)+";path=/";
}
function getCookie(){
    var name="WFLLURL=";
    var ca=document.cookie.split(';');
    for(var i=0;i<ca.length;i++){
        var c=ca[i];
        while(c.charAt(0)==" ")c=c.substring(1);
        if(c.indexOf(name)!=-1)return c.substring(name.length,c.length);
    }
	return "";
}
function checkCookie(){
	var IFWFLLURL=getCookie();
	if(IFWFLLURL==""||IFWFLLURL==null){
		setCookie();
	}
}
checkCookie();




var speeds=80;
var wffahuo=document.getElementById('wffahuo');
var wffahuo1=document.getElementById('wffahuo1');
var wffahuo2=document.getElementById('wffahuo2');
wffahuo2.innerHTML=wffahuo1.innerHTML
function Marquee1(){
	if(wffahuo2.offsetHeight-wffahuo.scrollTop<=0)
	wffahuo.scrollTop-=wffahuo1.offsetHeight
	else{
		wffahuo.scrollTop++
	}
}
var MyMar1=setInterval(Marquee1,speeds)
wffahuo.onmouseover=function(){
	clearInterval(MyMar1)
}
wffahuo.onmouseout=function(){
	MyMar1=setInterval(Marquee1,speeds)
}
//////////////////////////// WFORDERJSEND ////////////////////////////