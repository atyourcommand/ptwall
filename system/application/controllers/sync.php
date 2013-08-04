<?php
require_once(APPPATH."/helpers/epitwitter/EpiCurl.php");	
require_once(APPPATH."/helpers/epitwitter/EpiOAuth.php");	
require_once(APPPATH."/helpers/epitwitter/EpiTwitter.php");


class Sync extends Controller {

		var $consumer_key = 'PWL8ezHZPbtED2rhpXPWQ'; /* Consumer key from twitter */
		var $consumer_secret = 'DJrz72RUai9fo2ARYj1RLkxnZFv4bnbb7lRrrSB3Zzg'; /* Consumer Secret */
		
	
		 function __construct()
		 {
			parent::Controller();
		 }
		     
		function index()
		{
			set_time_limit(0);
			$this->load->model('User_model');
			$twitterObj = new EpiTwitter($this->consumer_key, $this->consumer_secret);
			
			$query = $this->db->query("SELECT twitter_name, user_id, oauth_access_token, oauth_access_token_secret from users order by twitter_name asc");

			foreach ($query->result() as $row)
			{
				if ($row->oauth_access_token && $row->oauth_access_token_secret) {
				echo $row->twitter_name;
				$twitterObj->setToken($row->oauth_access_token, $row->oauth_access_token_secret);
				try {		
				$twitterInfo= $twitterObj->get_accountVerify_credentials();		
				echo "-Updating...";
			
				$data = array(
							   'profile_image_url' => $twitterInfo->profile_image_url,
							   'statuses_count' => $twitterInfo->statuses_count,
							   'followers_count' => $twitterInfo->followers_count,
							   'friends_count' => $twitterInfo->friends_count,
							   'description' => $twitterInfo->description
							);
				
				$this->db->where('user_id', $row->user_id);
				$this->db->update('users', $data); 	
				
					} 
				catch (Exception $e) {
    					echo "-...Error";;
				}	
				echo "<br>";
				sleep(2);			
				}
				
				
			}				
			
		}
		
		function profile()
		{
			set_time_limit(0);
			$this->load->model('User_model');
			$twitterObj = new EpiTwitter($this->consumer_key, $this->consumer_secret);
			
			$user = $this->input->get('user');
			
			$sql = "SELECT twitter_name, user_id, oauth_access_token, oauth_access_token_secret from users where twitter_name='$user'";
			$query = $this->db->query($sql);

			foreach ($query->result() as $row)
			{
				if ($row->oauth_access_token && $row->oauth_access_token_secret) {
				echo $row->twitter_name;
				$twitterObj->setToken($row->oauth_access_token, $row->oauth_access_token_secret);
				try {		
				$twitterInfo= $twitterObj->get_accountVerify_credentials();		
				echo "-Updating...";
			
				$data = array(
							   'profile_image_url' => $twitterInfo->profile_image_url,
							   'statuses_count' => $twitterInfo->statuses_count,
							   'followers_count' => $twitterInfo->followers_count,
							   'friends_count' => $twitterInfo->friends_count,
							   'description' => $twitterInfo->description
							);
				
				$this->db->where('user_id', $row->user_id);
				$this->db->update('users', $data); 	
				
					} 
				catch (Exception $e) {
    					echo "-...Error";;
				}	
				echo "<br>";
				sleep(2);			
				}
				
				
			}				
			
		}
		

}
?>