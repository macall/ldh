<?php

class UserModel extends Model 
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function get_user_list($offset = 0, $limit = ''){
        $model = new Model();
        
        $sql = 'SELECT 
                        ldh_user.user_id,
                        ldh_user.tel,
                        ldh_user.name,
                        ldh_user.address,
                        ldh_user.created_at,
                        ldh_share.count AS share_count,
                        Count(ldh_order.order_id) AS order_count
                    FROM   
                        ldh_user
                    LEFT JOIN 
                        ldh_order
                    ON 
                        ldh_user.user_id = ldh_order.user_id
                    LEFT JOIN 
                        ldh_share
                    ON 
                        ldh_user.user_id = ldh_share.user_id
                    GROUP BY
                        ldh_order.user_id
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