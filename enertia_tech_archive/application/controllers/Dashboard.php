<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->login_lib->verifica_login();
        $this->template->set_template('dashboard');
    }
    
    /*dashboard*/
    public function index(){
     
  	 	$this->template->write_view('content', 'dashboard/index', '', TRUE);
      $this->template->render();
    }

  	/*logout*/
  	public function logout(){
	    $this->load->helper('security');
	    $this->login_lib->check_out();
	    redirect('/');
  	}
 }
 ?>