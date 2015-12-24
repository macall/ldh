
<meta charset="utf-8">
<form action="" method="post">
<input type="text" id="phone" style="padding:5px;font-size:16px" value="13131931531" name='phone'><br>
<input type="submit" value="立即发送" id="submit" name='submit'>
</form>
<?php
if(isset($_POST['submit'])){
    $mobile = $_POST['phone'];
	
	// 生成6位短信验证码
	$mobile_code = rand(100000,999999);
    include("sms.php");
	/* 发送激活验证邮件 */

	echo "手机号：".$mobile.'<br>';
	echo "验证码：".$mobile_code.'<br>';
	$result = sendSMSAli($mobile, $mobile_code);
	//接收返回结果并提示
	if($result){
		echo '恭喜！短信发送成功';}
		else{
		echo '对不起，短信验证码发送失败';
	        }

	
}
