<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


class Trainers extends Controller {


   function __construct()
	 {
		parent::Controller();
	  $this->load->model('User_model');
	  $this->load->model('Config_model');     
	  $this->load->model('State_model');		
	  $this->load->model('County_model');
	  $this->load->model('Country_model');	
	  $this->load->model('City_model');	  
	  $this->load->model('User_Tag_model');
	  $this->load->model('Tag_model');
   }

   function index($name="") {

		
		//  ********************************* (fetch data - start ************************************
		//$user= $this->User_model->get_user_by_twitter_name('LiveBigToday');
		$name = str_replace("'","''",$name);

		$query = $this->db->query("SELECT user_id, guest FROM `users` where replace(concat(trim(first_name),'_',trim(last_name)),' ','_') = '$name'" );
		$row = $query->row();
		$user_id = $row->user_id;			
		
		$guest = $row->guest;
		if (!$this->User_model->user_exist($user_id)) show_404('page');
		//if (!$this->User_model->user_exist($user_id) || $guest==1) show_404('page');
		
		$user= $this->User_model->get_user($user_id);
		$user_id = $user->user_id;
		// training org info
		$query = $this->db->query('SELECT name FROM training_org where id='.$user->training_org_id);
		$row = $query->row();
		$user_training_org = $row->name;	

		// cert info
		$query = $this->db->query('SELECT name FROM certificate where certificate_id='.$user->certificate_id);
		$row = $query->row();
		$user_certificate = $row->name;		
		
		// get tags
		for($i=1;$i<=3;$i++) {
			$tag_result = $this->User_Tag_model->get_by_group($user->user_id,$i);
			foreach ($tag_result as $tag) {
				$user_tags[$i][] = $this->Tag_model->get_tag_by_id($tag);
					
			}
		}		
			
		// ************
		
		if ($country) {
			$geo = $country;
				if ($state) {
					$geo = $state.",".$country;
					$geo_html = $state.",<br>".$country;
					if ($county) {
						$geo = $county.",".$state.",".$country;
						$geo_html = $county.",<br>".$state.",<br>".$country;
					}	
				}
		}

		 if ($city) {
			$geo = $city.",".$county.",".$state.",".$country;
			$geo_html = $city.",<br>".$county.",<br>".$state.",<br>".$country;
		 }		

		if ($street_address) {
		
			$geo = $street_address.",".$city.",".$county.",".$state.",".$country;
			$geo_html = $street_address.",<br>".$city.",<br>".$county.",<br>".$state.",<br>".$country;
		}
						 
		$geo = str_replace(",,",",",$geo);
		
		// **************
			
			
		// ********************************** (fetch data - end ***************************************
		
		// ********************************** (header - start ***************************************
		
		$city = $this->City_model->get_name_by_id($user->city_id);
		$header_data['controller'] = $this->router->fetch_class();
		$header_data['geo'] = $this->County_model->get_name_by_id($user->county_id).", ".$this->State_model->get_name_by_id($user->state_id).", ".$this->Country_model->get_name_by_id($user->country_id);
		if ($city) $header_data['geo'] = $city.", ".$header_data['geo'];
		$header_data['title'] = "Personal Trainer ".$header_data['geo']." | ".$user->first_name." ".$user->last_name." | Personal Trainer Wall";
		$header_data['keywords'] = ",".$user->first_name." ".$user->last_name.",".$header_data['geo'];
		$header_data['description'] = $user->first_name." ".$user->last_name." is a Personal Trainer in ".$header_data['geo']. " offering certified Personal Training.";
		
		$show_street_address= $user->hide_google_map;
		$street_address	= $user->street_address;

		if ($street_address && $show_street_address) $header_data['geo'] = $street_address.",".$header_data['geo'];
		
		if (isset($_COOKIE['user_id'])) {
			$user_data = $this->User_model->get_user($_COOKIE['user_id']);	
			$user_logged_in = true;
	
			$image_path = $dir = $this->Config_model->get_value('UPLOAD_PHOTO_PATH')->value;	

			$header_data['user_image'] = $user_data->profile_image_url;
										
			$data['email_verified'] = $user_data ->email_verified;
			$data['active'] = $user_data ->active;
			$data['email_verified_msg'] = $this->Config_model->get_value('EMAIL_NOT_VERIFIED_MSG')->value;
			$data['incomplete_profile_msg'] = $this->Config_model->get_value('INCOMPLETE_PROFILE_MSG')->value;
			$data['logged_user'] = $user_data;
			
			$header_data['user_logged_in'] = true; 				
			$header_data['user_id'] = $twitterInfo->id; 						
			$header_data['user_image'] = $twitterInfo->profile_image_url;	
			$header_data['user'] = $user_data;

		}
	
		// ********************************** (header - end ***************************************
		
		// handle image
		$upload_path = $this->Config_model->get_value('UPLOADED_PROFILE_IMAGES')->value;		
	
		// check if the image exist

		foreach (glob($upload_path.$user_id."*.*") as $filename) {
			$image_exist = true;	
			$image_file	= $filename;			
		}			
	
		// prepare data to passed to the template
		$data['geo'] = $header_data['geo'];
		$data['user'] = $user;
		$data['profile_image_path'] = $dir = $this->Config_model->get_value('CACHED_PROFILE_IMAGES')->value;
		$data['upload_path'] = 	$upload_path;
		$data['image_exist'] = 	$image_exist;
		$data['image_file'] = 	$image_file;			
		$data['user_training_org'] = $user_training_org;
		$data['user_certificate'] = $user_certificate;
		$data['user_tags'] = $user_tags;
		
		
		
		$this->load->view('header', $header_data);
		$this->load->view('trainers',$data);
		$this->load->view('footer');
		
		
   }

 
}
?>