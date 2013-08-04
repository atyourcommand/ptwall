<?php
class Tag_Group_model extends Model
{
  
  var $db;
  
  function Tag_Group_model()
  {
    parent::Model();
  }

  function get_name_by_id($tag_group_id)
  {
	$this->db->where("tag_group_id",$tag_group_id);	
    $query = $query = $this->db->get('tag_group');
	return $query->row()->name;
  }  

}
?>