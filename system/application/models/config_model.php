<?php
class Config_model extends CI_Model
{
  
  var $db;
	  
  function __construct() {
        parent::__construct();
		$this->load->database();
    }

  function get($id)
  {
	$this->db->where("id",$id);
    $query = $query = $this->db->get('config');
    return $query->result();
  }
  
  function get_value($id)
  {

	$query = $this->db->get_where('config', array('id'=>$id));
	return $query->row(); 

  }  
}
?>