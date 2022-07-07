<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {



  public function __construct()

  {

    parent::__construct();

    $this->load->model(array('CarModel_Model', 'CarMake_Model', 'User', 'Cars_Model', 'Main_model'));

    if ($this->session->userdata('login_ok')) {

      redirect('/dashboard');

    }

  }

  /*index*/

  public function index()

  {

    $data = array();

    $this->template->write_view('content', 'signup', $data, TRUE);

    $this->template->render();

  }

  function signup(){

    $checkemail = $this->Main_model->is_email_available($this->input->post('email'));
    if ($checkemail) {
      return $this->output->set_output(json_encode(array('id' => 'email_result', 'status' => 'error', 'msg' => '<div class="alert alert-danger mb-0 alert-dismissible fade show d-flex align-items-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="mdi mdi-check-circle mr-2"></i>Error ! Email address has been already taken.</div>')));
      exit;
    }
    $checkphone = $this->Main_model->is_phone_available($this->input->post('phone'));
    if ($checkphone) {
      return $this->output->set_output(json_encode(array('id' => 'phone_result', 'status' => 'error', 'msg' => '<div class="alert alert-danger mb-0 alert-dismissible fade show d-flex align-items-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="mdi mdi-check-circle mr-2"></i>Error ! Phone number has been already taken.</div>')));
      exit;
    }
    $this->load->helper('string');
    $ran = random_string('alnum',12);
    $data = array(
                  'UserName'      => $this->input->post('username'),
                  'UserEmail'     => $this->input->post('email'),
                  'UserPhone'     => $this->input->post('phone'),
                  'UserLoginType' => 'Regular',
                  'UserIP'        => $this->input->ip_address(),
                  'UserSecret'    => $ran,
                  'UserLastLogin' => date("Y-m-d H:i:s"),
                  'UserSignupDate' => date("Y-m-d H:i:s"),
                );

    $userid = $this->User->create($data);
    if ($userid) {
        $data['UserID'] = $userid;
        @$this->send_email($data);
        $this->login_lib->login($data);
        $carsdata = array(
                      'makeID' => $this->input->post('make'),
                      'modelID' => $this->input->post('models'),
                      'UserID' => $data['UserID']
                    );
        $checkcarsdetails = $this->Cars_Model->get_by_UserID($data['UserID']);
        if (count((array) $checkcarsdetails) == 0) {
          $cardnu = $this->Cars_Model->create($carsdata);
        }else{
          $cardnu = $this->Cars_Model->update($data['UserID'],$carsdata);
        }
        $data['status'] = 'success';
        $data['msg'] = '<div class="alert mb-0 alert-success alert-dismissible fade show d-flex align-items-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="mdi mdi-check-circle mr-2"></i>Success ! Your account successfully Register.</div>';
    }else{
        $data['msg'] = '<div class="alert mb-0 alert-danger alert-dismissible fade show d-flex align-items-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="mdi mdi-check-circle mr-2"></i> Error ! Some error try again.</div>';
        $data['status'] = 'error';
    }
    return $this->output->set_output(json_encode($data));
 }



 /* send email */
 function send_email($data)
 {
    $this->load->library('email');
    $subject='Enertia.io in Register';
    $this->email->from('info@enertia.tech', 'Enertia.io');
    $this->email->to($data['UserEmail']);  // replace it with receiver mail id
    $this->email->subject($subject); // replace it with relevant subject
    $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
    $this->email->set_header('Content-type', 'text/html');
    $body = $this->load->view('emails/signup_email.php',$data,TRUE);
    $this->email->message($body);  
    try{
      $this->email->send();
      // echo 'Message has been sent.';
    }catch(Exception $e){
      // echo $e->getMessage();
    }
 }



 /*login or signup to facebook*/
  public function login_signup_facebook()
  { 
    $postData = json_decode($this->input->post('userData'));
    if (!empty($postData->email)) {
    // Preparing data for database insertion
      $userData['UserName']       = @$postData->first_name.' '.@$postData->last_name;

      $userData['UserEmail']      = @$postData->email;

      $userData['UserLoginType']  = $this->input->post('social');

      $userData['UserSecret']     = @$postData->id;

      $userData['UserIP']         = $this->input->ip_address();

      $userData['UserSignupDate'] = date("Y-m-d H:i:s");

      $userData['UserLastLogin']  = date("Y-m-d H:i:s");
      $checkexist = $this->User->get_by_email($userData['UserEmail']);
      if (count((array) $checkexist) == 0) {
          $userid = $this->User->create($userData);
          $userData['UserID'] = $userid;
          $userdata = $this->User->get_by_id($userData['UserID']);
          $emailuserdata = (array) $userdata;
          @$this->send_email($emailuserdata);
      }else{
          $this->User->update($checkexist->UserID, $userData);
          $userData['UserID'] = $checkexist->UserID;
          $userdata = $this->User->get_by_id($userData['UserID']);
      }
      $userData['UserPhone']  = $userdata->UserPhone;
      if (!empty($userdata->UserPhone)) {
        $this->login_lib->login($userdata);
      }else{
        $datasession = array(
          'UserID'  => $userdata->UserID,
          'phone_empty' => TRUE
        );
        $this->session->set_userdata($datasession);
      }
      $userData['status'] = 'success';
      $this->output->set_output(json_encode($userData));
    }else{
      $this->output->set_output(json_encode(array('status' => 'error', 'msg' => 'Not find the email.')));
    }
  }

  /*facebook*/
  public function facebook()
  {
    $data = array();

    $this->template->write_view('content', 'facebook', $data, TRUE);

    $this->template->render();
  }


  /*d`ont have phone number so use this function*/

  public function Empty_phone()

  {

    if (empty($this->session->userdata('phone_empty')) && $this->session->userdata('phone_empty') == false) {

        redirect('/login');

    }

    $data = array();

    $this->template->write_view('content', 'phone', $data, TRUE);

    $this->template->render();

  }

  /*d`not have phone number so insert phoe number for use this function*/

  public function Empty_phone_entry($value='')
  {
    if (!empty($this->session->userdata('UserID'))) {

      $data = array(
                    'UserPhone'  => $this->input->post('empty_phone'),
                  );
      if ($this->User->update($this->session->userdata('UserID'), $data)) {
          $carsdata = array(
                'makeID' => $this->input->post('make'),
                'modelID' => $this->input->post('models'),
                'UserID' => $this->session->userdata('UserID')
              );
          $checkcarsdetails = $this->Cars_Model->get_by_UserID($this->session->userdata('UserID'));
          $cardnu = false;
          if (count((array) $checkcarsdetails) == 0) {
            $cardnu = $this->Cars_Model->create($carsdata);
          }else{
            $cardnu = $this->Cars_Model->update($this->input->post('userid'),$carsdata);
          }
          $carsdata = array();
          $carsdata['status'] = 'success';
          $userdata = $this->User->get_by_id($this->session->userdata('UserID'));
          $emailuserdata = (array) $userdata;
          @$this->send_email($emailuserdata);
          $this->login_lib->login($userdata);
          $datasession = array(
            'phone_empty' => FALSE
          );
          $this->session->set_userdata($datasession);
          $carsdata['userdata'] = $userdata;
          $this->output->set_output(json_encode($carsdata));
      }else{
          $this->output->set_output(json_encode(array('status' => 'error', 'msg' => 'Invalid process! please try again')));
      }
    }else{
          $this->output->set_output(json_encode(array('status' => 'error', 'msg' => 'Invalid process! please try again')));
    }
  }

  public function testemail()
  {

    $this->load->library('email');
    $subject='Enertia.io in Register';

    $this->email->from('info@atw.green', 'Enertia.io');

    $this->email->to('kamlesh74420@gmail.com');  // replace it with receiver mail id

    $this->email->subject($subject); // replace it with relevant subject

    $this->email->set_header('MIME-Version', '1.0; charset=utf-8');

    $this->email->set_header('Content-type', 'text/html');
    $data = array('UserName' => 'kamlesh dhamndhiya');
    $body = $this->load->view('emails/signup_email.php',$data,TRUE);

    $this->email->message($body);  

    try{
      $this->email->send();
      echo 'Message has been sent.';
    }catch(Exception $e){
      echo $e->getMessage();
    }

  }

}