<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {



	public function __construct()

	{
		parent::__construct();

		$this->load->model(array('User','Main_model'));

		if ($this->session->userdata('login_ok')) {

			redirect('/dashboard');

		}
	}

	/* index*/

	public function index()

	{	

		$data = array();

	 	$this->template->write_view('content', 'login', $data, TRUE);

        $this->template->render();

	}



	/*login to phone number*/
	public function Login_Phone()
	{	
		if (empty($this->input->post('otp'))) {
			return false;
		}
		if($this->input->post("otp") == $this->session->userdata('otp'))  
		{  
			$check = $this->User->get_by_phone($this->input->post('phone'));
			$data = array(
                      'UserLastLogin'  	=> date("Y-m-d H:i:s"),
                    );
	       	$this->User->update($check->UserID, $data);
	       	$this->login_lib->login($check);
		 	$this->output->set_output(json_encode(array('status' => 'true','userdata' => $check)));  
		}  
		else  
		{  
		 	$this->output->set_output(json_encode(array('status' => 'false'))); 
		}  
	}
}