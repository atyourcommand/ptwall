<?php
class State_model extends CI_Model
{
  
  var $db;
  
  function State_model()
  {
    parent::__construct();
  }

  function get($country_id)
  {
	$this->db->where("enabled","1");
	$this->db->where("country_id",$country_id);
	$this->db->order_by("name", "asc"); 
    $query = $query = $this->db->get('states');
    return $query->result();
  }
  
  function get_name_by_id($id)
  {
	//$this->db->where(" enabled","1");
    $query = $query = $this->db->get_where('states', array('id'=>$id));
	return $query->row()->name;
  }  

  
  function get_id_by_name($country_id, $name)
  {
	$query = $this->db->query("SELECT id FROM states where country_id = $country_id and name='".$name."'");
	$row = $query->row();	
	return $row->id;
  }    
}
?>