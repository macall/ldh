<?php

// 订单管理模块
class OrderAction extends BaseAction 
{
    // 插入数据
    public function insert() 
    {
        header('Content-type:text/html; charset=utf-8');
        
        //创建数据对象
        $order = D("Order");
        $condition['product'] = I('post.product');
        $condition['uname'] = I('post.uname');
        $condition['tel'] = I('post.tel');
        $condition['status'] = 1;
        $isorder = $order->where($condition)->count();
        if ($isorder > 1) {
            $this->error('Sorry,您已经下过订单了,请勿重复提交! ');
            exit;
        }
        if (!$order->create()) {
            $this->error($order->getError());
            exit;
        }
        
        $data = array();
        $data['product'] = $condition['product'];
        switch ($condition['product']) {
            case 1:
                $data['remark'] = '净颜梅体验装1盒 168元';
                $data['number'] = 1;
                break;
            case 2:
                $data['remark'] = '净颜梅一周期2盒送1盒 336元';
                $data['number'] = 2;
                break;
            case 3:
                $data['remark'] = '净颜梅二周期6盒送2盒 828元';
                $data['number'] = 6;
                break;
            case 4:
                $data['remark'] = '净颜梅三周期9盒送3盒 1018元';
                $data['number'] = 9;
                break;
            default:
                $data['remark'] = '';
                break;
        }
        
        $data['user_id'] = (($user = $this->is_authed())?$user['user_id']:NULL);
        $data['tel'] = $condition['tel'];
        $data['qq'] = I('post.qq');
        $data['uname'] = lib_replace_end_tag($condition['uname']);
        $data['province'] = I('post.province');
        $data['city'] = I('post.city');
        $data['dist'] = I('post.dist');
        $data['address'] = I('post.address');
        $data['pay'] = I('post.pay');
        $data['message'] = I('post.message');
        $ip = get_client_ip();
        $array = explode(",", $ip);
        $data['ip'] = $array[0];
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $result = $order->add($data);
        //写入订单数据
        if ($result) {
            $this->success('<img src="/public/success.gif">下单成功');
        } else {
            //错误提示
            $this->error('<img src="Public/czy/images/failed.png">下单失败! ');
            exit;
        }
    }

}

?>