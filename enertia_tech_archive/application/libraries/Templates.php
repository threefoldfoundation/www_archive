<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Templates {
		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{    
			$this->CI =& get_instance();

			$msg = $this->CI->session->flashdata('msg');
			$this->set('msg', $msg);	

			$type = $this->CI->session->flashdata('type');
			$this->set('type', $type);			

			$userId = $this->CI->session->userdata('userId');
			$this->set('userId', $userId);
			
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($template, $this->template_data, $return);
		}
}