<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CarMake extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('CarModel_Model', 'CarMake_Model'));
  }
  /*get*/
  public function get()
  {  
    $data = $this->CarMake_Model->get();
    $this->output->set_output(json_encode($data));
  }
}