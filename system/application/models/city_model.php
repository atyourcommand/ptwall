<?php
class City_model extends Model
{
  
  var $db;
  
  function City_model()
  {
    parent::Model();
  }

  function get($country_id, $state_id, $county_id)
  {

	$this->db->where("country_id",$country_id);
	$this->db->where("state_id",$state_id);
	$this->db->where("county_id",$county_id);
    $query = $query = $this->db->get('city');
    return $query->result();
  }
  
  function get_name_by_id($id)
  {

    $query = $query = $this->db->get_where('city', array('id'=>$id));
	return $query->row()->name;

  }  

}
?>