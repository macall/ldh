<?php

// 订单管理模块
class ShareAction extends BaseAction 
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
        $user = $this->is_authed();
        if (!empty($user)) {
            $this->assign('name', $user['name']);
        }
    }
}

?>