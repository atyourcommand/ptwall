<?php	
	require_once('facebook.php');
	
	function _fb_login() 
	
	{
		
			// facebook integration
			$facebook = new Facebook(array(
			  'appId'  => '130355453666011',
			  'secret' => '1a902b7a8f7fbd067cc5a63d70489a53',
			  'cookie' => true,
			  
			));
			
		// We may or may not have this data based on a $_GET or $_COOKIE based session.
		//
		// If we get a session here, it means we found a correctly signed session using
		// the Application Secret only Facebook and the Application know. We dont know
		// if it is still valid until we make an API call using the session. A session
		// can become invalid if it has already expired (should not be getting the
		// session back in this case) or if the user logged out of Facebook.
		$session = $facebook->getSession();

		$me = null;
		// Session based API call.
		if ($session) {
		  try {
			$uid = $facebook->getUser();
			$me = $facebook->api('/me');
		  } catch (FacebookApiException $e) {
			error_log($e);
		  }
		}

		// login or logout url will be needed depending on current user state.
		if ($me) {
		  $logoutUrl = $facebook->getLogoutUrl();
		} else {
		  $loginUrl = $facebook->getLoginUrl(array('req_perms' => 'publish_stream'));
		}
	
		$data['session'] = $session;
		$data['logoutUrl'] = $logoutUrl;
		$data['loginUrl'] = $loginUrl;
		$data['me'] = $me;

		
	
		
		return $data;
	}
	/*
	function _fb_post($msg) {
	
		$facebook = new Facebook(array(
		  'appId'  => '130355453666011',
		  'secret' => '1a902b7a8f7fbd067cc5a63d70489a53',
		  'cookie' => true,
		));
			
		$attachment =  array(
				'message' => "Hello, here is a post",
				'name' => "",
				'link' => "http://personaltrainerwall.com",
				'description' => "Write here your description",
				);
		$session = $facebook->getSession();
		print_r($session);
		if ($session) {
		  try {
			$facebook->api('/me/feed', 'POST', $attachment);	
		  } catch (FacebookApiException $e) {
			error_log($e);
		  }
		}

	
	}*/
	

	function _fb_post() 
	
	{
		
			// facebook integration
			$facebook = new Facebook(array(
			  'appId'  => '130355453666011',
			  'secret' => '1a902b7a8f7fbd067cc5a63d70489a53',
			  'cookie' => true,
			));
			
		// We may or may not have this data based on a $_GET or $_COOKIE based session.
		//
		// If we get a session here, it means we found a correctly signed session using
		// the Application Secret only Facebook and the Application know. We dont know
		// if it is still valid until we make an API call using the session. A session
		// can become invalid if it has already expired (should not be getting the
		// session back in this case) or if the user logged out of Facebook.
		$session = $facebook->getSession();

		$me = null;
		// Session based API call.
		if ($session) {
		  try {
			$uid = $facebook->getUser();
			$me = $facebook->api('/me');
		  } catch (FacebookApiException $e) {
			error_log($e);
		  }
		}
		try {
		$result = $facebook->api(
			'/me/feed/',
			'post',
			array('access_token' => $session['access_token'], 'message' => 'Playing around with FB Graph..')
		);	
				  } catch (FacebookApiException $e) {
					error_log($e);
					print_r($e);
				  }
	
		print_r($result);
		print_r($session);
		//$data['session'] = $session;
		
		return $data;
	}

	?>