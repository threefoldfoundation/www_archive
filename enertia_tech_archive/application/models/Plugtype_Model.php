<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plugtype_Model extends CI_Model {
	
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
		$this->db->from('ev_plugtype as cm');
		$this->db->order_by('plug_type', 'asc');
		return $this->db->get()->result();
	}
	
	/**
	 * Create an ev_plugtype
	 *
	 * @access public
	 * @return int insert id
	 */
	function create($data)
	{
		$this->db->insert('ev_plugtype', $data);
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
		$this->db->select('GROUP_CONCAT(ev_plugtype.plug_type ORDER BY ev_plugtype.plugtype_id) as plug_type');
		$this->db->from('ev_plugtype');
		$this->db->where_in('plugtype_id', $ids,FALSE);
		$this->db->order_by('plug_type', 'asc');
		return $this->db->get()->row();
	}
	
	/**
	 * update an ev_plugtype
	 *
	 * @access public
	 */
	function update($plugtype_id,$data_arr)
	{
		$this->db->update('ev_plugtype',$data_arr, array('plugtype_id' => $plugtype_id));
                return TRUE;

	}
}