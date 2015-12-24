<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>我的奖品</title>
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <link rel="stylesheet" href="/panchun/templets/css/register_css/style.css">
        <script type="text/javascript" src="/panchun/templets/ct/js/jquery.js"></script>
    </head>
    <style type="text/css">
        .css2 ul li{border-bottom:1px dashed #ddd; padding:10px 35px;}
        .css2 ul li:nth-child(1){border-top:1px solid #ddd}
        .css2 ul li p{padding:10px 0; }
        .css2 ul li p span{width:60px; display: inline-block; text-align: left}
    </style>
    <body>
        <div class="heder dider">
            <h2>我的奖品</h2>
            <a href="personal_center.html"><img src="/panchun/templets/images/icon11_1.png"></a>
        </div>

        <div class="cenuce yuanyz" style="margin:10px 0">
            <?php if(!empty($price_user_data)):?>
            <a href="http://agen.dtvai.com/" style="width:40%;margin: auto;display: block;">领取奖品</a>
            <?php else:?>
            <span style="width:40%;margin: auto;display: block;">当前无奖品</span>
            <?php endif;?>
        </div>
        <div class="cenuce css2">
            <ul>
                <?php if(is_array($price_user_data)): foreach($price_user_data as $key=>$price): ?><li>
                        <p>
                            <span>卡号</span>
                            <i><?php echo ($price["code"]); ?></i>
                        </p>
                        <p>
                            <span>密码</span>
                            <i><?php echo ($price["password"]); ?></i>
                        </p>
                        <p>
                            <span>状态</span>
                            <i>已发放</i>
                        </p>
                    </li><?php endforeach; endif; ?>
            </ul>
        </div>
    </body>
</html>