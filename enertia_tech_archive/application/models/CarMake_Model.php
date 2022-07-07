<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CarMake_Model extends CI_Model {
	
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
		$this->db->from('car_make as cm');
		return $this->db->get()->result();
	}
	
	/**
	 * Create an car_make
	 *
	 * @access public
	 * @return int insert id
	 */
	function create($data)
	{
		$this->db->insert('car_make', $data);
		return $this->db->insert_id();
	}
	
	/**
	 * update an car_make
	 *
	 * @access public
	 */
	function update($makeID,$data_arr)
	{
		$this->db->update('car_make',$data_arr, array('makeID' => $makeID));
                return TRUE;

	}
}