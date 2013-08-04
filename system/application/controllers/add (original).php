<!--current-->
<?php
require_once(APPPATH."/helpers/epitwitter/EpiCurl.php");	
require_once(APPPATH."/helpers/epitwitter/EpiOAuth.php");	
require_once(APPPATH."/helpers/epitwitter/EpiTwitter.php");
require_once(APPPATH."/helpers/facebook/facebook_auth.php");


class Add extends Controller {

		 var $logged_in;
		
		 //var $consumer_key = 'rNcmIthsaDLwZGCdMIalg'; /* Consumer key from twitter */
		 //var $consumer_secret = '7C9cQRqQyg2tbliG2v3X0uvHatZgfSSUShJpmJPkA'; /* Consumer Secret */
			
		 function __construct()
		 {
			parent::Controller();
			$this->load->helper('cookie');
			$this->logged_in = true;
			$this->load->model('Config_model');
			$this->load->model('Amember_model');
			$this->load->model('User_Picture_model');
			$this->load->model('User_model');
			$this->load->model('Country_model');
			$this->load->model('State_model');
			$this->load->model('County_model');
			$this->load->model('City_model');			
			$this->load->model('Tag_model');			
			$this->load->model('User_Tag_model');
			
			$this->consumer_key =  $this->Config_model->get_value('CONSUMER_KEY')->value;
			$this->consumer_secret =  $this->Config_model->get_value('CONSUMER_SECRET')->value;
		 }
		     
		function index()
		{
			
			$this->load->view('add/add', $data);
		}
		
		
		function profile()
		{		
			// check which auth to use, fb or twitter
			$fb_data = _fb_login();

            $guest = $this->input->get('guest');

			if ($fb_data['me'])
				$auth_mode = "facebook";
			elseif (isset($_COOKIE['oauth_token']) && isset($_COOKIE['oauth_token_secret']))
				$auth_mode = "twitter";
			elseif ($_GET['oauth_token'])
				$auth_mode = "twitter";
			else
			  redirect("index.php?c=welcome&m=index&error=expired", 'location', 301);	
							
			if ($auth_mode == "facebook") {
			
				$fb_data = _fb_login();				
				$auth_data = $fb_data['me'];
				$me['id'] = $auth_data['id'];
				$me['name'] =  $auth_data['name'];
				$me['first_name'] =  $auth_data['first_name'];
				$me['middle_name'] =  $auth_data['middle_name'];
				$me['last_name'] =  $auth_data['last_name'];
				$me['profile_image_url'] = "https://graph.facebook.com/".$me['id']."/picture";
				$description = $auth_data['about'];
				setcookie('user_id', $me['id']);
			}
			//die();
			if ($auth_mode == "twitter") {
			
				$twitterObj = new EpiTwitter($this->consumer_key, $this->consumer_secret);
				if (isset($_COOKIE['oauth_token']) && isset($_COOKIE['oauth_token_secret'])) {
					$twitterObj->setToken($_COOKIE['oauth_token'], $_COOKIE['oauth_token_secret']);	
					$oauth_token = $_COOKIE['oauth_token'];
					$oauth_token_secret = $_COOKIE['oauth_token_secret'];
				}
				else {
					$twitterObj->setToken($_GET['oauth_token']);
					$token = $twitterObj->getAccessToken();
					$twitterObj->setToken($token->oauth_token, $token->oauth_token_secret);			
					setcookie('oauth_token', $token->oauth_token);
					setcookie('oauth_token_secret', $token->oauth_token_secret);
					$twitterInfo= $twitterObj->get_accountVerify_credentials();
					setcookie('user_id', $twitterInfo->id);
					$oauth_token = $token->oauth_token;
					$oauth_token_secret = $token->oauth_token_secret;
					$set_user_cookie = true;			
				}
				
				$twitterInfo= $twitterObj->get_accountVerify_credentials();

				$xmlobj = $twitterInfo;
				$me['id'] = $user_id = $xmlobj->id;
				$me['profile_image_url'] = $image_url =  $xmlobj->profile_image_url;
			
				// set user id cookie
				//if ($set_user_cookie) setcookie('user_id', $user_id);
										
				$me['name'] = $twitter_name = $xmlobj->screen_name;
			
				$statuses_count = $xmlobj->statuses_count;
				$followers_count = $xmlobj->followers_count;
				$friends_count = $xmlobj->friends_count;
				$description = $xmlobj->description;
				$url 	= $xmlobj->url;
			}
						
			$user_id = $me['id'];
			$user_name = $me['name'];
			
			// check if user exist
			$user_exist = $this->User_model->user_exist($user_id);
			$show_modal = false;
			if (!$user_exist) {
				$show_modal = true;
				$modal_url = "index.php?c=add&m=modal_welcome&user=".$user_name;
			}			
						
			// init user_data
			$user_data =  (object) array('email'=>'',
			 							'email_conf'=>'',//
										'hide_email'=>'', 
										'country_id'=>'', 
										'state_id'=>'', 
										'county_id'=>'', 
										'city_id'=>'', 										
										'insurance_org_id'=>'', 
										'training_ord_id'=>'',
										'certificate_id'=>'',
										'insurance_reg_no'=>'', 
										'insurance_expiry'=>'', 
										'cert_reg_no'=>'', 
										'cert_expiry'=>'',
										'first_name'=>$auth_data['first_name'], 
										//Removed below as this was adding a space before the last name 
										//'last_name'=>$me['middle_name']." ".$auth_data['last_name'],
										'last_name'=>$auth_data['last_name'],
										'phone_no'=>'',
										'facebook_url'=>$auth_data ['link'],
										'linkedin_url'=>'',
										'workplace_url'=>'',
										'street_address'=>'',
										'description'=>'',
                                        'guest'=>0, 
										'sponsor'=>0
										);
										
			// *****************************(Form Object Validation - Start)****************************************
						
			//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|matches[email_conf]');
			//$this->form_validation->set_rules('email_conf', 'Email Confirmation', 'required|valid_email');//
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('county', 'County', 'required');			
			$this->form_validation->set_rules('country', 'Country', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
																
			$validate = $this->form_validation->run();

			if (form_error('first_name')) $first_name_class = 'input_med error'; else $first_name_class = 'input_med';
			if (form_error('last_name')) $last_name_class = 'input_med error'; else $last_name_class = 'input_med';
			if (form_error('email')) $email_class = 'input_med error'; else $email_class = 'input_med';
			if (form_error('email_conf')) $email_class = 'input_med error'; else $email_conf_class = 'input_med';//	
			
            $temp_user_data = $this->User_model->get_user($user_id);
            $email_exist = $this->User_model->user_email_exist($_REQUEST['email']);
            if (($temp_user_data->email != $_REQUEST['email']) && $email_exist)
            $user_email_exist = true;
			//JB enables this
            if ($user_email_exist) $validate = false;
            
			// *****************************(Form Object Validation - End)****************************************
			
					if (isset($_POST['submit'])) {
							
						if ($user_exist) 
							$this->User_model->update_user($user_id);
																																																											
						else 
						{
							if($validate)
							{
							$first_name = $this->input->post('first_name');
							$last_name = $this->input->post('last_name');
							$email_address = $this->input->post('email');
							//echo "Oppss Something went wrong!";						
							
							$content = $first_name." ".$last_name." at ".$email_address." has joined personaltrainerwall.com as a guest";
								
								
							$this->_send_email($content, "New User Join");
							$this->User_model->add_user();
							}
							//$this->_create_amember_profile();
			
						}
							
						$this->_copy_file($me['profile_image_url']);
						
						if($user_exist)
						{
						$user_data = $this->User_model->get_user($user_id);
						}
						else
						{
							//get user data from post data
							//modded
								$user_data =  (object) array('email'=>$_POST['email'],
			 							'email_conf'=>'',
										'hide_email'=>'', 
										'country_id'=>$_POST['country'], 
										'state_id'=>$_POST['state'], 
										'county_id'=>$_POST['county'], 
										'city_id'=>'', 										
										'insurance_org_id'=>'', 
										'training_ord_id'=>'',
										'certificate_id'=>'',
										'insurance_reg_no'=>'', 
										'insurance_expiry'=>'', 
										'cert_reg_no'=>'', 
										'cert_expiry'=>'',
										'first_name'=>$_POST['first_name'], 
										'last_name'=>$_POST['last_name'],
										'phone_no'=>'',
										'facebook_url'=>$_POST['facebook_url'],
										'linkedin_url'=>'',
										'workplace_url'=>'',
										'street_address'=>'',
										'description'=>'',
                                        'guest'=>0,
										'sponsor'=>0
										);
						}
						$this->User_Tag_model->update_tags($user_id, $this->input->post('tag'));
						
						//if ($user_exist && $user_data->active)
						//	redirect("index.php?c=add&m=profile", 'location', 301);	
						
						if ($validate)	{	
									$this->User_model->set_user_active($user_id, 1);
									$this->_create_amember_profile();
									
									if ($this->input->post('auth')=="twitter" && !$user_exist) {
									//echo "xxxxxxxxxx".$this->input->post('tweet');
									try {
										$resp = $twitterObj->post_statusesUpdate(array('status' =>"#ptwall - Added myself to Personal Trainer Wall on http://personaltrainerwall.com"));
										}
									catch (Exception $e) {																								                                    //echo 'Caught exception: ',  $e->getMessage(), "\n";
									$this->log->ptwall_log("Opps, Error while trying to tweet : ".$$e->getMessage());
		
																	}
		
		
																}
									header("location: index.php?c=welcome&m=index&e=update&id=".$user_id);		
						} else 
							$this->User_model->set_user_active($user_id, 0);
								
						$form_error = true;				  
					}
					
					if ($user_exist) {
						$user_data = $this->User_model->get_user($user_id);				
					}
					
					if (strlen($user_data->description) > 0) $description = $user_data->description;
					
					$tags = $this->User_Tag_model->get($user_id);
				
					
					// html objects
					
					// *****************************(Header Data - Start)****************************************
					//$header_data['title'] = 'PTWall USA - Profile';
					$header_data['user_logged_in'] = true; 				
					$header_data['user_id'] = $user_id; 
					// todo
					//$header_data['user_image'] = $twitterInfo->profile_image_url;	
					// todo
					$header_data['user'] = $user_data;			
				
					// *****************************(Header Data - End)****************************************			
					
					// *****************************(Hidden Data - Start)****************************************
					
						$hidden_data = array(
					  'id'  => $user_id,
					  'twitter_name' => $user_name,
					  'image_url'   => $me['profile_image_url'],
					  'statuses_count'=>$statuses_count,
					  'followers_count'=>$followers_count,
					  'friends_count'=>$friends_count,
					 // 'description'=>$description,
					  'url'=>$url,
					  'auth'=>$auth_mode,
					  'oauth_token'=>$oauth_token,
					  'oauth_token_secret'=>$oauth_token_secret			  
					); 
						
					if ($user_exist && !form_error('email') && $user_data->email ) $hidden_data['email'] =$user_data->email;
						
					// *****************************(Hidden Data - End)****************************************
					$res=$this->Country_model->get();			
					$country_menu = array();
					$ddmenu[''] = 'Select a Country';
					foreach ($res as $tablerow) {
						$result = get_object_vars($tablerow);
						$ddmenu[$result['country_id']] = $result['name'];
					}
					
					$res=$this->State_model->get($user_data->country_id);		
				
					$state_ddmenu = array();
					$state_ddmenu[''] = 'Select a State';				
					foreach ($res as $tablerow) {
						$result = get_object_vars($tablerow);
						$state_ddmenu[$result['id']] = $result['name'];
					}	
					
					$res=$this->County_model->get($user_data->country_id,$user_data->state_id);				
					$county_menu = array();	
					$county_menu[''] = 'Select a County';		
					foreach ($res as $tablerow) {
						$result = get_object_vars($tablerow);
						$county_menu[$result['county_id']] = $result['name'];
					}				
					
					//print_r($user_data);
					$res=$this->City_model->get($user_data->country_id,$user_data->state_id, $user_data->county_id);		
		
					$city_menu = array();	
					$city_menu[''] = 'Select a City';		
					foreach ($res as $tablerow) {
						$result = get_object_vars($tablerow);
		
						$city_menu[$result['id']] = $result['name'];
					}				
					
					
					$res=$this->Tag_model->get(1);				
					$tag_special_menu = array();			
					foreach ($res as $tablerow) {
						$result = get_object_vars($tablerow);
						$tag_special_menu[$result['tag_id']] = $result['tag'];
					}						
					
					$res=$this->Tag_model->get(2);				
					$tag_sports_menu = array();			
					foreach ($res as $tablerow) {
						$result = get_object_vars($tablerow);
						$tag_sports_menu[$result['tag_id']] = $result['tag'];
					}				
					
					$res=$this->Tag_model->get(3);				
					$tag_style_menu = array();			
					foreach ($res as $tablerow) {
						$result = get_object_vars($tablerow);
						$tag_style_menu [$result['tag_id']] = $result['tag'];
					}				
					
					$ins_org_menu = array();
					$query = $this->db->query('select id, name from insurance_org order by id asc');
					foreach ($query->result() as $row)
					{
						
						$ins_org_menu [$row->id] = $row->name;
					}
		
					$training_org_menu = array();
					$query = $this->db->query('select id, name from training_org order by id asc');
					foreach ($query->result() as $row)
					{
						
						$training_org_menu [$row->id] = $row->name;
					}
		
					$certificate_menu = array();
					$query = $this->db->query('select certificate_id, name from certificate order by certificate_id asc');
					foreach ($query->result() as $row)
					{
						
						$certificate_menu [$row->certificate_id] = $row->name;
					}
		
					
					$hide_email_chkbox = array(
							'name'        => 'hide_email',
							'value'       => '1',
							'checked'     => $user_data->hide_email,
							'class'       => 'chk',
							);
							
					$hide_google_map_chkbox = array(
							'name'        => 'hide_google_map',
							'value'       => '1',
							'checked'     => $user_data->hide_google_map,
							'class'       => 'chk',
							);			
					$hide_phone_chkbox = array(
							'name'        => 'hide_phone',
							'value'       => '1',
							'checked'     => $user_data->hide_phone,
							'class'       => 'chk',
							);	
		
					// image
					$upload_path = $this->Config_model->get_value('UPLOADED_PROFILE_IMAGES')->value;
			
					
					foreach (glob($upload_path.$user_id."*.*") as $filename) {
						$image_exist = true;	
						$image_file	= $filename;			
					}		
		
					$data['user_exist'] = $user_exist;
					$data['user_email_exist'] = $user_email_exist;
					$data['user_id'] = $user_id;
					$data['user'] = $user_data;
					$data['email_verified'] = $user_data->email_verified;
					$data['email_verified_msg'] = $this->Config_model->get_value('EMAIL_NOT_VERIFIED_MSG')->value;
					$data['upload_photo_path'] = $this->Config_model->get_value('UPLOAD_PHOTO_PATH')->value;			
					$data['auth_mode'] = $auth_mode;
					$data['show_modal'] = $show_modal;
					$data['modal_url'] = $modal_url;			
					$data['twitter_name'] = $user_name;
					$data['description'] = $description;
					$data['hidden_data'] = $hidden_data;
					$data['country_list'] = $ddmenu;
					$data['country_id_selected'] = $user_data->country_id;
					$data['state_list'] = $state_ddmenu;
					$data['state_id_selected'] = $user_data->state_id;	
					$data['county_list'] = $county_menu;
					$data['county_id_selected'] = $user_data->county_id;		
					$data['city_list'] = $city_menu;
					$data['city_id_selected'] = $user_data->city_id;			
					$data['tag_special_menu'] = $tag_special_menu;			
					$data['tag_style_menu'] = $tag_style_menu;
					$data['tag_sports_menu'] = $tag_sports_menu;
					$data['insurance_org_menu'] = $ins_org_menu;
					$data['insurance_org_sel'] = $user_data->insurance_org_id;
					$data['training_org_menu'] = $training_org_menu;
					$data['training_org_sel'] = $user_data->training_org_id;
					$data['certificate_menu'] = $certificate_menu;
					$data['certificate_sel'] = $user_data->certificate_id;						
					$data['tags'] = $tags;
					$data['hide_email_chkbox'] = $hide_email_chkbox; 
					$data['hide_google_map_chkbox'] = $hide_google_map_chkbox; 
					$data['hide_phone_chkbox'] = $hide_phone_chkbox; 
					$data['image_exist'] = 	$image_exist;
					$data['image_file'] = 	$image_file;
					
					if ($user_data->cert_expiry == '0000-00-00') 
						$cert_expiry = '';
					else
						$cert_expiry = $user_data->cert_expiry;
					
					$data['first_name'] = array('name' => 'first_name', 'id' => 'first_name', 'value' => $user_data->first_name, 'class' => $first_name_class);
					$data['last_name'] = array('name' => 'last_name', 'id' => 'last_name', 'value' => $user_data->last_name, 'class' => $last_name_class);
					$data['business_name'] = array('name' => 'business_name', 'id' => 'business_name', 'value' => $user_data->business_name, 'class' => 'input_med');
				  //$data['email'] = array('name' => 'email', 'id' => 'e', 'value' => $user_data->email, 'class' => 'input_med');
					$data['insurance_reg_no'] = array('name' => 'insurance_reg_no', 'id' => 'insurance_reg_no', 'value' => $user_data->		insurance_reg_no, 'class' => 'input_sm');
				  //$data['insurance_expiry'] = array('name' => 'insurance_expiry', 'id' => 'insurance_expiry', 'value' => $user_data->insurance_expiry, 'class' => 'input_sm');
					$data['cert_reg_no'] = array('name' => 'cert_reg_no', 'id' => 'cert_reg_no', 'value' => $user_data->cert_reg_no, 'class' => 'input_med');
					$data['cert_expiry'] = array('name' => 'cert_expiry', 'id' => 'cert_expiry', 'value' => $cert_expiry, 'class' => 'input_sm');	
					
					if ($user_exist && $user_data->active==1) 		
						
						$data['email'] = array('name' => 'email', 'id' => 'email', 'value' => $user_data->email, 'class' => $email_class, 'disabled' => 'disabled');
					else
						$data['email'] = array('name' => 'email', 'id' => 'email', 'value' => $user_data->email, 'class' => $email_class);	
					$data['phone_no'] = array('name' => 'phone_no', 'id' => 'phone_no', 'value' => $user_data->phone_no, 'class' => 'input_med');
					$data['facebook_url'] = array('name' => 'facebook_url', 'id' => 'facebook_url', 'value' => $user_data->facebook_url, 'class' => 'input_med');
					$data['linkedin_url'] = array('name' => 'linkedin_url', 'id' => 'linkedin_url', 'value' => $user_data->linkedin_url, 'class' => 'input_med');
					$data['workplace_url'] = array('name' => 'workplace_url', 'id' => 'workplace_url', 'value' => $user_data->workplace_url, 'class' => 'input_med');
					$data['street_address'] = array('name' => 'street_address', 'id' => 'street_address', 'value' => $user_data->street_address, 'class' => 'input_med');
				
					$data['tag_1'] = array('name' => 'tag_1', 'id' => 'tag_1');
					$data['tag_2'] = array('name' => 'tag_2', 'id' => 'tag_2');
					$data['tag_3'] = array('name' => 'tag_3', 'id' => 'tag_3');
										
					$data['guest'] = $user_data->guest;
					//added this JB
					$data['sponsor'] = $user_data->sponsor;
					$image_path = $this->Config_model->get_value('UPLOAD_PHOTO_PATH')->value;
					$data['user_image'] = $user_data->profile_image_url;
								
					if ($form_error) 
						$data['validate'] = $validate;
					//$data['country'] = array('twitter_name' => 'twitter_name', 'id' => 'twitter_name');
								
					// header
					
					//$header_data = $this->_get_header_data();
		
					$this->load->view('header', $header_data);
								
								if ($guest=='true')
									$this->load->view('add/profile_new',$data);
								else
									$this->load->view('add/profile',$data);
					$this->load->view('footer');
				
				}		

		function locations() {

		
			//print_r($_REQUEST);
		
		
			// query for data - start

			$res=$this->Country_model->get();			
			$country_menu = array();
			$ddmenu[''] = 'Select a Country';
			foreach ($res as $tablerow) {
	  			$result = get_object_vars($tablerow);
				$ddmenu[$result['country_id']] = $result['name'];
			}
			
			$res=$this->State_model->get($user_data->country_id);		
		
			$state_ddmenu = array();
			$state_ddmenu[''] = 'Select a State';				
			foreach ($res as $tablerow) {
	  			$result = get_object_vars($tablerow);
				$state_ddmenu[$result['id']] = $result['name'];
			}	
			
			$res=$this->County_model->get($user_data->country_id,$user_data->state_id);				
			$county_menu = array();	
			$county_menu[''] = 'Select a County';		
			foreach ($res as $tablerow) {
	  			$result = get_object_vars($tablerow);
				$county_menu[$result['county_id']] = $result['name'];
			}				
			
			//print_r($user_data);
			$res=$this->City_model->get($user_data->country_id,$user_data->state_id, $user_data->county_id);		

			$city_menu = array();	
			$city_menu[''] = 'Select a City';		
			foreach ($res as $tablerow) {
	  			$result = get_object_vars($tablerow);

				$city_menu[$result['id']] = $result['name'];
			}				
						
			// query for data - end
			
			$data['country_list'] = $ddmenu;
	    	$data['country_id_selected'] = $user_data->country_id;
			$data['state_list'] = $state_ddmenu;
			$data['state_id_selected'] = $user_data->state_id;	
			$data['county_list'] = $county_menu;
			$data['county_id_selected'] = $user_data->county_id;		
			$data['city_list'] = $city_menu;
			$data['city_id_selected'] = $user_data->city_id;				
		
			$this->load->view('header', $header_data);
			$this->load->view('add/locations',$data);
			$this->load->view('footer');		
		
		}
		
		function image() {

			
		// ********************************** (header - start ***************************************
		$header_data['title'] = $user->first_name." ".$user->last_name." on Personal Trainer Wall";
		$header_data['keywords'] = ",".$user->first_name." ".$user->last_name;
		//$user_id = "146092055";
		$user_id = $_COOKIE['user_id'];
		if (isset($user_id)) {
			$user_data = $this->User_model->get_user($user_id);	
			$user_logged_in = true;
	
			$image_path = $dir = $this->Config_model->get_value('UPLOAD_PHOTO_PATH')->value;	

			$header_data['user_image'] = $user_data->profile_image_url;
										
			$data['email_verified'] = $user_data ->email_verified;
			$data['active'] = $user_data ->active;
			$data['email_verified_msg'] = $this->Config_model->get_value('EMAIL_NOT_VERIFIED_MSG')->value;
			$data['incomplete_profile_msg'] = $this->Config_model->get_value('INCOMPLETE_PROFILE_MSG')->value;

			$header_data['user_logged_in'] = true; 				
			$header_data['user_id'] = $twitterInfo->id; 						
			$header_data['user_image'] = $twitterInfo->profile_image_url;	
			$header_data['user'] = $user_data;				
		} else 
		
			show_404();
	
		// ********************************** (header - end ***************************************
		
		$upload_path = $this->Config_model->get_value('UPLOADED_PROFILE_IMAGES')->value;
		$file = $upload_path.$user_data->user_id.".";				
		if ($this->input->get('delete')=="true") {

			foreach (glob($upload_path.$user_id."*.*") as $filename) {
				unlink($filename);
			}		
	
		}		
		// check if the image exist


			foreach (glob($upload_path.$user_id."*.*") as $filename) {
				$image_exist = true;	
				$image_file	= $filename;			
			}		


		// prepare data to passed to the template
	 	    $data['user'] = $user_data;	
			$data['upload_path'] = 	$upload_path;
			$data['image_exist'] = 	$image_exist;
			$data['image_file'] = 	$image_file;			
			$this->load->view('header', $header_data);
			$this->load->view('add/image',$data);
			$this->load->view('footer');		
		
		}
		
		function _set_form_data()
		{
  			// some code
		}

/*
		function _get_header_data() {
		
			$header_data = array();
			if (isset($_COOKIE['user_id'])) 
				$header_data['user_logged_in'] = true; 
			else
				$header_data['user_logged_in'] = false; 				
			$header_data['user_id'] = $_COOKIE['user_id']; 			
			$header_data['user_image'] = "http://s.twimg.com/a/1253209888/images/default_profile_3_normal.png";	
			
			return $header_data;		
		}*/
		
		function modal_welcome() {
			$data['user'] = $this->input->get('user');;	
			$this->load->view('add/modal_welcome', $data);
		}
		
		function modal_profile_updated() {
			$this->load->view('add/modal_profile_updated', $data);
		}
			
		function update_amember_subscription () {
		
			$amember_id =  $this->input->get('amember_id');
			$product_id =  $this->input->get('product_id');
			$ref = $this->input->get('ref');
			$action = $this->input->get('action');
			$get_login  = $this->Amember_model->get_login($amember_id);
			//echo $get_login;
			$gen_ref = md5($amember_id);
			
			if ($ref != $gen_ref) die("402 Unauthorized");	
			
			$approved_prod_id = $this->Config_model->get_value('AMEMBER_PRODUCT_APPROVED_ID')->value;
			if ($action == "delete" && $product_id == $approved_prod_id)
				$query = $this->db->query("UPDATE users set approved = 0 where user_id = '$get_login'");			
			else if ($product_id == $approved_prod_id)
				$query = $this->db->query("UPDATE users set approved = 1 where user_id = '$get_login'");
			else					
				$query = $this->db->query("UPDATE users set subscribed = 1 where user_id = '$get_login'");
		}
		
		function add_user_pic() {			
			$ref = $this->input->get('ref');
			$this->User_Picture_model->add($this->input->get('user_id'),$this->input->get('filename'),$this->input->get('thumbnail') ) ;
		}
		
		function manage_user_pic() {
			$user_id = $this->input->get('user_id');
			
			if ($_COOKIE['user_id']!=$user_id) die("402 Unauthorized");				

			//unset($_SESSION['random_key']);
			//unset($_SESSION['user_file_ext']);			
			$default = $this->User_Picture_model->get_default($user_id);
			
			if ($this->input->get('action')=="default") {
				$this->User_Picture_model->reset_default($user_id);
				$this->User_Picture_model->set_default($this->input->get('img_id'));
				$default = $this->User_Picture_model->get_by_id($this->input->get('img_id'));
				$this->User_model->set_default_upload_image($user_id, $default[0]->thumbnail);
				$data['large'] = $default[0];
			}
			else if ($this->input->get('action')=="delete") {
				if ($default[0]->id == $this->input->get('img_id'))
					$this->User_model->remove_default_upload_image($user_id);	
					$this->User_Picture_model->delete($this->input->get('img_id'));			
			}

			$default = $this->User_Picture_model->get_default($user_id);
	
			if (count($default)>0) $no_default = false; else $no_default = true;
						
			$res=$this->User_Picture_model->get($user_id);				
			$image_data = $res;
			$user_data = $this->User_model->get_user($user_id);

			$data['user_id'] = $user_id;
			$data['image_data'] = $image_data;
			$data['no_default'] = $no_default;
			$data['user_image'] = $user_data->profile_image_url;
			$data['image_path'] = $this->Config_model->get_value('UPLOAD_PHOTO_PATH')->value;
			
			if ($this->input->get('action')!="default")
				$data['large'] = $this->input->get('large')?$image_data[$this->input->get('large')]:$image_data[0];		
				
			$this->load->view('header_lite', $header_data);						
			$this->load->view('add/modal_manage_pictures', $data);
			$this->load->view('footer_lite');
			
		
		}	
		
		function view_user_pic() {
			$user_id = $this->input->get('user_id');

			
			if ($this->input->get('action')=="default") {
				$this->User_Picture_model->reset_default($user_id);
				$this->User_Picture_model->set_default($this->input->get('img_id'));
				$default = $this->User_Picture_model->get_by_id($this->input->get('img_id'));
				$this->User_model->set_default_upload_image($user_id, $default[0]->thumbnail);
				$data['large'] = $default[0];
			}
			else if ($this->input->get('action')=="delete") {
				$this->User_Picture_model->delete($this->input->get('img_id'));			
			}

			$res=$this->User_Picture_model->get($user_id);				
			$image_data = $res;

			$data['user_id'] = $user_id;
			$data['image_data'] = $image_data;
			
			$data['image_path'] = $this->Config_model->get_value('UPLOAD_PHOTO_PATH')->value;
			
			if ($this->input->get('action')!="default")
				$data['large'] = $this->input->get('large')?$image_data[$this->input->get('large')]:$image_data[0];		
				
			$this->load->view('header_lite', $header_data);						
			$this->load->view('add/modal_view_pictures', $data);
			$this->load->view('footer_lite');

		}				
		
		function _get_profile_image($user_id) {
			$default = $this->User_Picture_model->get_default($user_id);
			
			$image_path = $this->Config_model->get_value('UPLOAD_PHOTO_PATH')->value;
			
			if (count($default)>0)
				return $image_path.$thumbnail;
			
		}
		
		function _copy_file($url) {
			
			$ext = substr(strrchr($url, '.'), 1);
			$filename = md5($url).".".$ext;
			$dir = $this->Config_model->get_value('CACHED_PROFILE_IMAGES')->value;			
			if (!file_exists($dir.$filename))
			copy($url, $dir.$filename);
	
		}
		
		
 		function _create_amember_profile() {
		    //echo "Debug : Creating Amember Profile...";
			$id = $this->input->post('id');
			$email =  $this->input->post('email');
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$pwd = md5($id);
			
			$this->load->library('xmlrpc');
			$this->xmlrpc->server('http://personaltrainerwall.com/amember/xmlrpc/', 80);
			$this->xmlrpc->method('add_ptwall_user');
		
			$rec['login'] = $id;
			$rec['pass'] = $id;
			$rec['name_l'] = $last_name;
			$rec['name_f'] = $first_name;
			$rec['email'] = $email;
			
			$v = serialize($rec);
			$x = unserialize($v);		
			$request[] = $v;

		
			$this->xmlrpc->request($request);
			$this->xmlrpc->send_request();
			/*
			if ( ! $this->xmlrpc->send_request())
			{
		
				echo $this->xmlrpc->display_error();
			} else {
				print_r($this->xmlrpc->display_response());
			}*/
			
		}	 
		/*
 		function _create_amember_profile() {
		    echo "Debug : Creating Amember Profile...";
			$id = $this->input->post('id');
			$email =  $this->input->post('email');
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$pwd = md5($id);
			
			$this->load->library('xmlrpc');
			$this->xmlrpc->server('http://personaltrainerwall.com/amember/xmlrpc/', 80);
			$this->xmlrpc->method('add_ptwall_user');
		
			$rec['login'] = "test";
			$rec['pass'] = "test";
			$rec['name_l'] =  "fsdfsdf";
			$rec['name_f'] = "fsdfsd";
			$rec['email'] = "sfsdfs@acb.com";
			
			$v = serialize($rec);
			$x = unserialize($v);		
			$request[] = $v;

		
			$this->xmlrpc->request($request);
			//$this->xmlrpc->send_request();
			
			if ( ! $this->xmlrpc->send_request())
			{
		
				echo $this->xmlrpc->display_error();
			} else {
				print_r($this->xmlrpc->display_response());
			}
			
		}	 
*/
		
		function copy_all_images() {
		set_time_limit(0);
		$query = $this->db->query("SELECT profile_image_url FROM users");
		
		foreach ($query->result() as $row)
		{
			$this->_copy_file($row->profile_image_url);
		}	
					
		
		}	
		
		function get_dummy_content() {
		
		return "<user> 
  <id>38627931</id> 
  <name>geekrulz</name> 
  <screen_name>geekrulz</screen_name> 
  <location></location> 
  <description></description> 
  <profile_image_url>http://a3.twimg.com/profile_images/318352623/icon_geek_core_normal.jpg</profile_image_url> 
  <url>http://www.geekrulz.com</url> 
  <protected>false</protected> 
  <followers_count>12</followers_count> 
  <profile_background_color>ffffff</profile_background_color> 
  <profile_text_color>333333</profile_text_color> 
  <profile_link_color>990000</profile_link_color> 
  <profile_sidebar_fill_color>F3F3F3</profile_sidebar_fill_color> 
  <profile_sidebar_border_color>DFDFDF</profile_sidebar_border_color> 
  <friends_count>19</friends_count> 
  <created_at>Fri May 08 07:47:54 +0000 2009</created_at> 
  <favourites_count>0</favourites_count> 
  <utc_offset>21600</utc_offset> 
  <time_zone>Sri Jayawardenepura</time_zone> 
  <profile_background_image_url>http://a3.twimg.com/profile_background_images/23829223/logo.gif</profile_background_image_url> 
  <profile_background_tile>false</profile_background_tile> 
  <statuses_count>16</statuses_count> 
  <notifications>false</notifications> 
  <verified>false</verified> 
  <following>false</following> 
  <status> 
    <created_at>Fri Aug 21 04:54:21 +0000 2009</created_at> 
    <id>3443785845</id> 
    <text>Just added myself to the http://wefollow.com twitter directory under: #geek, #tshirts, #srilanka</text>  
    <truncated>false</truncated> 
    <in_reply_to_status_id></in_reply_to_status_id> 
    <in_reply_to_user_id></in_reply_to_user_id> 
    <favorited>false</favorited> 
    <in_reply_to_screen_name></in_reply_to_screen_name> 
  </status> 
</user> ";
		
		
		}
		
	function _send_email($content, $subject) {
		//print_r(_fb_post());
		$this->load->library('email');
		$this->email->from('do-not-reply@personaltrainerwall.com', 'do-not-reply@personaltrainerwall.com');
		$this->email->to('admin@personaltrainerwall.com'); 
		$this->email->subject($subject);
		$this->email->message($content);	
		$this->email->send();	
		//echo $this->email->print_debugger();			
	}


        function change_email() {

            $validate = true;
            $email = $_REQUEST['email'];
            $user_id = $_COOKIE['user_id'];
            $verify = $_REQUEST['verify'];
            $success = false;
            $email_sent = false;

            if (!$verify && !$user_id)
                redirect("index.php?c=welcome&m=index&error=expired", 'location', 301);
            if ($verify) {
                
                if (md5($email)==$verify) {

                  $id = $_REQUEST['id'];
                  $temp_user = $this->User_model->get_user($id);
                  $old_email = $_REQUEST['oldemail'];
                  if ($temp_user->email == $old_email) {
                      // everthing is verfied lets update the email address
                      $this->_update_amember_email($id, $email);
                      $this->db->query("update users set email = '$email' where user_id = '$id'");
                      $success = true;
                  }

                  else {
                      $validate = false;
                      $error_message = "Something went wrong, please drop a mail to admin@personaltrainerwall.com for assistance";
                  }
                }
                else {
                      $validate = false;
                      $error_message = "Something went wrong, please drop a mail to admin@personaltrainerwall.com for assistance";
                }

            }

            if (isset($_POST['submit'])) {

                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$validate = $this->form_validation->run();
                if (!$validate) $error_message = "There is a problem with your email address. Please check and resubmit.";

                $user_email_exist = $this->User_model->user_email_exist($email);
               
                if ($user_email_exist) {
                    $validate= false;
                    $error_message = "The email address already exist. Please try a different one";
                }
            }


            if (isset($user_id)) {
                    $user_data = $this->User_model->get_user($user_id);
                    $user_logged_in = true;
                    $header_data['user_logged_in'] = true;
                    $header_data['user'] = $user_data;
            }

            if (isset($_POST['submit']) && $validate) {

				$this->load->library('email');
                $link = "http://personaltrainerwall.com/index.php?c=add&m=change_email&verify=".
                        md5($email)."&id=".$user_data->user_id."&email=".htmlspecialchars($email).
                        "&oldemail=".$user_data->email;
                $content = "Hi ".$user_data->first_name."\r\n\r\n";
                $content = $content."Please click the link below in order to verify your email address change\r\n\r\n";
                $content = $content.$link."\r\n";
                $content = $content."\r\n\ The PTWall Team";
				$this->email->from('do-not-reply@personaltrainerwall.com', 'do-not-reply@personaltrainerwall.com');
				$this->email->to($email);
				$this->email->subject('Email address change');
				$this->email->message($content);
				$this->email->send();
				$email_sent = true;
				//echo $this->email->print_debugger();

            }


            $data['email'] = array('name' => 'email', 'id' => 'email', 'value'=>$email);
            $data['validate'] = $validate;
            $data['error_message'] = $error_message;
            $data['verify'] = $verify;
            $data['success'] = $success;
            $data['email_sent'] = $email_sent;
            $this->load->view('header',$header_data);
            $this->load->view('add/change_email', $data);
            $this->load->view('footer');

        }

	function _update_amember_email($user_id, $email)
	{
		$this->load->library('xmlrpc');
		$this->xmlrpc->server('http://personaltrainerwall.com/amember/xmlrpc/', 80);
		$this->xmlrpc->method('query');
		$member_id =  $this->input->get('member_id');

		$request = array("update members set email='$email' where login='$user_id'");

		$this->xmlrpc->request($request);

		if ( ! $this->xmlrpc->send_request())
		{
                    $this->log->ptwall_log("Updated Amember Email Error! $user_id, $email: ".$this->xmlrpc->display_error());
		} else {
                    $this->log->ptwall_log("Updated Amember Email! $user_id, $email: ".print_r($this->xmlrpc->display_response(), true));
		}
	}
	
	function remove_profile() {
		
		$user_id = $_COOKIE['user_id'];
		
		$this->_check_auth();
		
		if (isset($user_id)) {
				$user_data = $this->User_model->get_user($user_id);
				$user_logged_in = true;
				$header_data['user_logged_in'] = true;
				$header_data['user'] = $user_data;
		}
		
		// facebook profile delete
		
		$fb_data = _fb_login();
		
		$logoutUrl = $fb_data['logoutUrl'];
		$uid = $fb_data['session']['uid'];
		
		if (isset($_POST['submit']) && ($_POST['submit']!='Cancel')) {
			if ($uid == $user_id ) {
				$user_data = $this->User_model->get_user($user_id);	
				$content = "User ".$user_data->twitter_name. " with email :".$user_data->email." removed profile";
				$this->_send_email($content, "Profile Removal");
				$this->log->ptwall_log("User removed profile ".$user_id);
				$member_id = amember_get_member_id($user_id);
				amember_remove_profile($member_id);
				$this->db->query("delete from users where user_id = '$user_id'");
				setcookie('oauth_token', '',time() - 3600);
				setcookie('oauth_token_secret','', time() - 3600);
				setcookie('user_id','',time() - 3600);	
				header("location: ".$logoutUrl."&showconfirm=yes");	
			} else {
				echo "Oppss Something went wrong!";
				die();
			}
		} 
		
		//
		
		$this->load->view('header',$header_data);
		$this->load->view('add/remove_profile', $data);
		$this->load->view('footer');
	
	}
	
	function _check_auth() {
	
			$fb_data = _fb_login();

            $guest = $this->input->get('guest');

			if ($fb_data['me'])
				$auth_mode = "facebook";
			elseif (isset($_COOKIE['oauth_token']) && isset($_COOKIE['oauth_token_secret']))
				$auth_mode = "twitter";
			elseif ($_GET['oauth_token'])
				$auth_mode = "twitter";
			else
			  redirect("index.php?c=welcome&m=index&error=expired", 'location', 301);	

	}
	
	function _get_random_string() {
	
		$n = rand(10e16, 10e20);
		return base_convert($n, 10, 36);
	
	}
	
	function test() {

		$n = rand(10e16, 10e20);
		echo base_convert($n, 10, 36);

	}
		
}
?>