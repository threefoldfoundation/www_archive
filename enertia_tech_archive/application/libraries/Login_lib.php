<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_lib {

    public function verifica_login(){
        $CI =& get_instance();
        if ($CI->session->userdata('login_ok')) {
        	return true;
        }else{
        	redirect('/');
        	return false;
        }
    }
    
	public function login($userdata){
		$userdata = (object) $userdata;
		$CI =& get_instance(); 
		$CI->load->helper('security');
		$datasession = array(
			'UserID'  => $userdata->UserID,
			'UserName' => $userdata->UserName,
			'UserEmail' => $userdata->UserEmail,
			'UserPhone' => $userdata->UserPhone,
			'login_ok' => TRUE
		);
		$CI->session->set_userdata($datasession);
		return 0;
	}
	
	public function check_out(){
		$CI =& get_instance();
		$CI->load->model('user');
		$UserID = $CI->session->userdata('UserID');
		$ahora = date("Y-m-d H:i:s");
		$data = array(
			'UserLastLogin' => $ahora
			);
		$CI->user->update($UserID, $data);
		$CI->session->sess_destroy();
		$CI->session->set_userdata(array('login_ok' => false));
		return 0;
	}
}