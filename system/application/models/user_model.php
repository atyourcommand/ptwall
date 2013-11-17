<?php
class User_model extends Model
{
  function User_model()
  {
    parent::Model();
    $this->load->library('log');
    //$this->log->ptwall_log("Testing");
  }

  function add_user()
  {
  	$user_id = $this->input->post('id');
    $twitter_name = $this->input->post('twitter_name');
    $country_id = $this->input->post('country');
	$county_id = $this->input->post('county');
    $state_id = $this->input->post('state');
	$city_id = $this->input->post('city');	
	$profile_image_url =  $this->input->post('image_url');
	$email =  $this->input->post('email');
	$first_name = $this->input->post('first_name');
	$last_name = $this->input->post('last_name');
	$training_org = $this->input->post('training_org');	
	$certificate= $this->input->post('certificate');	
	$insurance_org = $this->input->post('insurance_org');	
	$cert_reg_no = $this->input->post('cert_reg_no');
	$cert_expiry= $this->input->post('cert_expiry');
	$insurance_reg_no = $this->input->post('insurance_reg_no');
	$insurance_expiry = $this->input->post('insurance_expiry');				
	$hide_email = $this->input->post('hide_email');
	$hide_google_map = $this->input->post('hide_google_map');
	$hide_phone = $this->input->post('hide_phone');		
	$oauth_access_token = $this->input->post('oauth_token');
	$oauth_access_token_secret = $this->input->post('oauth_token_secret');
	$statuses_count = $this->input->post('statuses_count');	
	$followers_count = $this->input->post('followers_count');	
	$friends_count =  $this->input->post('friends_count');		
	$description = $this->input->post('description');
	$url = $this->input->post('url');
	$phone_no = $this->input->post('phone_no');	
	$facebook_url = $this->input->post('facebook_url');	
	$linkedin_url = $this->input->post('linkedin_url');	
	$workplace_url = $this->input->post('workplace_url');	
	$street_address = $this->input->post('street_address');
	$auth = $this->input->post('auth');		
	$guest = $this->input->post('guest');
    $sponsor = $this->input->post('sponsor');
    $business_name = $this->input->post('business_name');
	$show_retweets = $this->input->post('show_retweets');	
	$show_apps = $this->input->post('show_apps');			

	$array = array('user_id' => $user_id, 
				   'twitter_name' => $twitter_name, 
				    'country_id' => $country_id,
					'state_id' =>$state_id,
					'county_id' =>$county_id,
					'city_id' =>$city_id,
				    'profile_image_url' => $profile_image_url,					
					'email' => $email,
					'hide_email' => $hide_email,
					'hide_google_map' => $hide_google_map,					
					'hide_phone' => $hide_phone,					
					'first_name' => $first_name,
					'last_name' => $last_name,
					'training_org_id' =>$training_org,
					'insurance_org_id' =>$insurance_org,
					'certificate_id' =>$certificate,
					'cert_reg_no'=>$cert_reg_no,
					'cert_expiry'=>$cert_expiry,
					'insurance_reg_no'=>$insurance_reg_no,
					'insurance_expiry' =>$insurance_expiry,
					'oauth_access_token' => $oauth_access_token,
					'oauth_access_token_secret' => $oauth_access_token_secret,
	  				'statuses_count'=>$statuses_count,
			  		'followers_count'=>$followers_count,
			  		'friends_count'=>$friends_count,
					'description'=>$description,											
					'url'=>$url,
					'phone_no'=> $phone_no,
					'facebook_url' => $facebook_url,
					'linkedin_url' => $linkedin_url,
					'workplace_url' => $workplace_url,
					'street_address' => $street_address,
					'auth' => $auth,
                    'guest' => $guest,
                    'sponsor'=> $sponsor,
                    'business_name' => $business_name,
					'show_retweets'=> $show_retweets,
                    'show_apps' => $show_apps
					);
					
	$this->db->set($array);
	$this->db->insert('users');
	
	/*
    $this->db->query("INSERT INTO users (twitter_name, country_id, county_id) 
					  VALUES ('$twitter_name', $country_id, 1)");*/
        $log = print_r($array, true);
        // logging

        $this->log->ptwall_log("Added User : ".$log);

  }
  
    // Delete user function (JB)
  
  function user_delete (){
   //global $db; //not required 
   $this->db->query("DELETE FROM 'users' where 'id'='$_SESSION[user_id]' OR 'id' = '$_COOKIE[user_id]'");
   //logout(); //not here 
   //log
   $this->log->ptwall_log("Deleted User : ".$log);
  
  }
 
  function update_user($user_id)
  {

  	$user_id = $this->input->post('id');
    $twitter_name = $this->input->post('twitter_name');
    $country_id = $this->input->post('country');
	$county_id = $this->input->post('county');
    $state_id = $this->input->post('state');
	$city_id = $this->input->post('city');
	$profile_image_url =  $this->input->post('image_url');
	$email =  $this->input->post('email');
	$first_name = $this->input->post('first_name');
	$last_name = $this->input->post('last_name');
	$training_org = $this->input->post('training_org');	
	$certificate= $this->input->post('certificate');	
	$insurance_org = $this->input->post('insurance_org');	
	$cert_reg_no = $this->input->post('cert_reg_no');
	$cert_expiry= $this->input->post('cert_expiry');
	$insurance_reg_no = $this->input->post('insurance_reg_no');
	$insurance_expiry = $this->input->post('insurance_expiry');				
	$hide_email = $this->input->post('hide_email');
	$hide_google_map = $this->input->post('hide_google_map');
	$hide_phone = $this->input->post('hide_phone');	
	$oauth_access_token = $this->input->post('oauth_token');
	$oauth_access_token_secret = $this->input->post('oauth_token_secret');
	$statuses_count = $this->input->post('statuses_count');	
	$followers_count = $this->input->post('followers_count');	
	$friends_count =  $this->input->post('friends_count');		
	$description = $this->input->post('description');
	$url = $this->input->post('url');
	$phone_no = $this->input->post('phone_no');	
	$facebook_url = $this->input->post('facebook_url');	
	$linkedin_url = $this->input->post('linkedin_url');	
	$workplace_url = $this->input->post('workplace_url');	
	$street_address = $this->input->post('street_address');		
	$auth = $this->input->post('auth');
	$guest = $this->input->post('guest');
	$sponsor = $this->input->post('sponsor');
	$business_name = $this->input->post('business_name');
	$show_retweets = $this->input->post('show_retweets');	
	$show_apps = $this->input->post('show_apps');		
   

        
	$array = array('user_id' => $user_id, 
				   'twitter_name' => $twitter_name, 
				    'country_id' => $country_id,
					'state_id' =>$state_id,
					'county_id' =>$county_id,
					'city_id' =>$city_id,					
				    'profile_image_url' => $profile_image_url,					
					'email' => $email,
					'hide_email' => $hide_email,
					'hide_google_map' => $hide_google_map,					
					'hide_phone' => $hide_phone,					
					'first_name' => $first_name,
					'last_name' => $last_name,
					'training_org_id' =>$training_org,
					'insurance_org_id' =>$insurance_org,
					'certificate_id' =>$certificate,
					'cert_reg_no'=>$cert_reg_no,
					'cert_expiry'=>$cert_expiry,
					'insurance_reg_no'=>$insurance_reg_no,
					'insurance_expiry' =>$insurance_expiry,
					'oauth_access_token' => $oauth_access_token,
					'oauth_access_token_secret' => $oauth_access_token_secret,
	  				'statuses_count'=>$statuses_count,
			  		'followers_count'=>$followers_count,
			  		'friends_count'=>$friends_count,
					'description'=>$description,											
					'url'=>$url,
					'phone_no'=> $phone_no,
					'facebook_url' => $facebook_url,
					'linkedin_url' => $linkedin_url,
					'workplace_url' => $workplace_url,
					'street_address' => $street_address,
					'auth' => $auth,
                    'guest' => $guest,
					'sponsor'=> $sponsor,
					'business_name' => $business_name,
					'show_retweets'=> $show_retweets,
                    'show_apps' => $show_apps
                    
					);

	
	$this->db->where('user_id', $user_id);
	$this->db->update('users', $array);

        $log = print_r($array, true);
        // logging
        $this->log->ptwall_log("Updated User : ".$log);

  }
  
  
  	
  function user_exist($user_id) {  
  	$query = $query = $this->db->get_where('users', array('user_id'=>$user_id));
	if($query->num_rows()>0)
		return true;
	else
		return false;	
  }
  
  function get_user($user_id)
  {
    $query = $this->db->get_where('users', array('user_id'=>$user_id));
    return $query->row(); 
  }
  
  function get_user_by_twitter_name($twitter_name)
  {
    $query = $this->db->get_where('users', array('twitter_name'=>$twitter_name));
    return $query->row(); 
  }


  //active & approved - good to be used for members
  
  
  function get_latest_users($country_id, $state_id, $county_id, $all=TRUE, $offset, $num_recs, $order_by, $show_guests) {
  	
	$this->db->where('country_id', $country_id);
	$this->db->where('active', 1);
	$this->db->where('approved', 1);
        
	if ($show_guests == true)
		$this->db->where('guest', 1);
	else
		$this->db->where('guest', 0);
	
	if (!$all) {
     //$query = $this->db->get_where('users', array('country_id'=>'233', 'state_id'=>$state_id, 'county_id'=>$county_id));

		if ($state_id!=0)
			$this->db->where('state_id', $state_id);
		if ($county_id!=0)
			$this->db->where('county_id', $county_id);
	}	
	
	if ($order_by)
		$this->db->order_by($order_by,"desc"); 				 
	else 
		$this->db->order_by("joined","desc");
		
	 $query = $this->db->get('users',$num_recs,$offset);
	 return $query->result();
	 
  }
  
  
  
  //just active - good to be used for all verified users
  function get_latest_users_for_stats($country_id, $state_id, $county_id, $all=TRUE, $offset, $num_recs, $order_by) {
  	$this->db->where('country_id', $country_id);
	//$this->db->where('active', 1);
	//$this->db->where('approved', 1);
	//$this->db->where('subscribed', 1);
	
	if (!$all) {
		if ($state_id!=0)
			$this->db->where('state_id', $state_id);
		if ($county_id!=0)
			$this->db->where('county_id', $county_id);
	}	
	
	if ($order_by)
		$this->db->order_by($order_by,"desc"); 				 
	else 
		$this->db->order_by("joined","desc");
		
	 $query = $this->db->get('users',$num_recs,$offset);
	 return $query->result();
  }
	
	//just active - good to be used for Guests
  function get_latest_guests_for_stats($country_id, $state_id, $county_id, $all=TRUE, $offset, $num_recs, $order_by) {
  	$this->db->where('country_id', $country_id);

	$this->db->where('active', 1);
	//$this->db->where('approved', 1);
	//$this->db->where('subscribed', 1);
    $this->db->where('guest', 1);
	if (!$all) {
		if ($state_id!=0)
			$this->db->where('state_id', $state_id);
		if ($county_id!=0)
			$this->db->where('county_id', $county_id);
	}

	if ($order_by)
		$this->db->order_by($order_by,"desc");
	else
		$this->db->order_by("joined","desc");

	 $query = $this->db->get('users',$num_recs,$offset);
	 return $query->result();
  }
  
  function search_users($country_id, $first_name, $last_name, $all=TRUE, $offset, $num_recs, $order_by) {
  
  	$this->db->where('country_id', $country_id);
	$this->db->where('lower(first_name)', strtolower($first_name));
	$this->db->where('lower(last_name)', strtolower($last_name));
	$this->db->where('approved', 1);
	$this->db->where('active', 1);

	if ($order_by)
		$this->db->order_by($order_by,"desc"); 				 
	else 
		$this->db->order_by("joined","desc");
		
	 $query = $this->db->get('users',$num_recs,$offset);
	 
	 return $query->result();
  }
  
    function count_search_users($country_id, $first_name, $last_name, $all=TRUE) {
  
  	$this->db->where('country_id', $country_id);
	$this->db->where('lower(first_name)', strtolower($first_name));
	$this->db->where('lower(last_name)', strtolower($last_name));
	$this->db->where('active', 1);
	$this->db->where('approved', 1);
	$result = $this->db->count_all_results('users');	
	 return $result;
  }
  
  
  function get_latest_users_by_tag($country_id, $state_id, $county_id, $all=TRUE, $offset, $num_recs, $tag_id) {
  		$this->db->where('country_id', $country_id);
		$this->db->where('active', 1);
		$this->db->where('approved', 1);
	if (!$all) {
     //$query = $this->db->get_where('users', array('country_id'=>'233', 'state_id'=>$state_id, 'county_id'=>$county_id));
		//$this->db->where('country_id', $country_id);
		
		if ($state_id!=0)
			$this->db->where('state_id', $state_id);
		if ($county_id!=0)
			$this->db->where('county_id', $county_id);
	}	
	
	if ($tag_id) {
		$query = $this->db->query('SELECT user_id  FROM user_tags where tag_id='.$tag_id);			 
		$users = array();
		foreach ($query->result() as $row)
		{
			$users[] = $row->user_id;
		}				
			$this->db->where_in('user_id', $users);
	}
		
	 $query = $this->db->get('users',$num_recs,$offset);
	 return $query->result();
  }
    
	
  function count_latest_users_by_tag($country_id, $state_id, $county_id, $all=TRUE,$tag_id) {
  		$this->db->where('country_id', $country_id);
		$this->db->where('active', 1);
		$this->db->where('approved', 1);
	if (!$all) {
     //$query = $this->db->get_where('users', array('country_id'=>'233', 'state_id'=>$state_id, 'county_id'=>$county_id));
		//$this->db->where('country_id', $country_id);
		
		if ($state_id!=0)
			$this->db->where('state_id', $state_id);
		if ($county_id!=0)
			$this->db->where('county_id', $county_id);
	}	
	
	if ($tag_id) {
		$query = $this->db->query('SELECT user_id  FROM user_tags where tag_id='.$tag_id);			 
		$users = array();
		foreach ($query->result() as $row)
		{
			$users[] = $row->user_id;
		}				
			$this->db->where_in('user_id', $users);
	}
	 $result = $this->db->count_all_results('users');	
	 
	 return $result;
  }	
  
  function count_latest_users($country_id, $state_id, $county_id, $all=TRUE, $show_guests) {
  
  	$this->db->where('active', 1);	
	$this->db->where('approved', 1);

        
	if ($show_guests == true)
		$this->db->where('guest', 1);
	else
		$this->db->where('guest', 0);
	
	if (!$all) {

		if ($county_id!=0){
			$this->db->where('county_id', $county_id);
		}
		if ($state_id!=0){
			$this->db->where('state_id', $state_id);
		}
	}		
	 $this->db->where('country_id', $country_id);			 
	 $result = $this->db->count_all_results('users');
	 return $result;
  }  
  
  function get_users_per_county($county_id) {
  	$this->db->where('active', 1);
  	$this->db->where('approved', 1);
	if ($county_id!=0)
		$this->db->where('county_id', $county_id);  
		$this->db->from('users');
		return $this->db->count_all_results();			
  }
  
  function get_users_per_state($state_id) {
  $this->db->where('active', 1);
  $this->db->where('approved', 1);
  if ($state_id!=0)
	$this->db->where('state_id', $state_id);  
	$this->db->from('users');
	return $this->db->count_all_results();			
  	
  }
  
  function set_default_upload_image($user_id, $image) {
  
  	$this->db->query("update users set user_uploaded_image = 1, default_uploaded_image ='$image' where user_id = '$user_id'");
  
  }
  
  function remove_default_upload_image($user_id) {
  
  	$this->db->query("update users set user_uploaded_image = 0, default_uploaded_image ='' where user_id = '$user_id'");

  }
    
  function set_user_active($user_id, $active) {
  
  	$this->db->query("update users set active = $active where user_id = '$user_id'");
  
  }

  function user_email_exist($email) {

    $this->db->where('email', $email);
    $this->db->from('users');

    if ($this->db->count_all_results() > 0)
            return true;
    else
            return false;


  }
}
?>