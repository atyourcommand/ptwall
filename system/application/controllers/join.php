<?php
require_once(APPPATH."/helpers/epitwitter/EpiCurl.php");	
require_once(APPPATH."/helpers/epitwitter/EpiOAuth.php");	
require_once(APPPATH."/helpers/epitwitter/EpiTwitter.php");	
require_once(APPPATH."/helpers/facebook/facebook_auth.php");

class Join extends Controller {
	 
	 function __construct()
	 {
			parent::Controller();
			$this->load->model('State_model');
			$this->load->model('User_model');	
			$this->load->model('City_model');			
			$this->load->model('County_model');	
			$this->load->model('Country_model');	
			$this->load->model('Config_model');		
			$this->load->model('User_Tag_model');
			$this->load->model('Tag_model');
			$this->load->model('Amember_model');									
			$this->load->library('pagination');	
			$this->load->helper('html');			
			$this->consumer_key =  $this->Config_model->get_value('CONSUMER_KEY')->value;
			$this->consumer_secret =  $this->Config_model->get_value('CONSUMER_SECRET')->value;		
	}
	
	function index()
	{
		$user_logged_in = false;
			
		if (isset($_COOKIE['user_id'])) {
			$user_data = $this->User_model->get_user($_COOKIE['user_id']);	
			$user_logged_in = true;
			$image_path = $dir = $this->Config_model->get_value('UPLOAD_PHOTO_PATH')->value;	
			$data['email_verified'] = $user_data ->email_verified;
			$data['active'] = $user_data ->active;
			$data['email_verified_msg'] = $this->Config_model->get_value('EMAIL_NOT_VERIFIED_MSG')->value;
			$data['incomplete_profile_msg'] = $this->Config_model->get_value('INCOMPLETE_PROFILE_MSG')->value;
		}
			
		$fb_data = _fb_login();
		$header_data['session'] = $fb_data['session'];
		$header_data['logoutUrl'] = $fb_data['logoutUrl'];
		$header_data['loginUrl'] = $fb_data['loginUrl'];
		$header_data['me'] = $fb_data['me'];
		$header_data['user_logged_in'] = $user_logged_in;
		$header_data['active'] =  $user_data ->active;
		$header_data['user'] =  $user_data;
		
		
		$header_data['title'] = "Free promotion of your Personal Training Services | Personal Trainer Wall";
			
		$this->load->view('header', $header_data);	
		$this->load->view('join/index');
		$this->load->view('footer');
	
	}

} 