<?php
// 组织关系管理模块
class OrganizeAction extends CommonAction {
	function _filter(&$map)    {
        if ($_POST['d_time']) {
            $map['d_time'] = array('egt',strtotime($_POST['d_time1']));
            $map['d_time'] = array('elt',strtotime($_POST['d_time2']));
        }
        if ($_POST['jsr_1']) {
        	$map['jsr_1'] = array('like', "%" . $_POST['jsr_1'] . "%");
        }
        if ($_POST['account'] ||$_POST['nickname'] || $_POST['class_id'] || $_POST['dormitory_id'] || $_POST['gender']) {
			if ($_POST['account']) {
                $map2['account'] = array('like', "%" . $_POST['account'] . "%");
            }
            if ($_POST['nickname']) {
                $map2['nickname'] = array('like', "%" . $_POST['nickname'] . "%");
            }
            if ($_POST['gender']) {
                $map2['gender'] = array('like',"%" . $_POST['gender'] . "%");
            }
            if ($_POST['class_id']) {
                $map2['class_id'] = array('eq',$_POST['class_id']);
            }
            if ($_POST['dormitory_id']) {
                $map2['dormitory_id'] = array('eq',$_POST['dormitory_id']);
            }
            $ids = M('Student') -> where($map2)->select();
            foreach ($ids as $key => $value) {
                $idss[] = $value['id'];
            }
            $map['sid'] = array('in',$idss);
        }
    }
    
	 public function _before_index(){
        $class = M("Classes")->where('status=1')->select();
        $this->assign('class',$class);
    }
	 public function _before_add(){
		$jindu = M("Honorrulls")->where('status=1')->select();
        $this->assign('jindu',$jindu);
		$zhuanye = M("Zhuanye")->where('status=1')->select();
        $this->assign('zhuanye',$zhuanye);
    }
	 public function _before_edit(){
		$jindu = M("Honorrulls")->where('status=1')->select();
        $this->assign('jindu',$jindu);
		$zhuanye = M("Zhuanye")->where('status=1')->select();
        $this->assign('zhuanye',$zhuanye);
    }	
	public function add(){
        $class = M("Classes")->where('status=1')->select();
        $this->assign('class',$class);
        $this->display ();
    }

    public function edit(){
        $name=$this->getActionName();
        $model = M ( $name );
        $id = $_REQUEST [$model->getPk ()];
        $vo = $model->getById ( $id );
        $this->assign ( 'vo', $vo );
        $userinfo = M("Student")->where('id='.$vo['sid'])->find();
        $this->assign('userinfo',$userinfo);
        $this->display ();
    }

    public function look(){
        $name=$this->getActionName();
        $model = M ( $name );
        $id = $_REQUEST [$model->getPk ()];
        $vo = $model->getById ( $id );
        $this->assign ( 'vo', $vo );
        $userinfo = M("Student")->where('id='.$vo['sid'])->find();
        $this->assign('userinfo',$userinfo);
        $this->display ();
    }
/**导出EXCEL**/

     public function exportExcel($expTitle,$expCellName,$expTableData){
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $_SESSION['account'].date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        vendor("Excel.PHPExcel");
       
        $objPHPExcel = new PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
       // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));  
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]); 
        } 
          // Miscellaneous glyphs, UTF-8   
        for($i=0;$i<$dataNum;$i++){
          for($j=0;$j<$cellNum;$j++){
            $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
          }             
        }  
        
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
        $objWriter->save('php://output'); 
        exit;   
    }
/**
     *
     * 导出Excel
     */
    function excel(){//导出Excel
        $xlsName  = "organize";
        $xlsCell  = array(
        array('id','编号'),
        array('uname','名字'),
        array('product','订购产品'),
        array('status','状态'),
        array('tel','联系电话'),
		array('province','省'),
		array('city','市'),
		array('dist','县'),
		array('address','详细地址'),
		array('create_time','订购时间'),
		array('message','留言'),
        array('remark','备注')     
        );
        $xlsModel = M('organize');
    
        $xlsData  = $xlsModel->Field('id,uname,product,status,tel,province,city,dist,address,create_time,message,remark')->select();
         foreach ($xlsData as $k => $v)
        {
            $xlsData[$k]['create_time']=date('Y-m-d H:m:s',$v['create_time']);
        } 
        $this->exportExcel($xlsName,$xlsCell,$xlsData);
         
    }
	// 插入数据
	public function insert() {
		// 创建数据对象
		$_POST['sid'] = $_POST['orgLookup_sid'];
		$_POST['d_time'] = strtotime($_POST['d_time']);
		$_POST['j_time'] = strtotime($_POST['j_time']);
		$_POST['create_time'] = time();
		$User	 =	 D("Organize");
		if(!$User->create()) {
			$this->error($User->getError());
		}else{
			// 写入数据
			if($result	 =	 $User->add()) {
				$this->success('订单添加成功！');
			}else{
				$this->error('订单添加失败！');
				//echo  D("Organize")->getLastSql();
			}
		}
	}   

	 public function update() {
		$_POST['d_time'] = strtotime($_POST['d_time']);
		$_POST['j_time'] = strtotime($_POST['j_time']);
        $name=$this->getActionName();
        $model = CM( $name );
        if (false === $model->create ()) {
            $this->error ( $model->getError () );
        }
        // 更新数据
        $list=$model->save ();
        if (false !== $list) {
            //成功提示
            $this->assign ( 'jumpUrl', Cookie::get ( '_currentUrl_' ) );
            $this->success ('编辑成功!');
        } else {
            //错误提示
            $this->error ('编辑失败!');
        }
    }
 
}
?>