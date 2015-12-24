<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo (C("sitename")); ?> - 后台系统</title>

        <link href="__PUBLIC__/dwz/themes/default/style.css" rel="stylesheet" type="text/css" />
        <link href="__PUBLIC__/dwz/themes/css/core.css" rel="stylesheet" type="text/css" />
        <!--[if IE]>
        <link href="__PUBLIC__/dwz/themes/css/ieHack.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <style type="text/css">
            #header{height:85px}
            #leftside, #container, #splitBar, #splitBarProxy{top:90px}
        </style>
        <script src="__PUBLIC__/dwz/js/speedup.js" type="text/javascript"></script>
        <script src="__PUBLIC__/dwz/js/jquery-1.7.2.min.js" type="text/javascript"></script>
        <script src="__PUBLIC__/dwz/js/jquery.cookie.js" type="text/javascript"></script>
        <script src="__PUBLIC__/dwz/js/jquery.validate.js" type="text/javascript"></script>
        <script src="__PUBLIC__/dwz/js/jquery.bgiframe.js" type="text/javascript"></script>
        <script src="__PUBLIC__/xheditor/xheditor-1.2.1.min.js" type="text/javascript"></script>
        <script src="__PUBLIC__/xheditor/xheditor_lang/zh-cn.js" type="text/javascript"></script>
        <script src="__PUBLIC__/dwz/js/dwz.min.js" type="text/javascript"></script>
        <script src="__PUBLIC__/dwz/js/dwz.regional.zh.js" type="text/javascript"></script>

        <script type="text/javascript">
            function fleshVerify() {
                //重载验证码
                $('#verifyImg').attr("src", '__APP__/Public/verify/' + new Date().getTime());
            }
            function dialogAjaxMenu(json) {
                dialogAjaxDone(json);
                if (json.statusCode == DWZ.statusCode.ok) {
                    //扩展
                    var menuTag = $("#navMenu .selected").attr('menu');
                    $("#sidebar").loadUrl("__GROUP__/Public/menu/menu/" + menuTag);
                }
            }

            function navTabAjaxMenu(json) {
                navTabAjaxDone(json);
                if (json.statusCode == DWZ.statusCode.ok) {
                    //扩展
                    var menuTag = $("#navMenu .selected").attr('menu');
                    $("#sidebar").loadUrl("__GROUP__/Public/menu/menu/" + menuTag);
                }
            }


            function navTabAjaxGroupMenu(json) {
                navTabAjaxDone(json);
                if (json.statusCode == DWZ.statusCode.ok) {
                    //扩展
                    var menuTag = $("#navMenu .selected").attr('menu');
                    $("#sidebar").loadUrl("__GROUP__/Public/menu/menu/" + menuTag);
                }
            }



            $(function () {
                DWZ.init("__PUBLIC__/dwz/dwz.frag.xml", {
                    loginUrl: "__APP__/Public/login_dialog", loginTitle: "登录", // 弹出登录对话框
                    statusCode: {ok: 1, error: 0},
                    pageInfo: {pageNum: "pageNum", numPerPage: "numPerPage", orderField: "_order", orderDirection: "_sort"}, //【可选】
                    debug: false, // 调试模式 【true|false】
                    callback: function () {
                        initEnv();
                        $("#themeList").theme({themeBase: "__PUBLIC__/dwz/themes"});
                    }
                });
            });
        </script>
    </head>
    <body scroll="no">
        <div id="layout">
            <div id="header">
                <div class="headerNav">
                    <a class="logo" href="__APP__">Logo</a>
                    <ul class="nav">
                        <li><a href="###">管理员</a></li>
                        <li><a href="__APP__/Public/logout/">退出</a></li>
                    </ul>
                </div>
                <div id="navMenu">
                </div>
            </div>
        </div>
        <div id="footer">Copyright &copy; 2014 左右互联订单管理系统</div>
    </body>
</html>