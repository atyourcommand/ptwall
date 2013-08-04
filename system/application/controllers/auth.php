<?php
  //error_reporting(E_ALL);
	//ini_set('display_errors', '1');
class Auth extends Controller {
		
	
		 function __construct()
		 {
			parent::Controller();
		 }
		     
		function index()
		{
			
			
		}
		
	function fb_login() 
	{
	   require_once APPPATH .'libraries/facebook/facebook.php';
			// facebook integration
			$facebook = new Facebook(array(
			  'appId'  => '130355453666011',
			  'secret' => '1a902b7a8f7fbd067cc5a63d70489a53',
			  'state' => true
			));
			$me = null;
			$logoutUrl= null;
			$loginUrl = null;
			$user_id = $facebook->getUser();
			if($user_id == 0 || $user_id == '')
			{
				//$params = array('scope' => 'manage_pages','redirect_uri' => $this->config->item('canvas_url'));
				$loginUrl = $facebook->getLoginUrl();
				echo '<script type="text/javascript">top.location.href = "'.$loginUrl.'"</script>';
				exit();
			}else
			{
				 try{
				  $me = $facebook->api('/'.$user_id.'');
					$accessToken = $facebook->getAccessToken();
					//print_r($userRecord);
				}catch(Exception $ex){}
			}
			$data['me'] = $me;
		// We may or may not have this data based on a $_GET or $_COOKIE based session.
		//
		// If we get a session here, it means we found a correctly signed session using
		// the Application Secret only Facebook and the Application know. We dont know
		// if it is still valid until we make an API call using the session. A session
		// can become invalid if it has already expired (should not be getting the
		// session back in this case) or if the user logged out of Facebook.
		/*$session = $facebook->getSession();


		$me = null;
		// Session based API call.
		if ($session) {
		  try {
			$uid = $facebook->getUser();
			$me = $facebook->api('/me');
		  } catch (FacebookApiException $e) {
			error_log($e);
		
		  }
		}*/
	
		// login or logout url will be needed depending on current user state.
		if ($me) {
		  $logoutUrl = $facebook->getLogoutUrl();
		} else {
		  $loginUrl = $facebook->getLoginUrl();
		}
		
		$session = array();
		$session['uid'] = $user_id;
		$data['session'] = $session;
		$data['session'] = $session;
		$data['logoutUrl'] = $logoutUrl;
		$data['loginUrl'] = $loginUrl;
		$data['me'] = $me;
		if ($me)
			redirect("index.php?c=add&m=profile", 'location', 301);
		else
			redirect($loginUrl, 'location', 301);
		//
		
		//return $data;
	}
		

}
?>