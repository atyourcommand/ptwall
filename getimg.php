<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

//checks if an email address is present on the query string<strong></strong>
if (isset($_GET['email'])) {
  $eid    = $_GET['eid'];
  $email    = $_GET['email'];
  $ip     = $_SERVER['REMOTE_ADDR'];
  
//open mysql connection//
  $dbhost = 'mysql50-29.wc1';
  $dbuser = '424389_ptwall3';
  $dbpass = 'Samsung123$%^';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

  $dbname = '424389_ptwall_2';
  mysql_select_db($dbname);
  
  $query  = "INSERT INTO `email_opens` (`email_id`,`email`,`ip`,`date_opened`) VALUES ('" .  $eid . "','" . $email . "','" . $ip . "',now())";
  $result = mysql_query($query);
}

header("Location: http://personaltrainerwall.com/images/spacer.gif");
return;

?>