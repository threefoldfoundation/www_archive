<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voltage_Model extends CI_Model {
	
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
		$this->db->from('ev_voltage as cm');
		return $this->db->get()->result();
	}
	
	/**
	 * Create an ev_voltage
	 *
	 * @access public
	 * @return int insert id
	 */
	function create($data)
	{
		$this->db->insert('ev_voltage', $data);
		return $this->db->insert_id();
	}
	/**
	 * Get  by id
	 *
	 * @access public
	 * @return object
	 */
	function get_multipal($ids)
	{
		$this->db->select('GROUP_CONCAT(ev_voltage.voltage ORDER BY ev_voltage.voltage_id) as voltage');
		$this->db->from('ev_voltage');
		$this->db->where_in('voltage_id', $ids,FALSE);
		$this->db->order_by('voltage', 'asc');
		return $this->db->get()->row();
	}
	/**
	 * update an ev_voltage
	 *
	 * @access public
	 */
	function update($voltage_id,$data_arr)
	{
		$this->db->update('ev_voltage',$data_arr, array('voltage_id' => $voltage_id));
                return TRUE;

	}
}