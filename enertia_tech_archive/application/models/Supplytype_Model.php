<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplytype_Model extends CI_Model {
	
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
		$this->db->from('ev_supplytype as cm');
		return $this->db->get()->result();
	}
	
	/**
	 * Create an ev_supplytype
	 *
	 * @access public
	 * @return int insert id
	 */
	function create($data)
	{
		$this->db->insert('ev_supplytype', $data);
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
		$this->db->select('GROUP_CONCAT(ev_supplytype.supplytype ORDER BY ev_supplytype.supply_id) as supplytype');
		$this->db->from('ev_supplytype');
		$this->db->where_in('supply_id', $ids,FALSE);
		$this->db->order_by('supplytype', 'asc');
		return $this->db->get()->row();
	}
	/**
	 * update an ev_supplytype
	 *
	 * @access public
	 */
	function update($supply_id,$data_arr)
	{
		$this->db->update('ev_supplytype',$data_arr, array('supply_id' => $supply_id));
                return TRUE;

	}
}