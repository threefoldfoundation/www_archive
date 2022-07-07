<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AccessType_Model extends CI_Model {
	
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
		$this->db->from('ev_accesstype as cm');
		return $this->db->get()->result();
	}
	
	/**
	 * Create an ev_accesstype
	 *
	 * @access public
	 * @return int insert id
	 */
	function create($data)
	{
		$this->db->insert('ev_accesstype', $data);
		return $this->db->insert_id();
	}
	
	/**
	 * update an ev_accesstype
	 *
	 * @access public
	 */
	function update($accesstype_id,$data_arr)
	{
		$this->db->update('ev_accesstype',$data_arr, array('accesstype_id' => $accesstype_id));
                return TRUE;

	}
}