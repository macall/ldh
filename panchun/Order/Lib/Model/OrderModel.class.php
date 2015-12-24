<?php

class OrderModel extends Model 
{
    protected $_validate = array(
        array('uname', 'require', '请填写收货人！', 1), //1为必须验证
        array('tel', 'require', '请填写手机号！', 1), //1为必须验证
        array('tel', '/1[34578]{1}\d{9}$/', '手机号格式错误', 1, 'regex', 1)
    );
    
    public function get_order_base_info()
    {
        $model = new Model();
        $sql = 'SELECT 
                    total_order.total,
                    done_order.done,
                    pending_order.pending
                FROM   
                    (SELECT 
                        Count(ldh_order.order_id) AS total
                    FROM   
                        ldh_order) AS total_order
                ,
                    (SELECT 
                        Count(ldh_order.order_id) AS done
                    FROM   
                        ldh_order
                    WHERE  
                        ldh_order.status = 2
                    AND 
                        ldh_order.is_valid = 1) AS done_order
                ,
                    (SELECT 
                        Count(ldh_order.order_id) AS pending
                    FROM   
                        ldh_order
                    WHERE  
                        ldh_order.status = 1
                    AND 
                        ldh_order.is_valid = 1) AS pending_order';
        
        return $model->query($sql);
    }
}

?>