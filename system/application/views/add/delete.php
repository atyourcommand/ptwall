<?php
require_once(APPPATH."/helpers/epitwitter/EpiCurl.php");	
require_once(APPPATH."/helpers/epitwitter/EpiOAuth.php");	
require_once(APPPATH."/helpers/epitwitter/EpiTwitter.php");
require_once(APPPATH."/helpers/facebook/facebook_auth.php");

class Delete extends Controller {
					
					//include'dbc.php'; // Nor required
					
					session_start();
					if(isset($_COOKIE['user_id']) || isset($_SESSION['user_id'])){
					user_delete();
					echo'<script language="javascript">alert("Error: Delete script was run")</script>';	header("Location: index.php");
					}
					else{
					echo'<script language="javascript">alert("Error: You are not Logged in")</script>';	header("Location: index.php");
					}		 
	
}
?>