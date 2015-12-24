<?php
class UserAction extends BaseAction
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function login() 
    {
        $user = $this->is_authed();
        if (!empty($user)) {
            redirect('/panchun');
        }
            
        $user_model = M('User');

        if(!empty($_COOKIE['auto_login_cookie'])){
            $auto_login_cookie = $_COOKIE['auto_login_cookie'];
            $data = json_decode(base64_decode($auto_login_cookie));
            $condition = array(
                'tel'       => $data->tel,
                'password'  => $data->password,
                'is_valid'  => 1
            );
            
            $user_data = $user_model->where($condition)->select();
            if(!empty($user_data)){
                $this->redirect('/panchun');
                return;
            }
        }
        if(I('post.')){
            $tel = I('post.tel');
            $password = hash('sha256', I('post.password'));
            
            $condition = array(
                'tel'       => $tel,
                'password'  => $password,
                'is_valid'  => 1
            );
            $user_data = $user_model->where($condition)->select();
            
            if(!empty($user_data)){
                if(I('post.auto_login') == 1){
                    $auto_cookie = base64_encode(json_encode(array('tel'=>$tel,'password'=>I('post.password'))));
                    setcookie('auto_login_cookie', $auto_cookie, 7*24*3600 + time());
                }
                $_SESSION['ldh_user_data'] = $user_data[0];
                $this->json_success_response(array('res'=>'1'));
                return;
            }else{
                $errors['error_mess'] = '手机号码或者密码错误';
                $this->json_error_response($errors);
                exit;
            }
        }
        
        $this->display('login');
    }
    
    public function register_tel() 
    {
        $user = $this->is_authed();
        if (!empty($user)) {
            redirect('/panchun');
        }
        
        $user = M('User');
        
        if (I('post.')) {
            $inputed_code = I('post.verify_code');
            $insert_id = 0;
            if(session('verify_code') == $inputed_code){
                $insert_data['tel'] = I('post.tel');
                $insert_data['created_at'] = date('Y-m-d H:i:s');
                $insert_data['updated_at'] = date('Y-m-d H:i:s');
                
                if($invite_code = I('post.invite_code')){
                    $user->startTrans(); 
                    $insert_id = $user->add($insert_data);
                    
                    //将share表的count+1
                    $share_model = M('Share');
                    $share_condition['invite_code'] = $invite_code;
                    $res = $share_model->where($share_condition)->setInc('count',1);
                    
                    //获取user_id
                    $share_data = $share_model->where($share_condition)->select();
                    $count = intval($share_data[0]['count']);
                    
                    $extra_status = TRUE;//此处便于发放奖励失败进行回滚
                    //如果达到发放奖励的条件
                    if(($count != 0) && ($count%20 == 0)){
                        //获取price_id
                        $price_model = M('price');
                        $price = $price_model->where(array('status' => 1))->limit(1)->select();
                        
                        if(!empty($price)){
                            //发放奖励
                            $price_user_data = array(
                                'price_id' => $price[0]['price_id'],
                                'user_id'=>$share_data[0]['user_id'],
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s')
                            );
                            $price_user = M('Price_user');
                            $price_user_id = $price_user->add($price_user_data);

                            //更新奖品状态,将其标记为已使用
                            $price_update_res = $price_model->data(array('status' => 1))->where($price[0]['price_id'])->save();
                            
                            if(empty($price_user_id) || empty($price_update_res)){
                                $extra_status = FALSE;
                            }
                        }
                    }
                    
                    if(!empty($insert_id) && !empty($res) && !empty($extra_status)){
                        $user->commit();//提交事务
                    }else{
                        $user->rollback();
                    }
                }else{
                    $insert_id = $user->add($insert_data);
                }
                $this->redirect('register_info',array('user_id'=>$insert_id));
            }
        } elseif ($tel = I('get.tel')) {
            //检查手机号是否注册
            $condition['tel'] = $tel;
            $count = $user->where($condition)->count('user_id');
            if(!empty($count)){
                $errors['error_mess'] = '手机号已注册,请勿重复注册';
                $this->json_error_response($errors);
                exit;
            }
            
            // 生成6位短信验证码并发送到手机
            $verify_code = rand(100000, 999999);
            vendor('AliSms.sms');
            $result = sendSMSAli($tel, $verify_code);
            
            $data['res'] = 0;
            if(!empty($result)){
                $data['res'] = 1;
                session('verify_code', $verify_code);
            }
            $this->json_success_response($data);
            exit;
        }
        
        $invite_code = I('get.in_code')?I('get.in_code'):NULL;
        $this->assign('invite_code', $invite_code);
        $this->display('register_tel');
    }

    public function register_info() 
    {
        $user = $this->is_authed();
        if (!empty($user)) {
            redirect('/panchun');
        }
        
        $user_id = $this->_param('user_id')? $this->_param('user_id'):I('get.user_id');
        if(empty($user_id))
        {
            $this->error('地址链接错误！');
        }
        
        $user = M('User');
        $condition['user_id'] = $user_id;
        $data = $user->where($condition)->select();
        if(empty($data))
        {
            $this->error('用户不存在！');
        }
        
        if(I('post.')){
            $user->startTrans(); 
            
            $share = M('Share');
            $share_data = array(
                'user_id' => $user_id,
                'invite_code' => $this->create_invite_code($user_id),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            $share_id = $share->add($share_data);
            
            $update_data['name'] = I('post.name');
            $update_data['address'] = I('post.address');
            $update_data['password'] = hash('sha256', I('post.password'));
            $update_data['updated_at'] = date('Y-m-d H:i:s');
            $res = $user->data($update_data)->where($condition)->save();
            
            if(!empty($share_id) && !empty($res)){
                $user->commit();//提交事务
                $this->redirect('login'); 
                return;
            }else{
                $user->rollback();
            }
        }
        
        $this->assign('user_id', $user_id);
        $this->display('register_info');
    }
    
    public function logout()
    {
        $user = $this->is_authed();
        if (!empty($user)) {
            setcookie("auto_login_cookie", "", time()-3600);
            session_unset('ldh_user_data');
        }
        
        redirect('/panchun');
    }
    
    public function personal_center()
    {
        $user = $this->is_authed();
        if (empty($user)) {
            redirect('/panchun');
        }
        
        $this->display('personal_center');
    }
    
    public function my_share()
    {
        $user = $this->is_authed();
        if (empty($user)) {
            redirect('/panchun');
        }
        $share = M('Share');
        $condition['user_id'] = $user['user_id'];
        $share_data = $share->where($condition)->select();
        $count = intval($share_data[0]['count']);
        $rest_count = intval($count/20)*20+20 - $count;
        $data = array(
            'count' => $count,
            'rest_count' => $rest_count,
            'user_name' => $user['name']
        );
        $base_url = $_SERVER['SERVER_NAME'].__ROOT__.'?in_code='.$share_data[0]['invite_code'];
        $this->assign('share_data', $base_url);
        $this->assign('data', $data);
        $this->display('my_share');
    }
    
    public function my_price()
    {
        $user = $this->is_authed();
        if (empty($user)) {
            redirect('/panchun');
        }
        
        $price_user = D('PriceUser');
        $price_user_data = $price_user->get_user_price_list($user['user_id']);
        
        $this->assign('price_user_data',$price_user_data);
        $this->display('my_price');
    }
    
    public function dingdan()
    {
        $this->display('dingdan');
    }
}
