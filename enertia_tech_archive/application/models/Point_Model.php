<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Point_Model extends CI_Model {
	
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
		$this->db->from('ev_point as cm');
		return $this->db->get()->result();
	}
	
	/**
	 * Create an ev_point
	 *
	 * @access public
	 * @return int insert id
	 */
	function create($data)
	{
		$this->db->insert('ev_point', $data);
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
		$this->db->select('GROUP_CONCAT(ev_point.point ORDER BY ev_point.point_id) as point');
		$this->db->from('ev_point');
		$this->db->where_in('point_id', $ids,FALSE);
		$this->db->order_by('point', 'asc');
		return $this->db->get()->row();
	}
	/**
	 * update an ev_point
	 *
	 * @access public
	 */
	function update($point_id,$data_arr)
	{
		$this->db->update('ev_point',$data_arr, array('point_id' => $point_id));
                return TRUE;

	}
}