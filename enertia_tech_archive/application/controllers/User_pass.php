<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class User_pass extends CI_Controller{
    function __construct(){
        parent::__construct();
        //$this->check_isvalidated();
    }
    
    public function index(){
		$this->load->view('user_pass');
		
    }
	
	Public function format(){
		$this->load->model("project_model");
		$email = $this->input->post('email');

		$data = array(
		
        'UserEmail' => $email,      
        'UserPass' => md5($this->input->post('password'))
		 );
		 //echo "<pre>";
		 //print_r($data);
		 //die;
		$result = $this->project_model->update($email, $data);
		if($result){
			echo "updated";
			redirect(base_url());
		}else{
			echo "No";
		}
	}
    
 }
 ?>