<?php 
	require_once('__ptAuth.php');
	
		setcookie("oauth_access_token", "38627931-nYeKHM9qPYzhRsP38isTgzwNrjWNbjetV3zHp6nBn", time()+8640000);
			setcookie("oauth_access_token_secret", "2WMqIdYC0CYukHlDm7P4ajN67XGPD1mzf3lFD7INl0", time()+8640000);
	

	$a = new PtAuth();	
	//echo $a->get_url();
	//print_r($a->get_auth_content());
	print_r($a->get_content("38627931-nYeKHM9qPYzhRsP38isTgzwNrjWNbjetV3zHp6nBn","2WMqIdYC0CYukHlDm7P4ajN67XGPD1mzf3lFD7INl0"));
	
	

?>