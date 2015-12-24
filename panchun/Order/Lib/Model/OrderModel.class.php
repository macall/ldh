<?php

class OrderModel extends Model 
{
    //protected $insertFields = 'uname,tel,number,address';
    // 自动验证设置
    protected $_validate = array(
        array('uname', 'require', '请填写收货人！', 1), //1为必须验证
        array('tel', 'require', '请填写手机号！', 1), //1为必须验证
        array('tel', '/1[34578]{1}\d{9}$/', '手机号格式错误', 1, 'regex', 1),
//        array('number', 'require', '请填写购买数量！', 1), //1为必须验证
            /*      array('title', '', '标题已经存在', 0, 'unique', self::MODEL_INSERT),
              array('content', 'require', '内容必须'), */
    );
}

?>