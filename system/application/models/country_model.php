<?php
class Country_model extends Model
{
  
  var $db;
  
  function Country_model()
  {
    parent::Model();
  }

  function get()
  {
	//$this->db->where(" enabled","1");
    $query = $query = $this->db->get_where('country', array('enabled'=>"1"));
    return $query->result();
  }

  function get_name_by_id($id)
  {
	//$this->db->where(" enabled","1");
    $query = $query = $this->db->get_where('country', array('country_id'=>$id));
	return $query->row()->name;
  }
  
  
  function get_id_by_name($name)
  {
	$query = $this->db->query("SELECT country_id FROM country where name='".$name."'");
	$row = $query->row();	
	return $row->country_id;	
  }
  
  
}
?>