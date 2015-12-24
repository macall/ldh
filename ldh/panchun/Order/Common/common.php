<?php
// +----------------------------------------------------------------------
// | ThinkPHP
// +----------------------------------------------------------------------
// | Copyright (c) 2007 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: chezhaoyong <chezhaoyong@gmail.com>
// +----------------------------------------------------------------------
// $Id$

//公共函数
function filter_default(&$value){
    $value = htmlspecialchars($value);
}

function getIP() { 

if (getenv('HTTP_CLIENT_IP')) { 

$ip = getenv('HTTP_CLIENT_IP'); 

} 

elseif (getenv('HTTP_X_FORWARDED_FOR')) { 

$ip = getenv('HTTP_X_FORWARDED_FOR'); 

} 

elseif (getenv('HTTP_X_FORWARDED')) { 

$ip = getenv('HTTP_X_FORWARDED'); 

} 

elseif (getenv('HTTP_FORWARDED_FOR')) { 

$ip = getenv('HTTP_FORWARDED_FOR'); 



} 

elseif (getenv('HTTP_FORWARDED')) { 

$ip = getenv('HTTP_FORWARDED'); 

} 

else { 

$ip = $_SERVER['REMOTE_ADDR']; 

} 

return $ip; 

} 

function lib_replace_end_tag($str)
{
if (empty($str)) return false;
$str = htmlspecialchars($str);
$str = str_replace( '/', "", $str);
$str = str_replace("\\", "", $str);
$str = str_replace("&gt", "", $str);
$str = str_replace("&lt", "", $str);
$str = str_replace("<SCRIPT>", "", $str);
$str = str_replace("</SCRIPT>", "", $str);
$str = str_replace("<script>", "", $str);
$str = str_replace("</script>", "", $str);
$str=str_replace("select","select",$str);
$str=str_replace("join","join",$str);
$str=str_replace("union","union",$str);
$str=str_replace("where","where",$str);
$str=str_replace("insert","insert",$str);
$str=str_replace("delete","delete",$str);
$str=str_replace("update","update",$str);
$str=str_replace("like","like",$str);
$str=str_replace("drop","drop",$str);
$str=str_replace("create","create",$str);
$str=str_replace("modify","modify",$str);
$str=str_replace("rename","rename",$str);
$str=str_replace("alter","alter",$str);
$str=str_replace("cas","cast",$str);
$str=str_replace("&","&",$str);
$str=str_replace(">",">",$str);
$str=str_replace("<","<",$str);
$str=str_replace(" ",chr(32),$str);
$str=str_replace(" ",chr(9),$str);
$str=str_replace("    ",chr(9),$str);
$str=str_replace("&",chr(34),$str);
$str=str_replace("'",chr(39),$str);
$str=str_replace("<br />",chr(13),$str);
$str=str_replace("''","'",$str);
$str=str_replace("css","'",$str);
$str=str_replace("CSS","'",$str);
 
return $str;
 
}
 function get_url() {
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
    return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
 }