<?php

class PriceModel extends Model 
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function get_price_base_info()
    {
        $model = new Model();
        $sql = 'SELECT 
                    total_search.total,
                    used_search.used,
                    unsed_search.unused 
                  FROM
                    (SELECT 
                      COUNT(ldh_price.price_id) AS total 
                    FROM
                      ldh_price) AS total_search 
                  ,
                  (SELECT 
                    COUNT(ldh_price.price_id) AS used 
                  FROM
                    ldh_price 
                  WHERE STATUS = 2) AS used_search 
                  ,
                  (SELECT 
                    COUNT(ldh_price.price_id) AS unused 
                  FROM
                    ldh_price 
                  WHERE STATUS = 1) AS unsed_search';
        
        return $model->query($sql);
    }
}

?>