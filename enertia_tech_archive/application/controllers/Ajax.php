<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax extends CI_Controller {



	/**

	 * Constructor

	 */

	function __construct()

  	{
    	parent::__construct();
		$this->load->model( array("user", "Main_model", "Plugtype_Model", "Power_Model") );
		$this->load->model("AccessType_Model");
		$this->load->model("Payment_Model");
		// $this->load->model("Plugtype_Model");
		$this->load->model("Point_Model");
		// $this->load->model("Power_Model");
		$this->load->model("Provider_Model");
		$this->load->model("Supplytype_Model");
		$this->load->model("Voltage_Model");  
		$this->load->library('Aws_sdk');
  	}



  	/**

	 * is check email

	 */

	function email(){

	   if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  

	   {  

			echo '<label class="text-danger"><i class="fa fa-times"></i></label>';  

	   }  

	   else  

	   {  

			if($this->Main_model->is_email_available($_POST["email"]))  

			{  

				 echo '<label class="text-danger"><i class="fa fa-times"></i></label>';  

			}  

			else  

			{  

				 echo '<label class="text-success"><i class="fa fa-check"></i></label>';  

			}  

	   } 

	}



	/**

	 * is check phone

	 */

	function phone(){

		if($this->Main_model->is_phone_available($_POST["phone"]))  

		{  

			 echo '<label class="text-danger"><i class="fa fa-times"></i></label>';  

		}  

		else  

		{  

			 echo '<label class="text-success"><i class="fa fa-check"></i></label>';  

		}  

	}

	/**

	 * is login check phone

	 */

	function login_check_phone(){
		$checkphonenumber = $this->user->get_by_phone($this->input->post('phone'));
		if(count((array) $checkphonenumber) > 0)  
		{  
		 	$this->output->set_output(json_encode(array('status' => 'true','userdata' => $checkphonenumber)));  
		}  
		else  
		{  
		 	$this->output->set_output(json_encode(array('status' => 'false'))); 
		} 
	}



	/**

	 * is check otp

	 */

	function is_otp_available(){

		if($this->input->post("otp") == $this->session->userdata('otp'))  
		{  

		 	$this->output->set_output(json_encode(array('status' => 'true')));  
		}  
		else  
		{  
		 	$this->output->set_output(json_encode(array('status' => 'false'))); 
		}  
	}



	/* Function for send sms */

	function send_otp($mobile){
		// $data = array();
		// $userdata = $this->user->get_by_id($UserID);
		// if ($userdata->UserOTP == '') {
			echo $otp = rand(1000,9999);
			$this->session->set_userdata('otp',$otp);

			// $this->session->set_userdata('User', $result[0]['User']);
			// $this->session->set_userdata('AppKey', $result[0]['AppKey']);

			// $data_arr=array(
			// 	'UserOTP' => $otp,
			// 	);
			
			// $this->user->update($UserID,$data_arr);
			// $mobile = $userdata->UserPhone;
			$awssendmsgoutput = $this->aws_sdk->SendPushNotification($otp,$mobile);
			$this->output->set_output($awssendmsgoutput); 
		// }
	}

	/*get cuntry code for phone number*/

	function getcuntrycode($user_ip)

	{	

		$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));

		echo json_encode($geo['geoplugin_countryCode']);

	}

	/*Get Lat Long using ip address*/
	function GetLatLong($user_ip)
	{	
		$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
		if (!empty($geo)) {
			
			echo  json_encode( array('geoplugin_latitude' => (float)$geo['geoplugin_latitude'], 'geoplugin_longitude' => (float)$geo['geoplugin_longitude'] ));
		}else{
			echo json_encode(array('geoplugin_status' => '500'));
		}
	}

	/*get ev_plugtype*/
	public function get_plugtype()
	{
		$plugtype = $this->Plugtype_Model->get();
		if (count((array) $plugtype) > 0) {  
		 	$this->output->set_output(json_encode(array('status' => 'true','data' => $plugtype)));  
		} else {  
		 	$this->output->set_output(json_encode(array('status' => 'false'))); 
		}
	}
	/*get ev_power*/
	public function get_power()
	{
		$Power = $this->Power_Model->get();
		if (count((array) $Power) > 0) {  
		 	$this->output->set_output(json_encode(array('status' => 'true','data' => $Power)));  
		} else {  
		 	$this->output->set_output(json_encode(array('status' => 'false'))); 
		}
	}

	// Get stations fields for show in add station form
	public function GetFields() {
		$result['provider'] = $this->Provider_Model->get();
		$result['payment'] = $this->Payment_Model->get();
		$result['access_type'] = $this->AccessType_Model->get();
		$result['plug_type'] = $this->Plugtype_Model->get();
		$result['power'] = $this->Power_Model->get();
		$result['supply_type'] = $this->Supplytype_Model->get();
		$result['current_voltage'] = $this->Voltage_Model->get();
		$result['points'] = $this->Point_Model->get();
		print_r(json_encode($result));
	}
}

?>