<?php
	include "../../../config.inc.php";
	$this_config = $plugin_config['payment']['webaffair'];
	$vars = get_input_vars();
function get_dump($var){
//dump of array
    $s = "";
    foreach ((array)$var as $k=>$v)
        $s .= "$k => $v<br />\n";
    return $s;
}
function webaffair_error($msg){
    global $payment_id, $pnref, $db;
    global $vars;
    $db->log_error(sprintf('WEBAFFAIR ERROR: %s (Details: PNREF:%s, invoice:%d)%s', $msg, $pnref, $payment_id, '<br />')."\n".get_dump($vars));
    die($msg);
}
	
	$message="message=$vars[DATA]";
	$pathfile="pathfile=".$this_config["pathfile"];
	$path_bin = $this_config["response"];
	$result=exec("$path_bin $pathfile $message");
	$tableau = explode ("!", $result);
	
$db->log_error("WEBAFFAIR DEBUG: " . get_dump($tableau));

	$code = $tableau[1];
	$error = $tableau[2];
	$merchant_id = $tableau[3];
	$merchant_country = $tableau[4];
	$amount = $tableau[5];
	$transaction_id = $tableau[6];
	$payment_means = $tableau[7];
	$transmission_date= $tableau[8];
	$payment_time = $tableau[9];
	$payment_date = $tableau[10];
	$response_code = $tableau[11];
	$payment_certificate = $tableau[12];
	$authorisation_id = $tableau[13];
	$currency_code = $tableau[14];
	$card_number = $tableau[15];
	$cvv_flag = $tableau[16];
	$cvv_response_code = $tableau[17];
	$bank_response_code = $tableau[18];
	$complementary_code = $tableau[19];
	$complementary_info = $tableau[20];
	$return_context = $tableau[21];
	$caddie = $tableau[22];
	$receipt_complement = $tableau[23];
	$merchant_language = $tableau[24];
	$language = $tableau[25];
	$customer_id = $tableau[26];
	$order_id = $tableau[27];
	$customer_email = $tableau[28];
	$customer_ip_address = $tableau[29];
	$capture_day = $tableau[30];
	$capture_mode = $tableau[31];
	$data = $tableau[32];
	
	$payment_id=$transaction_id;
	$pnref=$authorisation_id;
	$amount=doubleval($amount/100);
	if ($code=="" && $error=="")
 	{
		webaffair_error("erreur appel response</CENTER><BR> executable response non trouve $this_config[path_bin]");
 	}
	elseif ( $code != 0 ){
		webaffair_error("Erreur appel API de paiement, message erreur : $error");
	}
	elseif($bank_response_code == "00") {
		$err = $db->finish_waiting_payment($transaction_id, 'webaffair',$pnref, $amount, $tableau);
		if($err)
			webaffair_error("finish_waiting_payment error: $err");
	}
	exit();		
?>