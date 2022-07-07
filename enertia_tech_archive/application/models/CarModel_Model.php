<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CarModel_Model extends CI_Model {
	
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
		$this->db->select('cm.*');
		$this->db->from('car_models as cm');
		return $this->db->get()->result();
	}
	/**
	 * Get model by makeID
	 *
	 * @access public
	 * @param string $make ID
	 * @return object model make object
	 */
	function get_by_makeID($makeID)
	{
		$this->db->select('cm.*,cmk.makeName');
		$this->db->from('car_models as cm');
		$this->db->join('car_make as cmk','cmk.makeID = cm.makeID');
		$this->db->where("`cm`.`makeID`",$makeID);
		return $this->db->get()->result();
	}


	/**
	 * Create an car_models
	 *
	 * @access public
	 * @return int insert id
	 */
	function create($data)
	{
		$this->db->insert('car_models', $data);
		return $this->db->insert_id();
	}
	
	/**
	 * update an car_models
	 *
	 * @access public
	 */
	function update($modelID,$data_arr)
	{
		$this->db->update('car_models',$data_arr, array('modelID' => $modelID));
        return TRUE;
	}
}