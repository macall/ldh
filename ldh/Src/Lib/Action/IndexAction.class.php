<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends BaseAction
{
    public function index() 
    {
        $user = $this->is_authed();
        if (!empty($user)) {
            $this->assign('name', $user['name']);
        }
        $invite_code = I('get.in_code')?I('get.in_code'):NULL;
        if(!empty($invite_code)){
            $this->assign('invite_code', $invite_code);
        }
        $this->display('index');
    }
}
