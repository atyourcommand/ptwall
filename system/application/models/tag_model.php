<?php
class Tag_model extends CI_Model
{
  
  var $db;
  
  function Tag_model()
  {
    parent::__construct();
  }

  function get($group_id)
  {
	 $query = $query = $this->db->get_where('tags', array('tag_group_id'=>$group_id));  
    return $query->result();
  }

  function get_tag_by_id($tag_id)
  {
	 $query = $query = $this->db->get_where('tags', array('tag_id'=>$tag_id));  
    return $query->result();
  }
}
?>