<?php

require_once(APPPATH."/helpers/epitwitter/EpiCurl.php");	
require_once(APPPATH."/helpers/epitwitter/EpiOAuth.php");	
require_once(APPPATH."/helpers/epitwitter/EpiTwitter.php");	
require_once(APPPATH."/helpers/facebook/facebook_auth.php");

class Retweets extends Controller {
	 
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
		
		$header_data['title'] = "Retweeting Personal Training Services 24/7 | Personal Trainer Wall";
		
		$this->load->library('form_validation');
		//field name, error message
		//$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('header', $header_data);	
			$this->load->view('retweets/index');
			$this->load->view('footer');
			
		}
		else 
		{
			//SEND EMAIL
			//$name = $this->input->post('name');
			$email = $this->input->post('email');
			$page = "Retweets Page";
			$subject = "Request for invitation to PT Retweets";
			$content = "Website visitor with email address " .$email. " requested an invitation to PT Retweets";
			
			$this->send_gmail_email($content, $subject, $email, $page);
			
			$this->log->ptwall_log("Request for invitation to PT Retweets from" .$email);
			
			if($this->email->send())
			{
				//echo 'Your email was sent';	
				$this->load->view('header', $header_data);	
				$this->load->view('retweets/thank-you');
				$this->load->view('footer');
			}
			else
			{
				show_error($this->email->print_debugger());
				echo "Oppss Something went wrong!";
				die();
			}	
		}
		
	}
			
	function send_gmail_email($content, $subject, $email, $page) {
	
		//send email with gmail - see also email.php in config folder
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from($email, $page);
		$this->email->to('ptwallinvitations@gmail.com');
		$this->email->subject($subject);
		//$this->email->message('Send me an invitation to PT Retweets!');
		$this->email->message($content);	
		$this->email->send();	
		
	}

} 