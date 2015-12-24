<?php


function sendSMSAli($mobile, $mobile_code, $time = '', $mid = ''){

	include "TopSdk.php";
	$c = new TopClient;
	$c->appkey = "23278568";//这里填写您申请的appkey
	$c->secretKey = "87410133aa8ab0cdfd2ba521209a3793";//这里填写您申请的secretKey
	$req = new AlibabaAliqinFcSmsNumSendRequest;
	$req->setExtend("123456");//填写什么都可以
	$req->setSmsType("normal");//短信类型，不用修改
	$req->setSmsFreeSignName("注册验证");//这里填写短信签名
	$req->setSmsParam("{\"code\":\"$mobile_code\",\"product\":\"钰盈堂净颜梅\"}");//按要求引入变量
	$req->setRecNum($mobile);//接收短信的手机变量
	$req->setSmsTemplateCode("SMS_2950020");//这里填写短信模板编号
	$resp = $c->execute($req);
	$reArray=xmlToArray($resp);
//返回结果
	if(isset($reArray["code"]) && $reArray["code"] >0){
		return false;
	}else{
		return true;
	}
}

	
 function xmlToArray($xml)
{
	//将XML转为array
	$array_data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
	return $array_data;
}


?>

