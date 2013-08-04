<?php 
	require_once('ptAuth.php');
	
	$a = new PtAuth();	
	echo $a->get_url();
	//echo $a->get_auth_content();
	print_r($_SESSION);
?>