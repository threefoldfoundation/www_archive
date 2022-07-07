<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class User_format extends CI_Controller{
    function __construct(){
        parent::__construct();
        //$this->check_isvalidated();
    }
    
    public function index(){
		$this->load->view('user_format');
		
    }
	
	Public function format(){
		
		$email = $this->input->post('email');
		$link = base_url().'index.php/user_pass?email='.$email;
		$this->load->library('email');  	//load email library
      $this->email->from('info@atw.green', 'Enertia.io'); //sender's email
      $address = $email;	//receiver's email
      $subject="Notif";	//subject
	  
      $message= /*-----------email body starts-----------*/
        'useremail '.$email.
		
		'<br> Link '.$link;
		/*-----------email body ends-----------*/		      
      $this->email->to($address);
      $this->email->subject($subject);
      $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
      $this->email->set_header('Content-type', 'text/html');
      $this->email->message($message);
      if($this->email->send()){
		  echo 'Email Send';
		  redirect('user_format');
	  }
	}
    
 }
 ?>