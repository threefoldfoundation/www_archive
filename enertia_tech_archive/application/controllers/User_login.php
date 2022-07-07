<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */
class User_Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
		$this->load->library('facebook');
		include_once APPPATH."libraries/twitter-oauth-php/twitteroauth.php";
    }
    
    public function index($msg = NULL){
        // Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
		
		//Facebook Code
		
        $this->load->view('login', $data);
    }
    
    public function process(){
		$data['login_url'] = $this->facebook->getLoginUrl(array( 
			'scope' => array("email")));
			
		//Twiterr Code
		$userData = array();
		
		$consumerKey = '0iBY0bCSbUiEGyK4c4iumMCzb'; //Insert_Twitter_API_Key
		$consumerSecret = 'R8QDs57dyUOCyHtxivbJtYi0IfCE8fEsP6kTWTElfGDpgV9mEz'; //Insert_Twitter_API_Secret
		//$oauthCallback = base_url();
		
		$sessToken = $this->session->userdata('token');
		$sessTokenSecret = $this->session->userdata('token_secret');
		
		$sessStatus = $this->session->userdata('status');
		$sessUserData = $this->session->userdata('userData');
		
		if(isset($sessStatus) && $sessStatus == 'verified')
		{
			$connection = new TwitterOAuth($consumerKey, $consumerSecret, $sessUserData['accessToken']['oauth_token'], $sessUserData['accessToken']['oauth_token_secret']); 
			$data['tweets'] = $connection->get('statuses/user_timeline', array('screen_name' => $sessUserData['username'], 'count' => 5));
			$userData = $sessUserData;
			echo "<pre>";
			print_r($userData);
			die;
		}
		elseif(isset($_REQUEST['oauth_token']) && $sessToken == $_REQUEST['oauth_token'])
		{
			$connection = new TwitterOAuth($consumerKey, $consumerSecret, $sessToken, $sessTokenSecret); 
			$accessToken = $connection->getAccessToken($_REQUEST['oauth_verifier']);
		
				$userInfo = $connection->get('account/verify_credentials');
		
				$name = explode(" ",$userInfo->name);
				$first_name = isset($name[0])?$name[0]:'';
				$last_name = isset($name[1])?$name[1]:'';
				$userData = array(
					'oauth_provider' => 'twitter',
					'oauth_uid' => $userInfo->id,
					'username' => $userInfo->screen_name,
					'first_name' => $first_name,
					'last_name' => $last_name,
					'locale' => $userInfo->lang,
					'profile_url' => 'https://twitter.com/'.$userInfo->screen_name,
					'picture_url' => $userInfo->profile_image_url
				);
				
				$userData['accessToken'] = $accessToken;
				$this->session->set_userdata('status','verified');
				$this->session->set_userdata('userData',$userData);
				
				echo "<pre>";
				print_r($userData);
				die;
		}
		else
		{
			$this->session->unset_userdata('token');
			$this->session->unset_userdata('token_secret');
			
			$connection = new TwitterOAuth($consumerKey, $consumerSecret);
			$requestToken = $connection->getRequestToken();
			
			$this->session->set_userdata('token',$requestToken['oauth_token']);
			$this->session->set_userdata('token_secret',$requestToken['oauth_token_secret']);
			
			$twitterUrl = $connection->getAuthorizeURL($requestToken['oauth_token']);
			$data['oauthURL'] = $twitterUrl;
			
        }

		$data['userData'] = $userData;
        
  $e=$this->input->post('useremail');
  $p=md5($this->input->post('password'));

 $que=$this->db->query("select * from ev_users where UserEmail='".$e."' and UserPass='$p'");
 //$que1 = $this->db->last_query();
 //echo "<pre>";
 //print_r($que1);
 //die;
 $row = $que->num_rows();
 date_default_timezone_set('Asia/Dubai');
 $d = date('Y-m-d H:i:s');
  $ip = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
 if($row)
 {
	 $this->load->model("project_model");
	 $email =$this->input->post('useremail');
	$data = array('UserLastLogin' => $d,'UserIP' =>$ip);
		$this->project_model->update($email,$data);
 redirect('https://enertia.io/Dashboard/index.html?');
 }
 else
 {
 $data['error']="<h5 style='color:red'>Invalid login details</h5>";
 } 
 
 $this->load->view('login',@$data); 
 }
	
        // Now we verify the result
        
}
?>