<?php 
require_once(APPPATH."/helpers/facebook/facebook_auth.php");
//require_once APPPATH .'libraries/facebook/facebook.php';
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('amember_approved'))
{
    function amember_approved($user_id)
    {	  
		$member_id = amember_get_member_id($user_id);
		if ($member_id) {
		  $ci=& get_instance();
		  $ci->load->database(); 
		  $product_approved = $ci->Config_model->get_value('AMEMBER_APPROVED_PRODUCT')->value;		
		  $result = _xmlrpc_query_row("select * from payments where member_id = '$member_id' and product_id='$product_approved'"); 
		  if ($result)
			return true;
		  else
			return false;
		  print_r($result);
		}
    }   
}

if ( ! function_exists('amember_email_verified'))
{
    function amember_email_verified($user_id)
    {	  
	 $result = _xmlrpc_query_row("select email_verified from members where login='$user_id'"); 
	 if ($result)
		if ($result[0]==1)
			return true;
		else
			return false;
	 else
		return false;
    }   
}

if ( ! function_exists('amember_get_member_id'))
{
    function amember_get_member_id($user_id)
    {	  
	 $result = _xmlrpc_query_row("select member_id from members where login='$user_id'"); 
	 if ($result)
		return $result[0];
	 else
		return false;
    }   
}


if ( ! function_exists('is_user_sponsor'))
{
    function is_user_sponsor($user_id)
    {	
		$member_id = amember_get_member_id($user_id);
		$ci=& get_instance();
		$products = $ci->Config_model->get_value('SPONSOR_PRODUCTS')->value;
		$result = _xmlrpc_query_row("select 1 from payments where member_id = '$member_id' and expire_date>=CURDATE() and product_id in ($products)"); 
		 if ($result[0]==1)
			return true;
		 else
			return false;
    }   
}

if ( ! function_exists('amember_remove_profile'))
{
    function amember_remove_profile($user_id)
    {	
		$ci=& get_instance();
		$ci->load->database();

		$ci->load->library('xmlrpc');	

		$ci->xmlrpc->server(_get_xmlrpc_url(), 80);
		$ci->xmlrpc->method('delete_user');
		$request[0] = $user_id;
		
		$ci->xmlrpc->request($request);
			
			if ( ! $ci->xmlrpc->send_request())
			{
				echo $ci->xmlrpc->display_error();
				return false;
			} else {
				print_r($ci->xmlrpc->display_response());
				return $ci->xmlrpc->display_response();
			}

    }   
}


// get users whos subscriptions have expired
if ( ! function_exists('get_expired_users'))
{
    function get_expired_users($products)
    {	
		echo $products;
		//$result = _xmlrpc_query("SELECT max(expire_date) a, m.login  FROM payments p, members m where product_id in ($products) and m.member_id = p.member_id group by m.login having a<curdate()"); 
		$result = _xmlrpc_query("SELECT expire_date  FROM payments p"); 
		//$result = _xmlrpc_query_row("select 1 from payments"); 
		
		return $result;
    }   
}



function _xmlrpc_query_row ($query) {

		$ci=& get_instance();
		$ci->load->database();

		$ci->load->library('xmlrpc');	

		$ci->xmlrpc->server(_get_xmlrpc_url(), 80);
		$ci->xmlrpc->method('query_row');
		$request[0] = $query;
		$ci->xmlrpc->request($request);
			
			if ( ! $ci->xmlrpc->send_request())
			{
		
				echo $ci->xmlrpc->display_error();
				return false;
			} else {
				//print_r($ci->xmlrpc->display_response());
				return $ci->xmlrpc->display_response();
			}

}

function _xmlrpc_query ($query) {

		$ci=& get_instance();
		$ci->load->database();

		$ci->load->library('xmlrpc');	

		$ci->xmlrpc->server(_get_xmlrpc_url(), 80);
		$ci->xmlrpc->method('query');
		$request[0] = $query;
		$ci->xmlrpc->request($request);
			
			if ( ! $ci->xmlrpc->send_request())
			{
		
				echo $ci->xmlrpc->display_error();
				return false;
			} else {
				//print_r($ci->xmlrpc->display_response());
				return $ci->xmlrpc->display_response();
			}

}

    function _get_xmlrpc_url()
    { 
	  $ci=& get_instance();
      $ci->load->database(); 
	  return  $ci->Config_model->get_value('AMEMBER_XML_RPC_URL')->value;
    } 

?>