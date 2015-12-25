<?php
$siteconfig	=	require './Manager/siteconfig.inc.php';
$db	=	require './Manager/Conf/db.php';
$config	= array(
	/*
	 * 0:普通模式 (采用传统癿URL参数模式 )
	 * 1:PATHINFO模式(http://<serverName>/appName/module/action/id/1/)
	 * 2:REWRITE模式(PATHINFO模式基础上隐藏index.php)
	 * 3:兼容模式(普通模式和PATHINFO模式, 可以支持任何的运行环境, 如果你的环境不支持PATHINFO 请设置为3)
	 */
    'URL_MODEL'=>2,
    'URL_HTML_SUFFIX'=>'shtml|html|xml',
	'APP_AUTOLOAD_PATH'=>'@.TagLib',
	'SESSION_AUTO_START'=>true,
    'HTML_CACHE_ON' => true, // 开启静态缓存
    'URL_CASE_INSENSITIVE' =>true,//允许模块首字母大小写
            
    'URL_ROUTER_ON' => true, // 开启路由转换
    'URL_ROUTE_RULES' => array(
        'default'=> array('Index/index', 'status=1'),
        'login' => 'User/login',
        'register_tel' => 'User/register_tel',
        'register_info' => 'User/register_info',
        'logout' => 'User/logout',
        'personal_center' => 'User/personal_center',
        'my_share' => 'User/my_share',
        'my_price' => 'User/my_price',
        'admin/login'=>'Admin/login',
        'admin/index'=>'Admin/index',
        'admin/logout'=>'Admin/logout',
        'admin/order_list'=>'Admin/admin_order_list',
        'admin/user_list'=>'Admin/admin_user_list',
        'admin/order_list_export'=>'Admin/order_list_export_excel',
        'admin/user_list_export'=>'Admin/user_list_export_excel',
        'admin/update_order_status'=>'Admin/update_order_status',
    ),
	'VAR_PAGE'=>'page',
	'PAGE_LISTROWS'=>15,  //分页 每页显示多少条
	'PAGE_NUM_SHOWN'=>10, //分页 页标数字多少个
    /* 错误页面模板 */
	'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',
	'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',
	'USER_AUTH_ON'=>true,
	'USER_AUTH_TYPE'=>1,		// 默认认证类型 1 登录认证 2 实时认证
	'USER_AUTH_KEY'=>'studentId',	// 用户认证SESSION标记
    'ADMIN_AUTH_KEY'=>'adminstudent',
	'USER_AUTH_MODEL'=>'Student',	// 默认验证数据表模型
	'AUTH_PWD_ENCODER'=>'md5',	// 用户认证密码加密方式
	'USER_AUTH_GATEWAY'=>'/Public/login',	// 默认认证网关
	'NOT_AUTH_MODULE'=>'Public',		// 默认无需认证模块
	'REQUIRE_AUTH_MODULE'=>'',		// 默认需要认证模块
	'NOT_AUTH_ACTION'=>'',		// 默认无需认证操作
	'REQUIRE_AUTH_ACTION'=>'',		// 默认需要认证操作
    'GUEST_AUTH_ON'=>false,    // 是否开启游客授权访问
    'GUEST_AUTH_ID'=>0,     // 游客的用户ID
    'DB_LIKE_FIELDS'=>'title|remark',
	'VAR_FILTERS'=>'filter_default,filter_exp,stripslashes,strip_tags',
	'TOKEN_ON'=>true,  // 是否开启令牌验证
	'TOKEN_NAME'=>'__hash__',    // 令牌验证的表单隐藏字段名称
	'TOKEN_TYPE'=>'md5',  //令牌哈希验证规则 默认为MD5
	'TOKEN_RESET'=>true,  //令牌验证出错后是否重置令牌 默认为true
	'DEFAULT_FILTER' => 'htmlspecialchars,strip_tags',
    'DEFAULT_TIMEZONE' => 'Asia/Shanghai', //设置时区	

);

return array_merge($config,$siteconfig,$db);

?>
