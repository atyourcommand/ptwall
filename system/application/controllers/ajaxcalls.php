<?php

class AjaxCalls extends Controller {

	function __construct()
	 {
			parent::Controller();
			$this->load->model('Tag_model');
			$this->load->model('Tag_Group_model');
			$this->load->model('County_model');
			$this->load->model('City_model');
			$this->load->model('State_model');
			$this->load->model('Country_model');			
			$this->load->model('User_model');
			$this->load->model('Config_model');			
	 }


	function index()
	{		

	}
	
	function get_tags()
	{	
  		$group_id = $this->input->get('group_id');
  		$tag1 = $this->input->get('tag1');
		$res=$this->Tag_model->get($group_id);		
		foreach ($res as $tablerow) {
  			$result = get_object_vars($tablerow);
   			echo $tablerow->tag_id.'-'.$tablerow->tag.";";
			
		}	
	}	
	
	function get_counties()
	{	
  		$country_id = $this->input->get('country_id');
		$state_id = $this->input->get('state_id');
		$res=$this->County_model->get($country_id, $state_id);
		echo 'Select a County'.'-';		
		foreach ($res as $tablerow) {
  			$result = get_object_vars($tablerow);
   			echo ";".$tablerow->name.'-'.$tablerow->county_id;
			
		}	
	}	
	
	function get_states()
	{	
  		$country_id = $this->input->get('country_id');

		$res=$this->State_model->get($country_id);
		echo 'Select a State'.'-';		
		foreach ($res as $tablerow) {
  			$result = get_object_vars($tablerow);
   			echo ";".$tablerow->name.'-'.$tablerow->id;
			
		}	
	}
	
	function get_cities()
	{	
  		$country_id = $this->input->get('country_id');
		$state_id = $this->input->get('state_id');
		$county_id = $this->input->get('county_id');		
		$res=$this->City_model->get($country_id, $state_id, $county_id);
		echo 'Select a City'.'-';		
		foreach ($res as $tablerow) {
  			$result = get_object_vars($tablerow);
   			echo ";".$tablerow->name.'-'.$tablerow->id;
			
		}	
	}	
	
	function get_users_per_county() {
	
  	    $state_id = $this->input->get('state_id');
		$res=$this->County_model->get(233,$state_id);		
		$county_menu = array();
				
		$res_count=$this->User_model->get_users_per_state($state_id);		
		echo 'All Counties('.$res_count.')';	
		foreach ($res as $tablerow) {
  			$result = get_object_vars($tablerow);
			$res_count=$this->User_model->get_users_per_county($result['county_id']);
			if ($res_count>0)					
   				echo ";".$result['name'].'('.$res_count.")"."-".$result['county_id'];
		}		
	}
	
function get_search_by_location() 
{
				
		$input = strtolower( $_GET['input'] );
		$len = strlen($input);
	
		$aResults = array();
		
		if ($len)
		{
			// cities
			$query = $this->db->query("select id, name,state_id, county_id, country_id from city where name like '$input%'");
			$i=0;
			
			foreach ($query->result() as $row)
			{
				$info = $this->County_model->get_name_by_id($row->county_id).",".$this->State_model->get_name_by_id($row->state_id).",".$this->Country_model->get_name_by_id($row->country_id);
				$id = $row->id.",".$row->county_id.",".$row->state_id.",".$row->country_id;
				$count_query = $this->db->query("select count(1) c from users where city_id = $row->id and county_id = $row->county_id and state_id = $row->state_id and country_id =$row->country_id and approved=1");
				$count_row = $count_query->row();
				$name = $row->name;
			    $info = $info."(".$count_row->c.")";	
				if ($count_row->c > 0) {
				$aResults[] = array( "id"=>$id ,"value"=>htmlspecialchars($name),"info"=>htmlspecialchars($info));
				$i++;
				}
			}			
			
			// counties
			$query = $this->db->query("select county_id, name,state_id, country_id from county where name like '$input%'");
			
			foreach ($query->result() as $row)
			{
				$info = $this->State_model->get_name_by_id($row->state_id).",".$this->Country_model->get_name_by_id($row->country_id);
				$id = "0".",".$row->county_id.",".$row->state_id.",".$row->country_id;
			    $count_query = $this->db->query("select count(1) c from users where county_id = $row->county_id and state_id = $row->state_id and country_id =$row->country_id and approved=1");
				$count_row = $count_query->row();

	
					$name = $row->name;	
					
				$info = $info."(".$count_row->c.")";	
				if ($count_row->c > 0) {				
				$aResults[] = array( "id"=>$id ,"value"=>htmlspecialchars($name),"info"=>htmlspecialchars($info));
				$i++; }
			}	

			// states
			$query = $this->db->query("select id, name, country_id from states where name like '$input%'");
			
			foreach ($query->result() as $row)
			{
				$info = $this->Country_model->get_name_by_id($row->country_id);
				$id = "0".","."0".",".$row->id.",".$row->country_id;
			    $count_query = $this->db->query("select count(1) c from users where  state_id = $row->id and country_id =$row->country_id and approved=1");
				$count_row = $count_query->row();				
		
					$name = $row->name;		
				if ($count_row->c > 0) {
				$info = $info."(".$count_row->c.")";	
				$aResults[] = array( "id"=>$id ,"value"=>htmlspecialchars($name),"info"=>htmlspecialchars($info));
				$i++;}
			}	

			// countries
			
			$query = $this->db->query("select  name, country_id from country where name like '$input%'");
			
			foreach ($query->result() as $row)
			{
				$info = "";//$this->Country_model->get_name_by_id($row->country_id);
				$id = "0".","."0".","."0".",".$row->country_id;
			    $count_query = $this->db->query("select count(1) c from users where country_id =$row->country_id and approved=1");
				$count_row = $count_query->row();						
			    $name = $row->name;		
				if ($count_row->c > 0) {
				$info = $info."(".$count_row->c.")";	
				$aResults[] = array( "id"=>$id ,"value"=>htmlspecialchars($name),"info"=>htmlspecialchars($info));
				$i++;}
			}			
			
		}
		
		
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
		header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
		header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
		header ("Pragma: no-cache"); // HTTP/1.0
		
		
		
		if (isset($_REQUEST['json']))
		{
			header("Content-Type: application/json");
		
			echo "{\"results\": [";
			$arr = array();
			for ($i=0;$i<count($aResults);$i++)
			{
				$arr[] = "{\"id\": \"".$aResults[$i]['id']."\", \"value\": \"".$aResults[$i]['value']."\", \"info\": \"\"}";
			}
			echo implode(", ", $arr);
			echo "]}";
		}
		else
		{
			header("Content-Type: text/xml");

			echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?><results>";
			for ($i=0;$i<count($aResults);$i++)
			{
				echo "<rs id=\"".$aResults[$i]['id']."\" info=\"".$aResults[$i]['info']."\" pic=\"".$aResults[$i]['pic']."\">".$aResults[$i]['value']."</rs>";
			}
			echo "</results>";
		}	
	
}

function get_search_by_city() 
{
				
		$input = strtolower( $_GET['input'] );
		$len = strlen($input);
	
		$aResults = array();
		
		if ($len)
		{

			
			$query = $this->db->query("select id, name,state_id, county_id from city where name like '$input%'");
			$i=0;
			foreach ($query->result() as $row)
			{
				$info = $this->County_model->get_name_by_id($row->county_id).",".$this->State_model->get_name_by_id($row->state_id);
				
				//$profile_image = $profile_image_path.md5($row->profile_image_url).".".substr(strrchr($row->profile_image_url, '.'), 1);
				$aResults[] = array( "id"=>$row->id ,"value"=>htmlspecialchars($row->name),"info"=>htmlspecialchars($info), "pic"=>htmlspecialchars($profile_image));
				$i++;
			}

			
			
		}
		
		
		
		
		
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
		header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
		header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
		header ("Pragma: no-cache"); // HTTP/1.0
		
		
		
		if (isset($_REQUEST['json']))
		{
			header("Content-Type: application/json");
		
			echo "{\"results\": [";
			$arr = array();
			for ($i=0;$i<count($aResults);$i++)
			{
				$arr[] = "{\"id\": \"".$aResults[$i]['id']."\", \"value\": \"".$aResults[$i]['value']."\", \"info\": \"\"}";
			}
			echo implode(", ", $arr);
			echo "]}";
		}
		else
		{
			header("Content-Type: text/xml");

			echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?><results>";
			for ($i=0;$i<count($aResults);$i++)
			{
				echo "<rs id=\"".$aResults[$i]['id']."\" info=\"".$aResults[$i]['info']."\" pic=\"".$aResults[$i]['pic']."\">".$aResults[$i]['value']."</rs>";
			}
			echo "</results>";
		}	
	
}
	
	
function get_search_by_name() {
		
		
		
		$input = strtolower( $_GET['input'] );
		$len = strlen($input);
		$profile_image_path = $this->Config_model->get_value('CACHED_PROFILE_IMAGES')->value;
	
		$aResults = array();
		
		if ($len)
		{
			/*for ($i=0;$i<count($aUsers);$i++)
			{
				// had to use utf_decode, here
				// not necessary if the results are coming from mysql
				//
				if (strtolower(substr(utf8_decode($aUsers[$i]),0,$len)) == $input)
					$aResults[] = array( "id"=>($i+1) ,"value"=>htmlspecialchars($aUsers[$i]), "info"=>htmlspecialchars($aInfo[$i]) );
				
				//if (stripos(utf8_decode($aUsers[$i]), $input) !== false)
				//	$aResults[] = array( "id"=>($i+1) ,"value"=>htmlspecialchars($aUsers[$i]), "info"=>htmlspecialchars($aInfo[$i]) );
			}*/
			
			$query = $this->db->query("select user_id, first_name, last_name, profile_image_url, state_id, county_id from users where last_name like '$input%'");
			$i=0;
			foreach ($query->result() as $row)
			{
				$info = $this->County_model->get_name_by_id($row->county_id).",".$this->State_model->get_name_by_id($row->state_id);
				
				$profile_image = $profile_image_path.md5($row->profile_image_url).".".substr(strrchr($row->profile_image_url, '.'), 1);
				$aResults[] = array( "id"=>$row->user_id ,"value"=>htmlspecialchars($row->first_name.",".$row->last_name), "info"=>htmlspecialchars($info), "pic"=>htmlspecialchars($profile_image));
				$i++;
			}

			
			
		}
		
		
		
		
		
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
		header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
		header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
		header ("Pragma: no-cache"); // HTTP/1.0
		
		
		
		if (isset($_REQUEST['json']))
		{
			header("Content-Type: application/json");
		
			echo "{\"results\": [";
			$arr = array();
			for ($i=0;$i<count($aResults);$i++)
			{
				$arr[] = "{\"id\": \"".$aResults[$i]['id']."\", \"value\": \"".$aResults[$i]['value']."\", \"info\": \"\"}";
			}
			echo implode(", ", $arr);
			echo "]}";
		}
		else
		{
			header("Content-Type: text/xml");

			echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?><results>";
			for ($i=0;$i<count($aResults);$i++)
			{
				echo "<rs id=\"".$aResults[$i]['id']."\" info=\"".$aResults[$i]['info']."\" pic=\"".$aResults[$i]['pic']."\">".$aResults[$i]['value']."</rs>";
			}
			echo "</results>";
		}	
	
	}


	
function get_search_by_tag() 
{
				
		$input = strtolower( $_GET['input'] );
		$len = strlen($input);
	
		$aResults = array();
		
		if ($len)
		{

			
			$query = $this->db->query("select tag_id, tag, tag_group_id from tags where tag like '$input%'");
			$i=0;
			foreach ($query->result() as $row)
			{
				$info = $this->Tag_Group_model->get_name_by_id($row->tag_group_id);
				
				//$profile_image = $profile_image_path.md5($row->profile_image_url).".".substr(strrchr($row->profile_image_url, '.'), 1);
				$aResults[] = array( "id"=>$row->tag_id ,"value"=>htmlspecialchars($row->tag),"info"=>htmlspecialchars($info));
				$i++;
			}

			
			
		}
		
		
		
		
		
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
		header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
		header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
		header ("Pragma: no-cache"); // HTTP/1.0
		
		
		
		if (isset($_REQUEST['json']))
		{
			header("Content-Type: application/json");
		
			echo "{\"results\": [";
			$arr = array();
			for ($i=0;$i<count($aResults);$i++)
			{
				$arr[] = "{\"id\": \"".$aResults[$i]['id']."\", \"value\": \"".$aResults[$i]['value']."\", \"info\": \"\"}";
			}
			echo implode(", ", $arr);
			echo "]}";
		}
		else
		{
			header("Content-Type: text/xml");

			echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?><results>";
			for ($i=0;$i<count($aResults);$i++)
			{
				echo "<rs id=\"".$aResults[$i]['id']."\" info=\"".$aResults[$i]['info']."\" pic=\"".$aResults[$i]['pic']."\">".$aResults[$i]['value']."</rs>";
			}
			echo "</results>";
		}	
	
}	
		
		
}


?>