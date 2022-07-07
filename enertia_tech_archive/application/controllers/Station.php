<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Station extends CI_Controller{
    function __construct(){
      parent::__construct();
      // $this->login_lib->verifica_login();
      $this->template->set_template('dashboard');
      $this->load->model(array("Station_model", "User", "Plugtype_Model", "Power_Model", "AccessType_Model", "Payment_Model", "Point_Model", "Provider_Model", "Supplytype_Model", "Voltage_Model"));
    }
    
    /*station details*/
    public function index()
    {
      $data = array();
      $this->template->write_view('content', 'dashboard/station/view', $data, TRUE);
      $this->template->render();
    }

    /*station details*/
    public function station_get($id)
    {
      $ipadata = $this->Station_model->get_by_ID($id);

      if (!empty($ipadata)) {  
          $ipadata->conecterscount = count(explode(',', $ipadata->station_plugtype));
          $ipadata->station_plugtype      = $this->Plugtype_Model->get_multipal($ipadata->station_plugtype)->plug_type;
          $ipadata->station_power         = $this->Power_Model->get_multipal($ipadata->station_power)->power;
          $ipadata->station_supplytype    = $this->Supplytype_Model->get_multipal($ipadata->station_supplytype)->supplytype;
          $ipadata->station_voltage       = $this->Voltage_Model->get_multipal($ipadata->station_voltage)->voltage;
          $ipadata->station_point         = $this->Point_Model->get_multipal($ipadata->station_point)->point;
          $this->output->set_output(json_encode(array('status' => 'true','data' => $ipadata)));  
      } else {  
          $this->output->set_output(json_encode(array('status' => 'false'))); 
      }
    }

    /*station add function*/
    public function station_add()
    {
      $this->login_lib->verifica_login();
      // $this->load->model('Station_model');
      // $result = $this->Station_model->GetStationFields();
      // $data['fields'] = $result;
      $data = array();
      $this->template->write_view('content', 'dashboard/station/add', $data, TRUE);
      $this->template->render();
    }

    /*station edit function*/
    public function station_edit($id=null)
    {
      $this->login_lib->verifica_login();
      if ($id == null && $this->agent->is_referral())
      {
          echo $this->agent->referrer();
      }
      $data = array();
      $this->template->write_view('content', 'dashboard/station/edit', $data, TRUE);
      $this->template->render();
    }

    /*staion add edit for post data*/
    public function station_post()
    {
      
    }

    /*station api with opencharge*/
    public function api($data)
    {   
        $api = $this->Station_model->api($data);
        if (count((array) $api) > 0) {  
            $this->output->set_output(json_encode(array('status' => 'true','data' => $api)));  
        } else {  
            $this->output->set_output(json_encode(array('status' => 'false'))); 
        }
    }

     /*station distance time1*/
    public function distanceTime()
    {   
      $api = $this->Station_model->api();
      foreach ($api as &$ipadata) {

        $dist = $this->GetDrivingDistance($this->input->post('lat'), $ipadata->station_lat, $this->input->post('long'), $ipadata->station_long);
        $ipadata->distance = $dist['distance'];
        $ipadata->time = $dist['time'];
        $ipadata->author    = 'website';
        $ipadata->is_auther = !empty($this->session->userdata('UserID')) && $this->session->userdata('UserID') ==  $ipadata->user_id ? true : false;
      }
      if (count((array) $api) > 0) {  
          $this->output->set_output(json_encode(array('status' => 'true','data' => $api)));  
      } else {  
          $this->output->set_output(json_encode(array('status' => 'false'))); 
      }
    }

    /*open charge map api */
    function openchargeapi() {  
      $where = '';
      if (!empty($this->input->post('lat')) && !empty($this->input->post('long'))) {
          // $where .= '&latitude=12.9224636436796&longitude=77.5846883396955';
          $where .= '&latitude='.$this->input->post('lat').'&longitude='.$this->input->post('long');
      }
      $url = "https://api.openchargemap.io/v2/poi/?output=json".$where;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      $response = curl_exec($ch);
      curl_close($ch);
      $response_a = json_decode($response, true);
      
      // foreach ($response_a as $key => $ipadata) {
      //   $dist = $this->GetDrivingDistance($this->input->post('lat'), $ipadata['AddressInfo']['Latitude'], $this->input->post('long'), $ipadata['AddressInfo']['Longitude']);
      //   $response_a[$key]['distance'] = $dist['distance'];
      //   $response_a[$key]['time'] = $dist['time'];
      //   $response_a[$key]['author'] = 'api';
      //   $response_a[$key]['is_auther'] = false;
      // }

      if (count($response_a) > 0) {  
        $this->output->set_output(json_encode(array('status' => 'true','data' => $response_a)));  
      } else {  
        $this->output->set_output(json_encode(array('status' => 'false'))); 
      }
    }

    /*Get Driving Distance*/
    function GetDrivingDistance($lat1, $lat2, $long1, $long2)
    {   
        //https://maps.googleapis.com/maps/api/distancematrix/json?origins=22.7172079,75.86841129999993&destinations=22.683604,75.632212&mode=driving&key=mapkey
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&key=".mapkey;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
        $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
        return array('distance' => $dist, 'time' => $time);
    }

    // // For multiple img upload
    public function UploadImages()
    { 
      $this->login_lib->verifica_login();
      // For multiple file upload
      $images = array();
      if(!empty($_FILES['station_images'])){
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|mp4|mov|ogg';

        $this->load->library('upload', $config);
        $files = $_FILES;
        $count = count($_FILES['station_images']['name']);
        for($i=0; $i<$count-1; $i++) {
          $_FILES['station_images']['name']= strtotime(date('d-m-Y')).'_'.$files['station_images']['name'][$i];
          $_FILES['station_images']['type']= $files['station_images']['type'][$i];
          $_FILES['station_images']['tmp_name']= $files['station_images']['tmp_name'][$i];
          $_FILES['station_images']['error']= $files['station_images']['error'][$i];
          $_FILES['station_images']['size']= $files['station_images']['size'][$i];
          $this->upload->initialize($config); //function defination below
          $this->upload->do_upload('station_images');
          $upload_data = $this->upload->data();
          $name_array[] = $upload_data['file_name'];
          $fileName = base_url().'assets/uploads/'.$upload_data['file_name'];
          $images['image_'.$i] = $fileName;
        }
        $fileName = $images;
        $this->output->set_output(json_encode($fileName));

      } else {
        $this->output->set_output(false);
      }
    }

    // For add and update station
    public function add_station() {
      $this->login_lib->verifica_login();
      $station_name = $this->input->post('station_Name');
      $station_Id = $this->input->post('station_Id');
      $station_address = $this->input->post('station_Address');
      $station_provider = $this->input->post('provider_name');
      $from_day_time = $this->input->post('from_day_time');
      $to_day_time = $this->input->post('to_day_time');
      $station_from = $this->input->post('station_FromTimings');
      $from_time = $this->input->post('from_time');
      $to_time = $this->input->post('to_time');
      $open24 = $this->input->post('open24');
      $parking = $this->input->post('parking');
      $wifi = $this->input->post('wifi');
      $payments = $this->input->post('payments');
      $price = $this->input->post('price');
      $access_type = $this->input->post('access_type');
      $plug_type = $this->input->post('plug_type');
      $power = $this->input->post('charge_level');
      $supply_type = $this->input->post('supply_type');
      $voltage = $this->input->post('max_voltage');
      $point = $this->input->post('no_of_points');
      $general_comments = $this->input->post('general_comments');
      $station_images = $this->input->post('station_Photos');
      $lat = $this->input->post('station_Location_lat');
      $long = $this->input->post('station_Location_long');
      $userId = $this->input->post('userId');
      $country_code = $this->input->post('station_Country_Code');
      $images = array();
      
        $data = array(
          'user_id' => $userId,
          'station_Name' => $station_name,
          'station_Address' => $station_address,
          'station_lat' => $lat,
          'station_long' => $long,
          'station_country_code' => $country_code,
          'station_Provider' => $station_provider,
          'station_from_day' => $from_day_time,
          'station_to_day' => $to_day_time,
          'station_from_time' => $from_time,
          'station_to_time' => $to_time,
          'station_open_time' => ($open24 == 'true' ? '0':($open24 == 'false'? '1' :' 0')),
          'station_parking' => ($parking == 'true' ? '0':($parking == 'false'? '1' : '0')),
          'station_wifi' => ($wifi == 'true' ? '0':($parking == 'false'? '1' : '0')),
          'station_payment' => $payments,
          'station_price' => $price,
          'station_accesstype' => $access_type,
          'station_plugtype' => implode(',', $plug_type),
          'station_power' => implode(',', $power),
          'station_supplytype' => implode(',', $supply_type),
          'station_voltage' => implode(',', $voltage),
          'station_point' => implode(',', $point),
          'station_general_comment' => $general_comments,
          'station_attachment' => $station_images,
        );

        if(!empty($station_Id)){
          $result = $this->Station_model->update($station_Id, $data);
        } else{
          $result = $this->Station_model->AddStation($data);
        }
        $this->output->set_output($result);
    }

    // For get station information
    public function GetStationInfo($stationId){
        $result['data'] = $this->Station_model->GetStationInfo($stationId);
         $this->output->set_output(json_encode($result));
    }

    // // For station remove
    public function RemoveStation($stationId){
      if (!empty($stationId)) {
        $result = $this->Station_model->StationRemove($stationId);
        if ($result == true) {
          $this->output->set_output(1);
        } else {
          $this->output->set_output(0);
        }
      }
    }
  }
?>
 