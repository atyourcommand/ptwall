<?php
class User_Picture_model extends Model
{
  
  var $db;
  
  function User_Picture_model()
  {
    parent::Model();
  }

  function get($user_id)
  {
  	$query = $query = $this->db->get_where('user_picture', array('user_id'=>$user_id));  
    return $query->result();
  }
  
  function get_default($user_id)
  {
  	$query = $query = $this->db->get_where('user_picture', array('user_id'=>$user_id, "default_image"=>1));  
    return $query->result();
  }
  
   function get_by_id($id)
  {
  	$query = $query = $this->db->get_where('user_picture', array('id'=>$id));  
    return $query->result();
  }
  
  function add($user_id, $filename, $thumbnail)
  {
	$array = array('user_id' => $user_id, 
				   'filename' => $filename,					
				   'thumbnail' => $thumbnail
				   );

	$this->db->set($array);
	$this->db->insert('user_picture');
  }  
  
  function reset_default ($user_id) {  	
	$this->db->query("update user_picture set default_image = 0 where user_id = '$user_id'");
  }
  
  function set_default ($id) {  	
	$this->db->query("update user_picture set default_image = 1 where id = '$id'");
  }  

  function delete ($id) {  	
	$this->db->query("delete from user_picture where id = '$id'");
  }  
}
?>