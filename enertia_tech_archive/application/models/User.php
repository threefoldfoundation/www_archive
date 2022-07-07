<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->tableName = 'ev_users';
        $this->primaryKey = 'UserID';
    }
    
    /*
     * Insert / Update facebook profile data into the database
     * @param array the data for inserting into the table
     */
    function checkUser($userData = array()){
		
        if(!empty($userData)){
            //check whether user data already exists in database with same oauth info
            $this->db->select($this->primaryKey);
            $this->db->from($this->tableName);
            $this->db->where(array('UserLoginType'=>$userData['UserLoginType'], 'UserSecret'=>$userData['UserSecret']));
            $prevQuery = $this->db->get();
            
            if($prevQuery->num_rows() > 0){
                $prevResult = $prevQuery->row_array();
                //update user data
                $userData['UserLastLogin'] = date("Y-m-d H:i:s");
                $update = $this->db->update($this->tableName, $userData, array('UserID'=>$prevResult['UserID']));
                //get user ID
                $userID = $prevResult['UserID'];
            }else{
                //insert user data
                $userData['UserSignupDate']  = date("Y-m-d H:i:s");
                $userData['UserLastLogin'] = date("Y-m-d H:i:s");
                $insert = $this->db->insert($this->tableName,$userData);
                //get user ID
                $userID = $this->db->insert_id();
            }
            //return user ID
            return $userID?$userID:FALSE;
        }
    }

    /**
     * Get model by id
     *
     * @access public
     * @return object
    */
    public function get_by_id($UserID)
    {
        $this->db->select('u.*');
        $this->db->from('ev_users as u');
        $this->db->where("`u`.`UserID`",$UserID);
        return $this->db->get()->row();
    }

    /**
     * Get model by email
     *
     * @access public
     * @return object
    */
    public function get_by_email_phone($email,$phone)
    {
        $this->db->select('u.*');
        $this->db->from('ev_users as u');
        $this->db->where("`u`.`UserEmail`",$email);
        $this->db->or_where("`u`.`UserPhone`",$phone);
        return $this->db->get()->row();
    }
    /**
     * Get model by phone
     *
     * @access public
     * @return object
    */
    public function get_by_phone($phone)
    {
        $this->db->select('u.*');
        $this->db->from('ev_users as u');
        $this->db->where("`u`.`UserPhone`",$phone);
        return $this->db->get()->row();
    }

    /**
     * Get model by phone
     *
     * @access public
     * @return object
    */
    public function get_by_email($email)
    {
        $this->db->select('u.*');
        $this->db->from('ev_users as u');
        $this->db->where("`u`.`UserEmail`",$email);
        return $this->db->get()->row();
    }

    /**
     * Create an ev_users
     *
     * @access public
     * @return int insert id
     */
    function create($data)
    {
        $this->db->insert('ev_users', $data);
        return $this->db->insert_id();
    }
    
    /**
     * update an ev_users
     *
     * @access public
     */
    function update($UserID,$data_arr)
    {
        $this->db->update('ev_users',$data_arr, array('UserID' => $UserID));
        return $UserID;
    }

}
