<?php
class Config_model extends Model
{
  
  var $db;
  
  function Config_model()
  {
    parent::Model();
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