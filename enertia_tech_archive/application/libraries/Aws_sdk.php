<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Aws\Sns\SnsClient; //here you define what module(s) you want to use

class Aws_sdk {

    public $snsClient;
    public $ci;

    public function __construct() {
        $this->ci = & get_instance();
        // $this->ci->load->config('aws_sdk');

        // Get AWS key and secret fron db
        $this->ci->db->select('*');
        $this->ci->db->from('ev_config');
        $result = $this->ci->db->get()->result();
        $this->snsClient = SnsClient::factory(array(
                    'credentials' => array(
                        // 'key' => $this->ci->config->item('aws_access_key'),
                        // 'secret' => $this->ci->config->item('aws_secret_key'),
                        'key' => $result[0]->User,
                        'secret' => $result[0]->AppKey
                    ),
                    'region' => 'us-east-1', // < your aws from SNS Topic region
                    'version' => 'latest'
        )); //Change this to instantiate the module you want. Look at the documentation to find out what parameters you need. 
    }

    public function __call($name, $arguments = null) {
        if (!property_exists($this, $name)) {
            return call_user_func_array(array($this->snsClient, $name), $arguments);
        } //Change this accordingly too
    }

    //Write your methods to call AWS functionality
    public function SendPushNotification($otp, $PhoneNumber)
    {
        $result = $this->snsClient->publish(array(
             "MessageAttributes" => [
                'AWS.SNS.SMS.SenderID' => [
                    'DataType' => 'String',
                    'StringValue' => 'enertia'
                ],
                'AWS.SNS.SMS.SMSType' => [
                    'DataType' => 'String',
                    'StringValue' => 'Transactional'
                ]
            ],
            'PhoneNumber' => $PhoneNumber,
            'Message' => "Welcome to ENERTIA, Your Login Code : ".$otp,
        ));
        // print_r($result['@metadata']);
        return $result['@metadata']['statusCode'];
    }
}
