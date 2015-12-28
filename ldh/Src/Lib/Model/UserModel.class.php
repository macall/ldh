<?php

class UserModel extends Model 
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function get_user_list($offset = 0, $limit = '')
    {
        $model = new Model();
        
        $sql = 'SELECT 
                    ldh_user.user_id,
                    ldh_user.tel,
                    ldh_user.name,
                    ldh_user.address,
                    ldh_user.created_at,
                    IFNULL(ldh_share.count,0) AS share_count,
                    IFNULL(ldh_tmp_order.order_count,0) AS order_count
                FROM
                    ldh_user 
                LEFT JOIN 
                    (SELECT 
                      user_id,
                      COUNT(order_id) AS order_count 
                    FROM
                        ldh_order 
                    GROUP BY 
                        user_id) AS ldh_tmp_order 
                ON 
                    ldh_user.user_id = ldh_tmp_order.user_id 
                LEFT JOIN 
                    ldh_share 
                ON 
                    ldh_user.user_id = ldh_share.user_id 
                ORDER BY 
                    order_count DESC,
                    share_count DESC';
        
        if(!empty($limit)){
            $sql .= ' limit %d,%d';
        
            return $model->query($sql,array($offset,$limit));
        }
        
        return $model->query($sql);
    }
}

?>