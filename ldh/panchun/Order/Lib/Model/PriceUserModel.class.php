<?php

class PriceUserModel extends Model 
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function get_user_price_list($user_id){
        $model = new Model();
        $condition['user_id'] = $user_id;
        
        $list = $model->table('ldh_price_user')
                      ->field('ldh_price.code,ldh_price.password,ldh_price_user.price_id')
                      ->join('ldh_price ON ldh_price_user.price_id = ldh_price.price_id')
                      ->where($condition)
                      ->select();
        
        return $list;
    }
}

?>