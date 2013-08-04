<?php

require_once(APPPATH."/helpers/twitteroauth/ptAuth.php");

class Auth extends Controller {

	function Auth()
	{
		parent::Controller();	
	}
	
	function index()
	{		
		
		if (!get_cookie('ptwall_user')) {
			$a = new PtAuth();
			$a->init();
			$content = $a->get_auth_content();	
			$xmlobj = simplexml_load_string($content['content']);
			setcookie("ptwall_user", $xmlobj->id, time()+8640000);
			setcookie("oauth_access_token", $content['oauth_access_token'], time()+8640000);
			setcookie("oauth_access_token_secret", $content['oauth_access_token_secret'], time()+8640000);
		    //print_r($_SESSION);
		}
		header('Location: index.php?c=add&m=profile');
	}
	

			
}
