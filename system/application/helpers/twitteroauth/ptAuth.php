<?php
// require twitterOAuth lib
require_once('twitterOAuth.php');

class PtAuth {

	var $consumer_key = 'PWL8ezHZPbtED2rhpXPWQ'; /* Consumer key from twitter */
	var $consumer_secret = 'DJrz72RUai9fo2ARYj1RLkxnZFv4bnbb7lRrrSB3Zzg'; /* Consumer Secret from twitter */
	var $state;
	var $content;
	var $session_token;
	var $oauth_token;
	var $section;
	
	function PtAuth () {
		session_start();
		$this->content = NULL;
		$this->state = $_SESSION['oauth_state'];
		$this->session_token = $_SESSION['oauth_request_token'];
		$this->oauth_token = $_REQUEST['oauth_token'];
		$this->section = $_REQUEST['section'];
	}
	
	
	function init() {

	}
	
	function clear_session() {		
	  session_destroy();
	  session_start();
	}

	
	function require_authentication() {		
	
 		  return true;
	}

	function get_url() {
    	$to = new TwitterOAuth($this->consumer_key, $this->consumer_secret);
    	$tok = $to->getRequestToken();		
    	$_SESSION['oauth_request_token'] = $token = $tok['oauth_token'];
    	$_SESSION['oauth_request_token_secret'] = $tok['oauth_token_secret'];
    	$_SESSION['oauth_state'] = "start";
    	$request_link = $to->getAuthorizeURL($token);
		$data = array ('url'=>$request_link, 'oauth_request_token'=> $token , 'oauth_request_token_secret'=>$tok['oauth_token_secret']);
    	return  $data;
	}
	

	function get_auth_content() {
		 /* If the access tokens are already set skip to the API call */
			if ($_SESSION['oauth_access_token'] === NULL && $_SESSION['oauth_access_token_secret'] === NULL) {
			  /* Create TwitterOAuth object with app key/secret and token key/secret from default phase */
			  $to = new TwitterOAuth($consumer_key, $consumer_secret, $_SESSION['oauth_request_token'], $_SESSION['oauth_request_token_secret']);
			  /* Request access tokens from twitter */
			  $tok = $to->getAccessToken();
		
			  /* Save the access tokens. Normally these would be saved in a database for future use. */
			  $_SESSION['oauth_access_token'] = $tok['oauth_token'];
			  $_SESSION['oauth_access_token_secret'] = $tok['oauth_token_secret'];
			}
			/* Random copy */
			$content = 'your account should now be registered with twitter. Check here:<br />';
			$content .= '<a href="https://twitter.com/account/connections">https://twitter.com/account/connections</a>';
		
			/* Create TwitterOAuth with app key/secret and user access key/secret */
			$to = new TwitterOAuth($consumer_key, $consumer_secret, $_SESSION['oauth_access_token'], $_SESSION['oauth_access_token_secret']);
			/* Run request on twitter API as user. */
		$content = $to->OAuthRequest('https://twitter.com/account/verify_credentials.xml', array(), 'GET');

		$content_array = array ('content'=>$content, 'oauth_access_token'=> $_SESSION['oauth_access_token'] , 'oauth_access_token_secret'=>$_SESSION['oauth_access_token_secret']);

		return $content_array;
	}	
	
function get_content($oauth_access_token,$oauth_access_token_secret) {
				$to = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $oauth_access_token, $oauth_access_token_secret);
			//$to = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $oauth_access_token,$oauth_access_token_secret);
			$content = $to->OAuthRequest('https://twitter.com/account/verify_credentials.xml', array(), 'GET');
		
			$content_array = array ('content'=>$content, 'oauth_access_token'=>$oauth_access_token , 'oauth_access_token_secret'=>$oauth_access_token_secret);
			
			return $content_array;
}	

function post_status($oauth_access_token,$oauth_access_token_secret, $tweet) {
				$to = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $oauth_access_token, $oauth_access_token_secret);
			//$to = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $oauth_access_token,$oauth_access_token_secret);
    $content = $to->OAuthRequest('https://twitter.com/statuses/update.xml', array('status' => $tweet), 'POST');

		
			$content_array = array ('content'=>$content, 'oauth_access_token'=>$oauth_access_token , 'oauth_access_token_secret'=>$oauth_access_token_secret);

			return $content_array;
}	
	

}

?>