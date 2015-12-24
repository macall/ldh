<?php

// 订单管理模块
class AdminAction extends BaseAction 
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function index()
    {
        $admin = $this->is_admin_authed();
        if (empty($admin)) {
            redirect('admin_login.html');
        }
        
        $price = D('Price')->get_price_base_info();
        $order = D('Order')->get_order_base_info();
        $user = M('User')->where(array('is_valid'=>1))->count();
        
        $this->assign('price',$price[0]);
        $this->assign('order',$order[0]);
        $this->assign('user',$user);
        
        $this->assign('admin',$admin);
        $this->display();
    }

    public function login()
    {
        $admin = $this->is_admin_authed();
        if (!empty($admin)) {
            redirect('admin_index.html');
        }
        
        if(I('post.')){
            $admin = M('admin');
            $account = I('post.account');
            $password = I('post.password');
            
            $condition = array(
                'account'   => $account,
                'password'  => hash('sha256', $password),
                'is_valid'  => 1
            );
            $admin_data = $admin->where($condition)->select();
            
            if(!empty($admin_data)){
                $_SESSION['ldh_admin_data'] = $admin_data[0];
                redirect('admin_index.html');
            }
            
            $this->assign('error', '账号或者密码错误，请重新输入');
        }
        $this->display();
    }
    
    
    public function admin_order_list()
    {
        $admin = $this->is_admin_authed();
        if (empty($admin)) {
            redirect('admin_login.html');
        }
        
        $this->assign('admin',$admin);
        $this->display();
    }
    
    public function admin_user_list()
    {
        $admin = $this->is_admin_authed();
        if (empty($admin)) {
            redirect('admin_login.html');
        }
        
        $this->assign('admin',$admin);
        $this->display();
    }

    public function logout()
    {
        $user = $this->is_admin_authed();
        if (!empty($user)) {
            session_unset('ldh_admin_data');
        }
        
        redirect('admin_login.html');
    }
}

?>