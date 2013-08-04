<?php
class Amember_model extends Model
{
  
  var $db;
  
  function Amember_model()
  {
    parent::Model();
	
  }

  function _amember_query($query) {
  
	$this->load->library('xmlrpc');
	$this->xmlrpc->server('http://admin:admin@personaltrainerwall.com/amember/xmlrpc/', 80);
	$this->xmlrpc->method('query_row');
		
		
	$request[] = $query;

		
	$this->xmlrpc->request($request);
	$this->xmlrpc->send_request();

	if ( ! $this->xmlrpc->send_request())
	{
		return -1;
	} else {

		return $this->xmlrpc->display_response();

	}
	  
  }
  
  function get_amember_id($id)
  {
	
	$query = "select member_id from members where login = '$id'";
	$response = $this->_amember_query($query);
	if ($response == -1) 
		return -1;
	else
		return $response[0];
	
  }  
  
  function get_login($id)
  {
	
	$query = "select login from members where member_id = '$id'";
	$response = $this->_amember_query($query);
	if ($response == -1) 
		return -1;
	else
		return $response[0];
	
  }    
  
  function get_payment_details($id)
  {
	
	$query = "select * from payments where member_id = '$id'";
	$response = $this->_amember_query($query);
	if ($response == -1) 
		return -1;
	else
		return $response;
	
  }   
  
  function has_subscribed($id)
  {
	
	$query = "select count(*) from payments where member_id = '$id'";
	$response = $this->_amember_query($query);
	if ($response == -1) 
		return 0;
	else
		return $response[0];
	
  }    
}
?>