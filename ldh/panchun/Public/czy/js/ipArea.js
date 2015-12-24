<!--
$i31 = remote_ip_info["country"];
if (typeof($i31) == "undefined") {
	document.write("国外或本机/IANA保留地址");	//
}else{
	document.write($i31+'/'+remote_ip_info["province"]+'/'+remote_ip_info["city"]+'/'+remote_ip_info["isp"]);
}
//-->