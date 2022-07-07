<?php  
// include('./../controllers/AWS_config.php');
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	aws sms api configuration
*/
	$config['aws_access_key']="AKIAV5MF7IP2AILUQPZT";
	$config['aws_secret_key']="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";



/**
 * 
 */
// class aws_sdk2
// {
	
// public $ci;

// public function __construct() {
//     // $this->CI->load->database();
//     $this->ci = & get_instance();
//     // $this->ci->load->config('aws_sdk');
    
//     $this->ci->db->select('*');
//     $this->ci->db->from('ev_config');
//     $result = $this->ci->db->get()->result();

//     $config['aws_access_key']="'$result[0]->User";
//     $config['aws_secret_key']="$result[0]->AppKey";
// }

// }