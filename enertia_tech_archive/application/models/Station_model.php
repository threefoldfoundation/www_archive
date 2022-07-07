<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Station_Model extends CI_Model {
	
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
		$this->db->select('st.*');
		$this->db->from('ev_stations as st');
		$this->db->where("`st`.`station_status`", 1);
		return $this->db->get()->result();
	}
	/**
	 * Get model by station_ID
	 *
	 * @access public
	 * @param string $make ID
	 * @return object model make object
	 */
	function get_by_ID($station_ID)
	{
		$this->db->select('ev_stations.*, `us`.`UserEmail`, `us`.`UserName`, `ev_accesstype`.`access_name`, `ev_payment`.`payment_method`, `ev_provider`.`provider_name`');
		$this->db->from('ev_stations');
		$this->db->join('ev_users as us','us.UserID = ev_stations.user_id');

		$this->db->join('ev_accesstype', 'ev_accesstype.accesstype_id = ev_stations.station_accesstype', 'left');
        $this->db->join('ev_payment', 'ev_payment.payment_id = ev_stations.station_payment', 'left');
        $this->db->join('ev_provider', 'ev_provider.provider_id = ev_stations.station_Provider', 'left');

		$this->db->where("`ev_stations`.`station_ID`",$station_ID);
		$this->db->where("`ev_stations`.`station_status`", '0');
		$this->db->where("`ev_stations`.`station_deleted`", '1');
		return $this->db->get()->row();
	}


	/**
	 * Create an ev_stations
	 *
	 * @access public
	 * @return int insert id
	 */
	function create($data)
	{
		$this->db->insert('ev_stations', $data);
		return $this->db->insert_id();
	}
	
	/**
	 * update an ev_stations
	 *
	 * @access public
	 */
	function update($station_ID,$data_arr)
	{
		$this->db->update('ev_stations',$data_arr, array('station_ID' => $station_ID));
        return TRUE;
	}

	
	/**
	 * api record an ev_stations
	 *
	 * @access public
	 */
	function api($data)
	{	
		$this->db->select("ev_stations.*,
			(3959 * acos(cos(radians(".$this->input->post('lat').")) * cos(radians(station_lat))*cos(radians(station_long ) - radians(".$this->input->post('long').") ) + sin( radians(".$this->input->post('lat').")) * sin( radians(station_lat)))) AS distance");                        
		$this->db->from('ev_stations');
		if($data == 1) {
	        if (!empty($this->input->post('nearest_distance'))) {
				$this->db->order_by('distance');                    
	        }

			if (!empty($this->input->post('plug_type_filtter'))) {
				$this->db->where_in('ev_stations.station_plugtype', $this->input->post('plug_type_filtter'),FALSE);
			}

			if (!empty($this->input->post('power_filtter'))) {
				$this->db->where_in('ev_stations.station_power', $this->input->post('power_filtter'),FALSE);
			}
			$this->db->where("`ev_stations`.`station_country_code`", $this->input->post('station_contry_code'));
		}

		$this->db->where("`ev_stations`.`station_status`", '0');
		$this->db->where("`ev_stations`.`station_deleted`", '1');
		$this->db->group_by('ev_stations.station_ID','ev_stations.station_plugtype'); 
		$this->db->having('distance < 500');
		$this->db->limit(100);
		return $this->db->get()->result();
	}

	// For add station
	public function AddStation($data) {
		if(!empty($data)){
			$this->db->insert('ev_stations', $data);
			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
	}

	// Station view
	public function GetStationInfo($StationId){
		$this->db->select('*');
		$this->db->from('ev_stations');
		$this->db->where('station_ID', $StationId);

		$query = $this->db->get();
		if($this->db->affected_rows() > 0){
			return $query->row();
		} else{
			return false;
		}
	}

	// Station view
	public function StationRemove($StationId){
		$this->db->where('station_ID', $StationId);
		$this->db->delete('ev_stations');

		// $query = $this->db->get();
		if($this->db->affected_rows() > 0){
			return true;
		} else{
			return false;
		}
	}
}
