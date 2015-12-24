<?php
// 本类由系统自动生成，仅供测试用途
class BaseAction extends Action 
{
    public function __construct() {
        parent::__construct();
    }
    
    protected function json_success_response($data, $escape_flg = FALSE)
    {
        if ($escape_flg)
        {
            $data = $this->_escape_data($data);
        }
        $res = array(
            'status' => 1,
            'data' => $data
        );

        header('Content-type: application/json');
        echo json_encode($res);exit;
    }
    
    protected function json_error_response($error,$error_url = NULL, $code = RESPONSE_FAIL)
    {
        $res = array(
            'status' => $code,
            'error_message' => $error
        );
        if (!empty($error_url))
        {
            $res['error_url'] = $error_url;
        }

        header('Content-type: application/json');
        echo json_encode($res);
    }
    
    protected function is_authed()
    {
        $user = isset($_SESSION['ldh_user_data']) ? $_SESSION['ldh_user_data'] : FALSE;
        return $user;
    }
    
    protected function is_admin_authed()
    {
        $admin = isset($_SESSION['ldh_admin_data']) ? $_SESSION['ldh_admin_data'] : FALSE;
        return $admin;
    }
    
    private function _escape_data($data)
    {
        if (!is_array($data) || count($data) == 0)
        {
            return $data;
        }

        foreach ($data as $key => $value)
        {
            $html_flg = preg_match('/^html/', $key);
            if (is_array($value))
            {
                $data[$key] = $this->_escape_data($value);
            }
            else if (is_string($value) && !$html_flg)
            {
                $data[$key] = remove_xss(htmlspecialchars($value));
            }
        }
        return $data;
    }
    
    protected function create_invite_code($txtStream, $password = "")
    {
        $lockstream = 'stlDEFABCNOPyzghi_jQRSTUwxkVWXYZabcdefIJK67nopqr89LMmGH012345uv';
        $lockLen = strlen($lockstream);
        $lockCount = rand(0,$lockLen-1);
        $randomLock = $lockstream[$lockCount];
        $password = md5($password.$randomLock);
        $txtStream = base64_encode($txtStream);
        $tmpStream = '';
        $i=0;$j=0;$k = 0;
        for ($i=0; $i<strlen($txtStream); $i++) {
            $k = ($k == strlen($password)) ? 0 : $k;
            $j = (strpos($lockstream,$txtStream[$i])+$lockCount+ord($password[$k]))%($lockLen);
            $tmpStream .= $lockstream[$j];
            $k++;
        }
        $invite_code = $tmpStream.$randomLock;
        $id_len = strlen($invite_code);
        if ($id_len < 11) {
            $c = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            $l = 11 - $id_len;
            $s = "";
            for(; $l > 0; $l--) {
                $s .= $c{rand(0,strlen($c) - 1)};
            }
            $invite_code .= str_shuffle($s);
        }
        return $invite_code;
    }
    
}
