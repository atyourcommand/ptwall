<?php
class County_model extends Model
{
  
  var $db;
  
  function County_model()
  {
    parent::Model();
  }

  function get($country_id, $state_id)
  {
		$this->db->cache_on();
		$this->db->where("country_id",$country_id);
		$this->db->where("state_id",$state_id);
    $query = $query = $this->db->get('county');
    return $query->result();
  }
  
  function get_name_by_id( $county_id)
  {
		$this->db->cache_on();
		$this->db->where("county_id",$county_id);	
    $query = $query = $this->db->get('county');
		return $query->row()->name;
  }  

}
?>