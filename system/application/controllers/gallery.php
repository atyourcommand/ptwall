<?php

class Gallery extends Controller {

	var $url;
	var $username;
	var $password;
	
	function __construct()
	 {
			parent::Controller();
			$this->load->model('Config_model');		
			$this->url = $this->Config_model->get_value('GALLERY_URL')->value;
			$this->username = $this->Config_model->get_value('GALLERY_USERNAME')->value;
			$this->password = $this->Config_model->get_value('GALLERY_PASSWORD')->value;
	 }

	
	function index()
	{		

		$this->_gallery_login() ;
	}

	function _gallery_login() {

		$data=	"g2_form[protocol_version]=2.0&g2_form[cmd]=login&g2_controller=remote:GalleryRemote&g2_form[uname]=$this->username&".
			"g2_form[password]=$this->password";
		$response = $this->_do_post_request($this->url,$data);	
		$obj = $this->_response_to_array($response);	
		
		return $obj;
	}
	
	function upload() {
		
		$this->load->view('gallery/upload',$data);
		
	
	}
	

	function _do_post_request($url, $data, $optional_headers = null)
	  {
		 $params = array('http' => array(
					  'method' => 'POST',
					  'content' => $data
				   ));
		 if ($optional_headers !== null) {
			$params['http']['header'] = $optional_headers;
		 }
		 $ctx = stream_context_create($params);
		 $fp = @fopen($url, 'rb', false, $ctx);
		 if (!$fp) {
			throw new Exception("Problem with $url, $php_errormsg");
		 }
		 $response = @stream_get_contents($fp);
		 if ($response === false) {
			throw new Exception("Problem reading data from $url, $php_errormsg");
		 }
		 return $response;
	  }
	  
	function _response_to_array($data) {
	
		$field_value = split("\n", $data);

		for ($i=0;$i<count($field_value);$i++) {
			if(strpos($field_value[$i], "=")) {
				$temp = split("=", $field_value [$i]);
				$a[$temp[0]] = $temp[1];
				}
		}
		
		return (object) $a;
		
	}

}


?>