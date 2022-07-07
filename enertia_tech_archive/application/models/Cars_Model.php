<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cars_Model extends CI_Model {
	
	function __construct() {
		parent::__construct();
    }
	
	/**
	 * Get model by id
	 *
	 * @access public
	 * @return object
	 */
	function get()
	{
		$this->db->select('*');
		$this->db->from('ev_user_cars as uc');
		$this->db->join('ev_users as eu','eu.UserID = uc.UserID');
		$this->db->join('car_make as cmk','cmk.makeID = uc.makeID');
		$this->db->join('car_models as cm','cm.modelID = uc.modelID');
		return $this->db->get()->result();
	}
	/**
	 * Get model by makeID
	 *
	 * @access public
	 * @param string $make ID
	 * @return object model make object
	 */
	function get_by_UserID($UserID)
	{
		$this->db->select('*');
		$this->db->from('ev_user_cars as uc');
		$this->db->join('ev_users as eu','eu.UserID = uc.UserID');
		$this->db->join('car_make as cmk','cmk.makeID = uc.makeID');
		$this->db->join('car_models as cm','cm.modelID = uc.modelID');
		$this->db->where("`uc`.`UserID`",$UserID);
		return $this->db->get()->row();
	}


	/**
	 * Create an car_models
	 *
	 * @access public
	 * @return int insert id
	 */
	function create($data)
	{
		$this->db->insert('ev_user_cars', $data);
		return $this->db->insert_id();
	}
	
	/**
	 * update an car_models
	 *
	 * @access public
	 */
	function update($UserID,$data_arr)
	{
		$this->db->update('ev_user_cars',$data_arr, array('UserID' => $UserID));
        return TRUE;
	}
}