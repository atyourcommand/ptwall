<?php

class Appmain extends Controller {

	function Appmain()
	{
		parent::Controller();
	}

	function index()
	{
		$this->load->view('site/main');
	}
}
?>
