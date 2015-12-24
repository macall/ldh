<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>我的分享</title>
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <link rel="stylesheet" href="/panchun/templets/css/register_css/style.css">
        <script type="text/javascript" src="/panchun/templets/ct/js/jquery.js"></script>
    </head>
    <body>
        <div class="heder dider">
            <h2>我的分享</h2>
            <a href="personal_center.html"><img src="/panchun/templets/images/icon11_1.png"></a>
        </div>
        <div class="cenuce yuanyz">
            <ul>
                <li>
                    当前用户<i><?php echo ($data['user_name']); ?></i>
                    已成功分享<i><?php echo ($data['count']); ?>次</i>，
                    <?php  if(($data['count'] != 0) && ($data['count']%20 == 0)){ echo '已有新奖品发放，请去我的奖励查看。下一次'; } ?>
                    还差<i><?php echo ($data['rest_count']); ?>次</i>
                    即可领取奖品,复制以下链接分享到朋友圈继续加油吧！
                    <br>
                    <br>
                    <span style="margin: auto;display: block; background-color: #2e8116;color: #fff"><?php echo ($share_data); ?></span>
                </li>
            </ul>
        </div>
    </body>
</html>