<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Provider_Model extends CI_Model {
	
	function __construct() {
		parent::__construct();
    }
	
	/**
	 * Get make by id
	 *
	 * @access public
	 * @return object
	 */
	function get()
	{
		$this->db->select('cm.*');
		$this->db->from('ev_provider as cm');
		return $this->db->get()->result();
	}
	
	/**
	 * Create an ev_provider
	 *
	 * @access public
	 * @return int insert id
	 */
	function create($data)
	{
		$this->db->insert('ev_provider', $data);
		return $this->db->insert_id();
	}
	
	/**
	 * update an ev_provider
	 *
	 * @access public
	 */
	function update($provider_id,$data_arr)
	{
		$this->db->update('ev_provider',$data_arr, array('provider_id' => $provider_id));
                return TRUE;

	}
}