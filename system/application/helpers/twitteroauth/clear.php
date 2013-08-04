<?php 
	require_once('ptAuth.php');
	
	$a = new PtAuth();
	$a->clear_session();
	//echo $a->get_url();
	//echo $a->get_auth_content();
	print_r($_SESSION);
?>