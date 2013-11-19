<?php 
require_once(APPPATH."/helpers/epitwitter/EpiCurl.php");	
require_once(APPPATH."/helpers/epitwitter/EpiOAuth.php");	
require_once(APPPATH."/helpers/epitwitter/EpiTwitter.php");	
//require_once APPPATH .'libraries/facebook/facebook.php';
require_once(APPPATH."/helpers/facebook/facebook_auth.php");

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
if ( ! function_exists('test_method'))
{
    function test_method($var = '')
    {
      $ci=& get_instance();
      $ci->load->database(); 
	  $fb_data = _fb_login();
	  print_r($fb_data);
      //$sql = "select * from table"; 
      ///$query = $ci->db->query($sql);
      //$row = $query->result();
    }   
}
*/

if ( ! function_exists('get_header_data'))
{
    function get_header_data()
    {
    
		$user_logged_in = false;
	  $ci=& get_instance();	  
	  //echo _get_twitter_consumer_key();
	  //echo _get_twitter_consumer_secret();
	  $twitterObj = new EpiTwitter(_get_twitter_consumer_key(), _get_twitter_consumer_secret());
	  /*$creds = $twitterObj->get('/account/verify_credentials.json');  
		var_dump($creds->response);*/
	  if (isset($_COOKIE['user_id'])) {
		$user_data = _get_user($_COOKIE['user_id']);	
		$user_logged_in = true;
	  }	  
	  try {
	  $header_data['twitter_request_url'] =  $twitterObj->getAuthenticateUrl();	
	  } catch (Exception $e) {
		//echo 'Caught exception: ',  $e->getMessage(), "\n";
	 }
	  
	  // facebook (start)
		// $fb_data = _fb_login();		
		// $header_data['session'] = $fb_data['session'];
		// $header_data['logoutUrl'] = $fb_data['logoutUrl'];
		// $header_data['loginUrl'] = $fb_data['loginUrl'];
		// $header_data['me'] = $fb_data['me'];
	
	  // facebook (end)
	  
		// alerts (start)
		$email_verified = $user_data->email_verified;
		$active	= $user_data->active;			
		// handle image
		$upload_path = $ci->Config_model->get_value('UPLOADED_PROFILE_IMAGES')->value;		
		// check if the image exist

		foreach (glob($upload_path.$user_data->user_id."*.*") as $filename) {
			$image_exist = true;			
		}	
		
		
		$email_verified_msg = $ci->Config_model->get_value('EMAIL_NOT_VERIFIED_MSG')->value;
		$incomplete_profile_msg = $ci->Config_model->get_value('INCOMPLETE_PROFILE_MSG')->value;  
		
		if ($user_logged_in && $email_verified==0 && $active==1) { 
			$alert_show = true;
			$alert_msg  = $email_verified_msg;
			if (!$image_exist) $alert_msg = $alert_msg." Also remember to "."<a href=\"http://personaltrainerwall.com/index.php?c=add&amp;m=image\">upload</a>"." your profile image.";
		} 
		elseif ($user_logged_in && $email_verified==1 && $active==1 && !$image_exist) {
			$alert_show = true;
			$alert_msg = "Hey remember to "."<a href=\"http://personaltrainerwall.com/index.php?c=add&amp;m=image\">upload</a>"." your profile image to get you started on the wall.";
		}
		elseif ($user_logged_in && $active==0) {
			$alert_show = true;
			$alert_msg = $incomplete_profile_msg;
		}			
		
		// alerts (finish)
	  
		$header_data['user_logged_in'] = $user_logged_in;
		$header_data['active'] =  $user_data ->active;
		$header_data['alert_show'] = $alert_show;
		$header_data['alert_msg'] = $alert_msg;
		$header_data['user'] =  $user_data;	  	 
		//print_r($header_data);
	  	return $header_data;
    }   
}

//Function to add the Twitter [twitter_request_url] to the body of the page .JB

if ( ! function_exists('get_twitter_request_url'))
{
    function get_twitter_request_url()
    {
			$user_logged_in = false;
			$CI=& get_instance();	  
			//echo _get_twitter_consumer_key().'===='._get_twitter_consumer_secret();
			$twitterObj = new EpiTwitter(_get_twitter_consumer_key(), _get_twitter_consumer_secret());
	  	//print_r($twitterObj);
			if (isset($_COOKIE['user_id'])) {
				$user_data = _get_user($_COOKIE['user_id']);	
				$user_logged_in = true;
			}
	  try {
	 	 $data['twitter_request_url'] =  $twitterObj->getAuthenticateUrl();	
	  } catch (Exception $e) {
			//echo "erre";
			//echo 'Caught exception: '. $e->getMessage(). "\n";
			//print_r( $e);
	  }
	  
		//print_r($header_data);
	  	return $data;
    }   
}




if ( ! function_exists('header_get_auth_mode'))
{
    function header_get_auth_mode()
    {
		$fb_data = _fb_login();	

		if ($fb_data['me'])
			$auth_mode = "facebook";
		elseif (isset($_COOKIE['oauth_token']) && isset($_COOKIE['oauth_token_secret']))
			$auth_mode = "twitter";
		elseif ($_GET['oauth_token'])
			$auth_mode = "twitter";
		else
			return -1;
		return $auth_mode;
    }   
}





if ( ! function_exists('get_location_drops'))
{
    function get_location_drops()
    {
		$country=$_REQUEST['country']; //$this->input->post("country");	
		$state = $_REQUEST['state']; //$this->input->post('state');	
		$county = $_REQUEST['county']; //$this->input->post('county');	
		$sort_by = $_REQUEST['sort_menu']; //$this->input->post('sort_menu');	
		$tag_id = $_REQUEST['sort_options']; //$this->input->post('sort_options');						
		$search = $_REQUEST['search'];
		$tag_list = $_REQUEST['tag_list'];
				
		$ci=& get_instance();
		$ci->load->database(); 
		
		// default country US - 223 in DB
		if (!$country) $country = 223;
		
		
		$res=$ci->State_model->get($country);		
		$state_ddmenu = array();
		$state_ddmenu[0] = 'All States';		
		foreach ($res as $tablerow) {
  			$result = get_object_vars($tablerow);
			$res_count=$ci->User_model->get_users_per_state($result['id']);
			if ($res_count>0)	
   				$state_ddmenu[$result['id']] = $result['name'].'('.$res_count.")";
		}			
		
		

		$res=$ci->County_model->get($country,$state);		
		$county_menu = array();
				
		$res_count=$ci->User_model->get_users_per_state($state);		
		
		$state_name = $ci->State_model->get_name_by_id($state);
		
		$county_menu[0] = "All $state_name Regions";	
		foreach ($res as $tablerow) {
  			$result = get_object_vars($tablerow);
			$res_count=$ci->User_model->get_users_per_county($result['county_id']);
			if ($res_count>0)					
   				$county_menu[$result['county_id']] = $result['name'].'('.$res_count.")";
		}	
		
		// tags - start
		
		$query = $ci->db->query('SELECT t.tag_id,t.tag,tg.name FROM tags as t, tag_group as tg where t.tag_group_id = tg.tag_group_id order by tg.name asc');
		

		if ($country) {
			$query2 = $ci->db->query("SELECT tag_id, COUNT(tag_id) as tag_count FROM user_tags where user_id IN (select user_id from users where country_id='$country' and approved=1) GROUP BY tag_id ");
			if ($state) {
				$query2 = $ci->db->query("SELECT tag_id, COUNT(tag_id) as tag_count FROM user_tags where user_id IN (select user_id from users where country_id='$country' and state_id='$state' and approved=1) GROUP BY tag_id ");
				if ($county) {
					$query2 = $ci->db->query("SELECT tag_id, COUNT(tag_id) as tag_count FROM user_tags where user_id IN (select user_id from users where country_id='$country' and state_id='$state' and county_id = '$county' and approved=1) GROUP BY tag_id ");
				}
			}		
		}

		
		$tag_count = array();
		
		foreach ($query2->result() as $row)
		{
			$tag_count[$row->tag_id] = $row->tag_count;
		}	
				
		
		$sort_options = array();
		$sort_options[0] = "#All Tags";
		foreach ($query->result() as $row)
		{
			
			if (isset($tag_count[$row->tag_id]))
				$sort_options[$row->tag_id] = $row->name.' - #'.$row->tag."(".$tag_count[$row->tag_id].")";
				
		}			
		
		
		// tags - end
		
		// hidden
		
		$hidden_data = array(
		  'country'  => $country
		); 		
		
		$data['state_list'] = $state_ddmenu;
		$data['country'] = $country;
		$data['county_list'] = $county_menu;
		$data['sort_options'] = $sort_options;				
		$data['sort_selected'] = $sort_by;					
		$data['state_selected'] = $state;				
		$data['county_selected'] = $county;	
		$data['hidden_data'] = $hidden_data;
		
		
		return $data;
		
	}
	
}

if ( ! function_exists('get_user_thumb'))
{
    function get_user_thumb($user_id)
    {
      if (strlen($user_id)==0)
		return "./images/default-profile-image.jpg";
	  
	  $ci=& get_instance();
      $ci->load->database(); 
      $sql = "select profile_image_url, auth from users where user_id = '$user_id'"; 
      $query = $ci->db->query($sql);
	  $row = $query->row();
	  $consumer_key =  $ci->Config_model->get_value('CONSUMER_KEY')->value;
	  
	  
	  if ($row->auth=="facebook")
		$url = $row->profile_image_url;
	  else {
		$profile_image_path = $ci->Config_model->get_value('CACHED_PROFILE_IMAGES')->value;
		$url = $profile_image_path.md5($row->profile_image_url).".".substr(strrchr($row->profile_image_url, '.'), 1);
	  }	  

	  return $url;
    }   
	
	}
	
	function _get_twitter_consumer_key() {

	  $ci=& get_instance();
      $ci->load->database(); 
	  return  $ci->Config_model->get_value('CONSUMER_KEY')->value;
			$this->consumer_secret =  $this->Config_model->get_value('CONSUMER_SECRET')->value;		  
	}
	
	function _get_twitter_consumer_secret() {

	  $ci=& get_instance();
      $ci->load->database(); 
	  return  $ci->Config_model->get_value('CONSUMER_SECRET')->value;	
  
	}	
	
	function _get_user($user_id) {	
	  $ci=& get_instance();
      $ci->load->database(); 
	  return $ci->User_model->get_user($user_id);		
	}
	


?>