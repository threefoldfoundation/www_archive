<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_Model extends CI_Model {
	
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
		$this->db->from('ev_payment as cm');
		return $this->db->get()->result();
	}
	
	/**
	 * Create an ev_payment
	 *
	 * @access public
	 * @return int insert id
	 */
	function create($data)
	{
		$this->db->insert('ev_payment', $data);
		return $this->db->insert_id();
	}
	
	/**
	 * update an ev_payment
	 *
	 * @access public
	 */
	function update($payment_id,$data_arr)
	{
		$this->db->update('ev_payment',$data_arr, array('payment_id' => $payment_id));
                return TRUE;

	}
}