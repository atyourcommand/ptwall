<?php
// require twitterOAuth lib
require_once('twitterOAuth.php');

class PtAuth {

	var $consumer_key = '5n6pWZKdgoTVcpg2EvwwHg'; /* Consumer key from twitter */
	var $consumer_secret = 'XfUENoiAel7GoRCayaFQzXuHy77rRWxbAbvyR0Nj30'; /* Consumer Secret from twitter */
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
		if ($_REQUEST['oauth_token'] != NULL && $_SESSION['oauth_state'] === 'start') {/*{{{*/
		  $_SESSION['oauth_state'] = $this->state = 'returned';
		  return false;
		}		
 		  return true;
	}

	function get_url() {
    	$to = new TwitterOAuth($this->consumer_key, $this->consumer_secret);
    	$tok = $to->getRequestToken();		
    	$_SESSION['oauth_request_token'] = $token = $tok['oauth_token'];
    	$_SESSION['oauth_request_token_secret'] = $tok['oauth_token_secret'];
    	$_SESSION['oauth_state'] = "start";
    	$request_link = $to->getAuthorizeURL($token);
    	return  $request_link;
	}
	

	function get_auth_content() {

		/* If the access tokens are already set skip to the API call */
		if ($_SESSION['oauth_access_token'] === NULL && $_SESSION['oauth_access_token_secret'] === NULL) {
		  /* Create TwitterOAuth object with app key/secret and token key/secret from default phase */
		  $to = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $_SESSION['oauth_request_token'], $_SESSION['oauth_request_token_secret']);
		  /* Request access tokens from twitter */
		  $tok = $to->getAccessToken();
	
		  /* Save the access tokens. Normally these would be saved in a database for future use. */
		  $_SESSION['oauth_access_token'] = $tok['oauth_token'];
		  $_SESSION['oauth_access_token_secret'] = $tok['oauth_token_secret'];
		  
		   $_SESSION['oauth_state'] = $this->state = 'returned';
		}
	
		$to = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $_SESSION['oauth_access_token'], $_SESSION['oauth_access_token_secret']);
		$content = $to->OAuthRequest('https://twitter.com/account/verify_credentials.xml', array(), 'GET');
		
		$content_array = array ('content'=>$content, 'oauth_access_token'=> $_SESSION['oauth_access_token'] , 'oauth_access_token_secret'=>$_SESSION['oauth_access_token_secret']);
		
		return $content_array;
	}	
	
	function get_content($oauth_access_token,$oauth_access_token_secret) {
		
			$to = new TwitterOAuth($this->consumer_key, $this->consumer_secret, $oauth_access_token,$oauth_access_token_secret);
			$content = $to->OAuthRequest('https://twitter.com/account/verify_credentials.xml', array(), 'GET');
		
			$content_array = array ('content'=>$content, 'oauth_access_token'=>$oauth_access_token , 'oauth_access_token_secret'=>$oauth_access_token_secret);
			
			return $content_array;
}	


}

?>