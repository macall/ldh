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
            redirect(__APP__.'/admin/login.html');
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
            redirect(__APP__.'/admin/index.html');
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
                redirect(__APP__.'/admin/index.html');
            }
            
            $this->assign('error', '账号或者密码错误，请重新输入');
        }
        $this->display();
    }
    
    
    public function admin_order_list()
    {
        $admin = $this->is_admin_authed();
        if (empty($admin)) {
            redirect(__APP__.'/admin/login.html');
        }
        
        $order = D('Order');
        $order_all = $order->get_order_list();
        $order_count = count($order_all);
        
        import('ORG.Util.Page');// 导入分页类
        $page = new Page($order_count,'','','admin/order_list');
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','末页');
        $page->setConfig('theme','%first% %upPage% %linkPage% %downPage% %end%');
        $show = $page->show();// 分页显示输出
        
        $offset = I('page')?(I('page')-1)*($page->listRows):0;
        $order_list = $order->get_order_list($offset,$page->listRows);
        
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('order_list',$order_list);// 赋值数据集
        
        $this->assign('admin',$admin);
        $this->display();
    }
    
    public function admin_user_list()
    {
        $admin = $this->is_admin_authed();
        if (empty($admin)) {
            redirect(__APP__.'/admin/login.html');
        }
        
        $user = D('User');
        $user_all = $user->get_user_list();
        $user_count = count($user_all);
        
        import('ORG.Util.Page');// 导入分页类
        $page = new Page($user_count,'','','admin/user_list');
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','末页');
        $page->setConfig('theme','%first%  %prePage%  %linkPage%  %nextPage% %end%');
        $show = $page->show();// 分页显示输出
        
        $offset = I('page')?(I('page')-1)*($page->listRows):0;
        
        $user_list = $user->get_user_list($offset,$page->listRows);
        
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('user_list',$user_list);// 赋值数据集
        $this->assign('admin',$admin);
        $this->display();
    }

    public function user_list_export_excel()
    {
        $admin = $this->is_admin_authed();
        if (empty($admin)) {
            redirect(__APP__.'/admin/login.html');
        }
        
        $xls_cell = array(
            array('user_id', '用户ID'),
            array('name', '姓名'),
            array('tel', '电话'),
            array('address', '地址'),
            array('created_at', '注册时间'),
            array('share_count', '成功分享次数'),
            array('order_count', '购买件数')
        );
        
        $user_list = D('User')->get_user_list();
        
        $title = date('Y年m月d日').'截止,钰盈堂净颜梅用户列表详情';
        $file_name = '钰盈堂净颜梅用户列表-'.date('Y-m-d');
        
        $this->_exportExcel($title,$xls_cell,$user_list,$file_name);
    }
    
    public function order_list_export_excel()
    {
        $admin = $this->is_admin_authed();
        if (empty($admin)) {
            redirect(__APP__.'/admin/login.html');
        }
        
        $xls_cell = array(
            array('order_id', '订单编号'),
            array('user_name', '用户'),
            array('remark', '产品'),
            array('buyer_address', '送货地址'),
            array('uname', '收货人'),
            array('tel', '联系电话'),
            array('qq', 'QQ号码'),
            array('message', '用户留言'),
            array('created_at', '下单时间'),
            array('status', '订单状态')
        );
        
        $order_list = D('Order')->get_order_list();
        
        $excel_data = array();
        foreach ($order_list as $order) {
            if(empty($order['user_id'])){
                $order['user_name'] = '游客购买';
            }
            
            if($order['status'] == 1){
                $order['status'] = '未处理';
            }else{
                $order['status'] = '已处理';
            }
            
            $excel_data[] = $order;
        }
        $title = date('Y年m月d日').'截止,钰盈堂净颜梅订单列表详情';
        $file_name = '钰盈堂净颜梅订单列表-'.date('Y-m-d');
        
        $this->_exportExcel($title,$xls_cell,$excel_data,$file_name);
    }

    public function logout()
    {
        $user = $this->is_admin_authed();
        if (!empty($user)) {
            session_unset('ldh_admin_data');
        }
        
        redirect(__APP__.'/admin/login.html');
    }
    
    public function update_order_status()
    {
        $user = $this->is_admin_authed();
        if (empty($user)) {
            $this->json_error_response('no permission to do this operation!');
            return;
        }
        
        $order_id = I('post.order_id');
        if(empty($order_id)){
            $this->json_error_response('wrong order id!');
            return;
        }
        
        $res = M('Order')
                ->data(array('status'=>2,'updated_at' => date('Y-m-d H:i:s')))
                ->where(array('order_id'=>$order_id))->save();
        
        if(!empty($res)){
            $data['res'] = 1;
            $this->json_success_response($data);
            return;
        }
    }

    public function _exportExcel($expTitle, $expCellName, $expTableData, $fileName) 
    {
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle); //文件名称
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        vendor('Excel.PHPExcel');

        $objPHPExcel = new PHPExcel();
        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:' . $cellName[$cellNum - 1] . '1'); //合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle);  
        
        for ($i = 0; $i < $cellNum; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i] . '2', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8   
        for ($i = 0; $i < $dataNum; $i++) {
            for ($j = 0; $j < $cellNum; $j++) {
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j] . ($i + 3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }

        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsTitle . '.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls"); //attachment新窗口打印inline本窗口打印
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

}

?>