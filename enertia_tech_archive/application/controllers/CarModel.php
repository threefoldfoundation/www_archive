<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CarModel extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('CarModel_Model', 'CarMake_Model'));
    // $this->load->library(array('REST_Controller'));
  }
  /*get*/
	public function get($makeID=null)
	{  
    if ($makeID != '') {
      $data = $this->CarModel_Model->get_by_makeID($makeID);
    }else{
      $data = $this->CarModel_Model->get();
    }
    $this->output->set_output(json_encode($data));
	}
}