<?php

class Test extends Controller {

	function __construct()
	 {
			parent::Controller();	
	 }

	function index()
	{
            $this->load->view('header');
			echo "Hello World";
            $this->load->library('log');
            $this->log->ptwall_log("Testing");
            echo "xxxxx".$_SERVER['REMOTE_ADDR'];
	}
	

/*
	function index()
	{		
		$this->load->library('xmlrpc');
		$this->xmlrpc->server('http://admin:admin@ptwall.com/amember/xmlrpc/', 80);
		$this->xmlrpc->method('query');
		$member_id =  $this->input->get('member_id');
		$request = array("update members set email_verified=1 where login='$member_id'");

		$this->xmlrpc->request($request);
	
		if ( ! $this->xmlrpc->send_request())
		{
	
			echo $this->xmlrpc->display_error();
		} else {
			print_r($this->xmlrpc->display_response());
		}
	}
	
	function index()
	{		
		$this->load->library('xmlrpc');
		$this->xmlrpc->server('http://admin:admin@ptwall.com/amember/xmlrpc/', 80);
		$this->xmlrpc->method('add_ptwall_user');
		
			$rec['login'] = "test011";
			$rec['pass'] = "123";
			$rec['name_l'] = "upake";
			$rec['name_f'] = "de silva";
			$rec['email'] = "upake.de.silva@gmail.com";
			
			$v = serialize($rec);
			$x = unserialize($v);		
			$request[] = $v;
			print_r($v);
		$this->xmlrpc->request($request);
	
		if ( ! $this->xmlrpc->send_request())
		{
	
			echo $this->xmlrpc->display_error();
		} else {
			print_r($this->xmlrpc->display_response());
		}
	}*/
}


?>