<?php
class User_model extends Model
{
  function User_model()
  {
    parent::Model();
  }

  function add_user()
  {
  	$user_id = $this->input->post('id');
    $twitter_name = $this->input->post('twitter_name');
    $country_id = $this->input->post('country');;
	$county_id = $this->input->post('county');
    $state_id = $this->input->post('state');
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
	$oauth_access_token = $this->input->post('oauth_token');
	$oauth_access_token_secret = $this->input->post('oauth_token_secret');
	$statuses_count = $this->input->post('statuses_count');	
	$followers_count = $this->input->post('followers_count');	
	$friends_count =  $this->input->post('friends_count');		
	$description = $this->input->post('description');
	$url = $this->input->post('url');	
	
	$array = array('user_id' => $user_id, 
				   'twitter_name' => $twitter_name, 
				    'country_id' => $country_id,
					'state_id' =>$state_id,
					'county_id' =>$county_id,
				    'profile_image_url' => $profile_image_url,					
					'email' => $email,
					'hide_email' => $hide_email,
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
					'url'=>$url					
					);
					

	$this->db->set($array);
	$this->db->insert('users');
	
	/*
    $this->db->query("INSERT INTO users (twitter_name, country_id, county_id) 
					  VALUES ('$twitter_name', $country_id, 1)");*/
  }
	
  function update_user($user_id)
  {

  	$user_id = $this->input->post('id');
    $twitter_name = $this->input->post('twitter_name');
    $country_id = $this->input->post('country');;
	$county_id = $this->input->post('county');
    $state_id = $this->input->post('state');
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
	$oauth_access_token = $this->input->post('oauth_token');
	$oauth_access_token_secret = $this->input->post('oauth_token_secret');
	$statuses_count = $this->input->post('statuses_count');	
	$followers_count = $this->input->post('followers_count');	
	$friends_count =  $this->input->post('friends_count');		
	$description = $this->input->post('description');
	$url = $this->input->post('url');

		
	$array = array('user_id' => $user_id, 
				   'twitter_name' => $twitter_name, 
				    'country_id' => $country_id,
					'state_id' =>$state_id,
					'county_id' =>$county_id,
				    'profile_image_url' => $profile_image_url,					
					'email' => $email,
					'hide_email' => $hide_email,
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
					'url'=>$url					
					);

	$this->db->where('user_id', $user_id);
	$this->db->update('users', $array);

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
  
  function get_latest_users($country_id, $state_id, $county_id, $all=TRUE, $offset, $num_recs, $order_by) {
  				$this->db->where('country_id', $country_id);
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
  
  function get_latest_users_by_tag($country_id, $state_id, $county_id, $all=TRUE, $offset, $num_recs, $tag_id) {
  		$this->db->where('country_id', $country_id);
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
    
  
  function count_latest_users($country_id, $state_id, $county_id, $all=TRUE) {
  		
	if (!$all) {

		if ($county_id!=0)
			$this->db->where('county_id', $county_id);
	}		
	 $this->db->where('country_id', $country_id);			 
	 $result = $this->db->count_all_results('users');
	 return $result;
  }  
  
  function get_users_per_county($county_id) {
  
	if ($county_id!=0)
			$this->db->where('county_id', $county_id);  
	$this->db->from('users');
	return $this->db->count_all_results();			
  	
  }
  
  function get_users_per_state($state_id) {
  if ($state_id!=0)
	$this->db->where('state_id', $state_id);  
	$this->db->from('users');
	return $this->db->count_all_results();			
  	
  }
   
}
?>