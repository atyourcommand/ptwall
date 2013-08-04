<?php
class User_Tag_model extends Model
{
  
  var $db;
  
  function User_Tag_model()
  {
    parent::Model();
  }
	
  function get($user_id) {  
  	$query = $this->db->get_where('user_tags', array('user_id'=>$user_id));	
	foreach ($query->result() as $row)
	{
    $tags[$row->id] = $row->tag_id;
	}
  	return $tags;
  }
  
  function get_by_group($user_id, $group_id) {  
  	$query = $this->db->get_where('user_tags', array('user_id'=>$user_id,'tag_group_id' =>$group_id));	
	foreach ($query->result() as $row)
	{
    $tags[$row->id] = $row->tag_id;
	}
  	return $tags;
  }  
	
  function tag_exist($user_id, $id) {
  	
	$query = $this->db->get_where('user_tags', array('user_id'=>$user_id, 'id'=>$id));
	if($query->num_rows()>0)
		return true;
	else
		return false;	
  }

  function update_tags($user_id,  $tags)
  {

  	$tag_group_id = array(1,1,1,2,2,2,3,3,3);
	for($i=0;$i<9;$i++) {
		$j = $i+1;
		$array = array('user_id' => $user_id, 'id' => $j, 'tag_group_id' => $tag_group_id[$i],'tag_id' =>$tags[$j]);	
		if ($this->tag_exist($user_id, $j)) {		
			$this->db->where('user_id', $user_id);
			$this->db->where('id', $j);		
			$this->db->update('user_tags', $array);        
		}
		else {
			$this->db->set($array);
			$this->db->insert('user_tags');		
		}
	}

  }

}
?>