<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Power_Model extends CI_Model {
	
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
		$this->db->from('ev_power as cm');
		return $this->db->get()->result();
	}
	
	/**
	 * Create an ev_power
	 *
	 * @access public
	 * @return int insert id
	 */
	function create($data)
	{
		$this->db->insert('ev_power', $data);
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
		$this->db->select('GROUP_CONCAT(ev_power.power ORDER BY ev_power.power_id) as power');
		$this->db->from('ev_power');
		$this->db->where_in('power_id', $ids,FALSE);
		$this->db->order_by('power', 'asc');
		return $this->db->get()->row();
	}
	/**
	 * update an ev_power
	 *
	 * @access public
	 */
	function update($power_id,$data_arr)
	{
		$this->db->update('ev_power',$data_arr, array('power_id' => $power_id));
                return TRUE;

	}
}