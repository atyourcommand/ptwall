<?php
require_once(APPPATH."/helpers/epitwitter/EpiCurl.php");	
require_once(APPPATH."/helpers/epitwitter/EpiOAuth.php");	
require_once(APPPATH."/helpers/epitwitter/EpiTwitter.php");	
require_once(APPPATH."/helpers/facebook/facebook_auth.php");	

class Welcome extends Controller {
	
	var $session_id;
	var $ptAuth;
	//var $consumer_key = 'PWL8ezHZPbtED2rhpXPWQ'; /* Consumer key from twitter */
	//var $consumer_secret = 'DJrz72RUai9fo2ARYj1RLkxnZFv4bnbb7lRrrSB3Zzg'; /* Consumer Secret from twitter */
	// var $consumer_key = 'rNcmIthsaDLwZGCdMIalg'; /* Consumer key from twitter */
    // var $consumer_secret = '7C9cQRqQyg2tbliG2v3X0uvHatZgfSSUShJpmJPkA'; /* Consumer Secret */
	
	function __construct()
	{
		parent::Controller();
		//$this->output->enable_profiler(TRUE);
		$this->load->model('User_model');
		$this->load->model('State_model');
		$this->load->model('City_model');			
		$this->load->model('County_model');	
		$this->load->model('Country_model');	
		$this->load->model('Config_model');		
		$this->load->model('User_Tag_model');
		$this->load->model('Tag_model');
		$this->load->model('Amember_model');									
		$this->load->library('pagination');	
		$this->load->helper('html');			
		$this->consumer_key =  $this->Config_model->get_value('CONSUMER_KEY')->value;
		$this->consumer_secret =  $this->Config_model->get_value('CONSUMER_SECRET')->value;		

	}

	function index()
	{		
		//$time = microtime(true); // time in Microseconds

		//$show_search = $_REQUEST['show_search']; //DO NOT DO THIS
		$show_search = $this->input->post("show_search");
		//$show_guests = $_REQUEST['show_guests']; //DO NOT DO THIS
		$show_guests = $this->input->post("show_guests");
		//$show_sponsors = $_REQUEST['show_sponsors']; //DO NOT DO THIS
		$show_sponsors = $this->input->post("show_sponsors");
		//$show_twitter_data = $_REQUEST['show_twitter_data']; //DO NOT DO THIS
		$show_twitter_data = $this->input->post("show_twitter_data");
		
		
		if ($this->input->post('search_by_name_id')) {
			$user = $this->User_model->get_user($this->input->post('search_by_name_id'));
			$name_url = trim($user->first_name)."_".trim($user->last_name);
			$name_url = str_replace(" ","_",$name_url);
			redirect("/personal-trainer/".$name_url, 'location', 301);
			print_r($user);
		}
		
		$time = microtime(true); // time in Microseconds
		
		$data=$this->_get_form_data();
		
		//echo (microtime(true) - $time) . ' index function elapsed';
		$microtime = (microtime(true) - $time) . ' _get_form_data function elapsed';
		echo "<script language='javascript'>console.log('$microtime');</script>";	

		$user_logged_in = false;
		//echo $_COOKIE['user_id'];
		if (isset($_COOKIE['user_id'])) {
			$user_data = $this->User_model->get_user($_COOKIE['user_id']);	
			$user_logged_in = true;
			$image_path = $dir = $this->Config_model->get_value('UPLOAD_PHOTO_PATH')->value;	
			$data['email_verified'] = $user_data ->email_verified;
			$data['active'] = $user_data ->active;
			$data['email_verified_msg'] = $this->Config_model->get_value('EMAIL_NOT_VERIFIED_MSG')->value;
			$data['incomplete_profile_msg'] = $this->Config_model->get_value('INCOMPLETE_PROFILE_MSG')->value;
		}
		
		// todo - replace header
		$fb_data = _fb_login();
		$header_data['session'] = isset($fb_data['session'])?$fb_data['session']:'';
		$header_data['logoutUrl'] = isset($fb_data['logoutUrl'])?$fb_data['logoutUrl']:'';
		$header_data['loginUrl'] = isset($fb_data['loginUrl'])?$fb_data['loginUrl']:'';
		$header_data['me'] = isset($fb_data['me'])?$fb_data['me']:'';
		if(isset($header_data['me']['id'])){
			$user_data = $this->User_model->get_user($header_data['me']['id']);
		}
		
		$header_data['user_logged_in'] = $user_logged_in;
		$header_data['active'] =  $user_data ->active;
		$header_data['user'] =  $user_data;
		// todo - replace header
		
		// GET LOCATION META FOR TITLE .JB
		//$ip_data = $this->_locate_ip($_SERVER['REMOTE_ADDR']);
		//$meta_city_name = $ip_data['city'];
		//$meta_state_name = $ip_data['region_name'];
		//$meta_country_name = $ip_data['country_name'];
		
		//echo $meta_city_name;
		//echo $meta_state_name;
		//echo $meta_country_name;
		
		// GET *NEW METHOD * LOCATION META FOR TITLE .JB
		$ip = $_SERVER['REMOTE_ADDR'];
		$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
		//echo $details->city; // -> "Mountain View"
		$new_meta_city_name = $details->city;
		$new_meta_state_name = $details->region;
		
		
		$header_data['title'] = "Personal Trainer ".$new_meta_state_name." | Personal Trainer Directory | PT Wall";
		$header_data['description'] = "At PT Wall find a certified Personal Trainer in " .$new_meta_state_name. "  or in your city" ;
		// END GET LOCATION FOR TITLE 
		
		$res=$this->Country_model->get();			
		$country_menu = array();
		foreach ($res as $tablerow) {
			$result = get_object_vars($tablerow);
			$country_list[$result['country_id']] = $result['name'];
		}
		$header_data['country_list'] = $country_list;
		$header_data['country'] = $data['country'];
		
		if ($this->input->get('e')=='update')
			$header_data['show_update_modal'] = true;

		$this->load->view('header', $header_data);
		
		if ($show_search == 'true') {
			$this->load->view('index_search', $data);
		}
		
		elseif ($show_guests == 'true')  {
			$this->load->view('index_guests', $data);
			//print_r($data);
		}
		elseif ($show_sponsors == 'true')  {
			$this->load->view('index_sponsors', $data);
			//print_r($data);

		}	
		elseif ($show_twitter_data == 'true')  {
			$this->load->view('index_twitter', $data);
		}					
		else{
			//// condition for testing
			/*if($_COOKIE['user_id']=="1243412679" ){
				$this->load->view('index_dev', $data);
			}else{
				$this->load->view('index_ajax', $data);
			}*/
			$this->load->view('index_ajax', $data);
		}
		$this->load->view('footer');
		
	}

	function ajax_paging_record()
	{
		$data=$this->_get_form_ajax_data();
		$user_logged_in = false;
		if (isset($_COOKIE['user_id'])) {
			$user_data = $this->User_model->get_user($_COOKIE['user_id']);	
			$user_logged_in = true;
			$image_path = $dir = $this->Config_model->get_value('UPLOAD_PHOTO_PATH')->value;	
			$data['email_verified'] = $user_data ->email_verified;
			$data['active'] = $user_data ->active;
			$data['email_verified_msg'] = $this->Config_model->get_value('EMAIL_NOT_VERIFIED_MSG')->value;
			$data['incomplete_profile_msg'] = $this->Config_model->get_value('INCOMPLETE_PROFILE_MSG')->value;
			$data['user_logged_in'] = $user_logged_in;
			$data['is_ajax'] = $_REQUEST['is_ajax'];
		}
		//// condition for testing
		/*if($_COOKIE['user_id']=="1243412679" ){
			  echo $this->load->view('index_dev', $data,true);
		}else{
				echo $this->load->view('index_ajax', $data,true);
			}*/
			echo $this->load->view('index_ajax', $data,true);

			exit();
		}

		function _get_form_ajax_data() {

			$recs_per_page = 6;

		//$country = $_REQUEST['country']; //Do not do it this way 
		$country = $this->input->post("country");	
		//$state = $_REQUEST['state']; //Do not do it this way 
		$state = $this->input->post('state');	
		//$county = $_REQUEST['county']; //Do not do it this way 
		$county = $this->input->post('county');	
		//$sort_by = $_REQUEST['sort_menu'];//Do not do it this way 
		$sort_menu = $this->input->post('sort_menu');	 
		//$tag_id = $_REQUEST['sort_options']; //Do not do it this way 
		$sort_options = $this->input->post('sort_options');						
		//$search = $_REQUEST['search']; //Do not do it this way 
		$search = $this->input->post('search');	
		//$tag_list = $_REQUEST['tag_list']; //Do not do it this way 
		$tag_list = $this->input->post('tag_list');	
		//$error = $_REQUEST['error']; //Do not do it this way 
		$error = $this->input->post('error');	
		//$show_guests = $_REQUEST['show_guests']; //Do not do it this way 
		$show_guests = $this->input->post('show_guests');	
		
		if ($this->input->post('search_by_location_id')) {
			$loc_array = split(",", $this->input->post('search_by_location_id'), 4);
			if ($loc_array[0]!=0) $city = $loc_array[0];
			if ($loc_array[1]!=0) $county = $loc_array[1];
			if ($loc_array[2]!=0) $state = $loc_array[2];
			if ($loc_array[3]!=0) $country = $loc_array[3];
		}		

		if ($this->input->post('search_by_tag_id')) {
			$tag_id = $this->input->post('search_by_tag_id');
		}			
		
		$this->load->helper('form');
		$data = array('title' => 'My Title',
			'heading' => 'My Heading'
			);
		
		// form data

		// handle country radios 

		if (!$country)  {

			//$ip_data = $this->_locate_ip('67.195.111.158');
			$ip_data = $this->_locate_ip($_SERVER['REMOTE_ADDR']);
			//$ip_data = $this->_locate_ip('192.189.54.255');
			//$ip_data = $this->_locate_ip('85.234.144.145');
			$country_from_ip=$this->Country_model->get_id_by_name($ip_data['country_name']);
			$country_list = array(223,13,38,240,241,242,243);
			if (in_array($country_from_ip, $country_list )) {
				$country = $country_from_ip; // default united states :)
			$state_from_ip = $res=$this->State_model->get_id_by_name($country, $ip_data['region_name']);	
			$state = $state_from_ip;
			
			}	
			else
				$country = 223;
			
			}

		// end country radios

$res=$this->State_model->get($country);		
$state_ddmenu = array();
$state_ddmenu[0] = 'All States';		
foreach ($res as $tablerow) {
	$result = get_object_vars($tablerow);
	$res_count=$this->User_model->get_users_per_state($result['id']);
	if ($res_count>0)	
		$state_ddmenu[$result['id']] = $result['name'].'('.$res_count.")";
}	

$res=$this->County_model->get($country,$state);		

$county_menu = array();

$res_count=$this->User_model->get_users_per_state($state);		

$state_name = $this->State_model->get_name_by_id($state);

		//$county_menu[0] = "All $state_name Counties";	
$county_menu[0] = "All $state_name Regions";	
foreach ($res as $tablerow) {
	$result = get_object_vars($tablerow);
	$res_count=$this->User_model->get_users_per_county($result['county_id']);
	if ($res_count>0)					
		$county_menu[$result['county_id']] = $result['name'].'('.$res_count.")";
}	

$sort_menu['joined'] = 'Most Recent';
$sort_menu['statuses_count'] = 'Most Tweets';		
$sort_menu['followers_count'] = 'Most Followers';		
$sort_menu['friends_count'] = 'Most Following';		
$sort_menu['tags'] = 'Tags';				

$query = $this->db->query('SELECT t.tag_id,t.tag,tg.name FROM tags as t, tag_group as tg where t.tag_group_id = tg.tag_group_id order by tg.name asc');
$query2 = $this->db->query("SELECT tag_id, COUNT(tag_id) as tag_count FROM user_tags where user_id IN (select user_id from users where country_id='$country' and approved=1)  GROUP BY tag_id ");
$tag_count = array();

foreach ($query2->result() as $row)
{
	$tag_count[$row->tag_id] = $row->tag_count;
}	

$sort_options = array();
$sort_options[0] = "#All Tags";
foreach ($query->result() as $row)
{

	if (isset($tag_count[$row->tag_id]))
				//$sort_options[$row->tag_id] = $row->name.' - #'.$row->tag."(".$tag_count[$row->tag_id].")";
		$sort_options[$row->tag_id] = $row->name.' - #'.$row->tag;
}	

if ($state) 
	$show_all_results = false;
else
	$show_all_results = true;

		///$offset = $this->input->get('per_page');
$offset = $_REQUEST['per_page'];
$sort_by = 'tags';

if ($sort_by!='tags')

	if ($search && $search!="type anything ...") {
		list($first_name, $last_name) =  split(",", $search);
		$latest_users = $this->User_model->search_users($country,$first_name,$last_name,$show_all_results,$offset,$recs_per_page,$sort_by);
		$count_latest_users = $this->User_model->count_search_users($country,$first_name,$last_name,$show_all_results);
				//echo "here";
				//echo $this->db->last_query();
	}
	else
	{

		$latest_users = $this->User_model->get_latest_users($country,$state,$county,$show_all_results,$offset,$recs_per_page,$sort_by);
		$count_latest_users = $this->User_model->count_latest_users($country,$state,$county,$show_all_results);
				echo "here1";
				//echo $this->db->last_query();
	}
	else {
		if ($tag_id !=0) {
			$tag_list = $tag_list.$tag_id.",";
			$latest_users = $this->User_model->get_latest_users_by_tag($country,$state,$county,$show_all_results,$offset,$recs_per_page,$tag_id);
			$count_latest_users = $this->User_model->count_latest_users_by_tag($country,$state,$county,$show_all_results,$tag_id);
					//echo "here2";
					//echo $this->db->last_query();
		}
		else { 

			$latest_users = $this->User_model->get_latest_users($country,$state,$county,$show_all_results,$offset,$recs_per_page,'');
			$count_latest_users = $this->User_model->count_latest_users($country,$state,$county,$show_all_results);
				//echo "here3";
				//echo $this->db->last_query();

		}
	}

	if ($show_guests == 'true') {

		$guest_users = $this->User_model->get_latest_users($country,$state,$county,$show_all_results,$offset,$recs_per_page,'', true);
		$count_guest_users = $this->User_model->count_latest_users($country,$state,$county,$show_all_results, true);
	}

	$tag_list_temp = trim($tag_list,",");
	$tag_array = split(",", $tag_list_temp);
	for($i=0;$i<count($tag_array);$i++)
		$tag_array_name[] = $this->Tag_model->get_tag_by_id($tag_array[$i]);		
		//print_r($tag_array_name);


	if ($sort_by=='')
		$sort_by = 'tags';

	$upload_path = $this->Config_model->get_value('UPLOADED_PROFILE_IMAGES')->value;	

		//$user_tags = array();
	foreach ($latest_users as $user) {

		$query = $this->db->query('SELECT name FROM training_org where id='.$user->training_org_id);
		$row = $query->row();
		$user_training_org[$user->user_id] = $row->name;	

		$query = $this->db->query('SELECT name FROM certificate where certificate_id='.$user->certificate_id);
		$row = $query->row();
		$user_certificate[$user->user_id] = $row->name;			

		for($i=1;$i<=3;$i++) {
			$tag_result = $this->User_Tag_model->get_by_group($user->user_id,$i);
			foreach ($tag_result as $tag) {
				$user_tags[$user->user_id][$i][] = $this->Tag_model->get_tag_by_id($tag);

			}
		}

			// images



		foreach (glob($upload_path.$user->user_id."*.*") as $filename) {
			$user_image[$user->user_id]['exist'] = true;	
			$user_image[$user->user_id]['image_file']= $filename;			
		}	

	}

		// ALL USERS _ Get and limit records

	$most_followers_users = $this->User_model->get_latest_users_for_stats($country,0,0,true,0,18,"followers_count");
	$most_recent_users = $this->User_model->get_latest_users_for_stats($country,0,0,true,0,999999,null);
	$random_users = $this->User_model->get_latest_users_for_stats($country,0,0,true,0,999999,null);
	shuffle($random_users);
	$random_users = array_slice($random_users, 0, 100);

		// GUESTS - Show and limit records
	$all_guests = $this->User_model->get_latest_guests_for_stats($country,0,0,true,0,999999,null);
	$new_guests = $this->User_model->get_latest_guests_for_stats($country,0,0,true,0,18,null);


		// hidden data
	$hidden_data = array(
		'country'  => $country,
		'tag_list' => $tag_list
		); 

	/*********************************** Bread Crumb **********************************************/

	if ($country) {
		$breadcrumb[] = anchor('?c=welcome&m=index&country='.$country, $this->Country_model->get_name_by_id($country));
		if ($state) {
			$breadcrumb[] = anchor('?c=welcome&m=index&country='.$country."&state=".$state, $this->State_model->get_name_by_id($state));
			if ($county) {
				$breadcrumb[] = anchor('?c=welcome&m=index&country='.$country."&state=".$state."&county=".$county, $this->County_model->get_name_by_id($county));
				if ($city) {
					$breadcrumb[] = $this->City_model->get_name_by_id($city);
				}
			}
		}		
	}

		//$breadcrumb = array('red','blue','green','yellow');


	/***********************************  Pagination **********************************************/
		if (!$state) $state = $_REQUEST['state']; //$this->input->post('state');	
		$county = $_REQUEST['county']; //$this->input->post('county');	
		$sort_by = $_REQUEST['sort_menu']; //$this->input->post('sort_menu');	
		$tag_id = $_REQUEST['sort_options']; //$this->input->post('sort_options');	

		
		$total_pages = ceil($count_latest_users / $recs_per_page);
		$current_page = ceil($offset / $recs_per_page)+1;			
		$config['base_url'] = "index.php?c=welcome&country=$country&state=$state&sort_menu=$sort_by&sort_options=$tag_id";
		$config['total_rows'] = $count_latest_users;
		$config['per_page'] = $recs_per_page; 
		$config['page_query_string'] = TRUE;
		$config['cur_page'] = $offset;
		$config['prev_tag_open'] = '<span class="prev_link">';
		$config['prev_link'] = '&lt;';		
		$config['prev_tag_close'] = '</span>';	
		$config['next_tag_open'] = '<span class="next_link">';
		$config['next_link'] = '&gt;';		
		$config['next_tag_close'] = '</span>';	
		$config['first_link'] = '&laquo;';
		//$config['first_link'] = "<span class=\"prev_link\">previous</span>";
		$config['last_link'] = '&raquo;';
		//$config['last_link'] = "<span class=\"next_link\">next</span>";
		$config['cur_tag_open'] = "<span class=\"current\">";
		$config['cur_tag_close'] = '</span>';
		$config['num_links'] = $total_pages;
		$this->pagination->initialize($config); 		
		$pagination = $this->pagination->create_links();	
		$res=$this->Country_model->get();			
		$country_menu = array();
		foreach ($res as $tablerow) {
			$result = get_object_vars($tablerow);
			$country_list[$result['country_id']] = $result['name'];
		}
		/***********************************  Form Objects *******************************************/	
		$data['country_list'] = $country_list;
		$data['hidden_data'] = $hidden_data;	
		$data['state_list'] = $state_ddmenu;
		$data['country'] = $country;
		$data['county_list'] = $county_menu;
		$data['sort_menu'] = $sort_menu;	
		$data['sort_options'] = $sort_options;				
		$data['sort_options_selected'] = $tag_id;
		$data['sort_selected'] = $sort_by;					
		$data['state_selected'] = $state;				
		$data['county_selected'] = $county;			
		$data['latest_users'] = $latest_users;
		//$data['latest_guests'] = $latest_guests; //This is not defined or used I guess
		$data['most_followers_users'] = $most_followers_users;
		$data['most_recent_users'] = $most_recent_users;
		$data['random_users'] = $random_users;
		$data['new_guests'] = $new_guests;
		$data['all_guests'] = $all_guests;
		$data['pagination'] = $pagination;
		$data['total_pages'] = $total_pages;
		$data['current_page'] = $current_page;
		$data['user_tags'] = $user_tags;
		$data['user_training_org'] = $user_training_org;
		$data['user_certificate'] = $user_certificate;
		$data['profile_image_path'] = $dir = $this->Config_model->get_value('CACHED_PROFILE_IMAGES')->value;
		//$data['upload_image_path'] = $dir = $this->Config_model->get_value('UPLOAD_PHOTO_PATH')->value;	
		$data['user_image'] = $user_image;
		$data['breadcrumb'] = $breadcrumb;
		$data['error'] = $error;
		$data['search_by_location_id'] = $this->input->post('search_by_location_id');
		$data['search_by_tag_id'] = $this->input->post('search_by_tag_id');
		return $data;
		echo "<script language='javascript'>console.log('function _get_ajax_form_data');</script>";
	}

	function _get_form_data() {
		
		$recs_per_page = 6;

		//$country = $_REQUEST['country']; //Do not do it this way 
		$country = $this->input->post("country");	
		//$state = $_REQUEST['state']; //Do not do it this way 
		$state = $this->input->post('state');	
		//$county = $_REQUEST['county']; //Do not do it this way 
		$county = $this->input->post('county');	
		//$sort_by = $_REQUEST['sort_menu'];//Do not do it this way 
		$sort_menu = $this->input->post('sort_menu');	 
		//$tag_id = $_REQUEST['sort_options']; //Do not do it this way 
		$sort_options = $this->input->post('sort_options');						
		//$search = $_REQUEST['search']; //Do not do it this way 
		$search = $this->input->post('search');	
		//$tag_list = $_REQUEST['tag_list']; //Do not do it this way 
		$tag_list = $this->input->post('tag_list');	
		//$error = $_REQUEST['error']; //Do not do it this way 
		$error = $this->input->post('error');	
		//$show_guests = $_REQUEST['show_guests']; //Do not do it this way 
		$show_guests = $this->input->post('show_guests');
		
		$tag_id = $this->input->post('sort_options'); // **NEW TEST THIS created variable for php errors JB 		
		
		if ($this->input->post('search_by_location_id')) {
			$loc_array = split(",", $this->input->post('search_by_location_id'), 4);
			if ($loc_array[0]!=0) $city = $loc_array[0];
			if ($loc_array[1]!=0) $county = $loc_array[1];
			if ($loc_array[2]!=0) $state = $loc_array[2];
			if ($loc_array[3]!=0) $country = $loc_array[3];
		}		

		if ($this->input->post('search_by_tag_id')) {
			$tag_id = $this->input->post('search_by_tag_id');
		}			
		
		$this->load->helper('form');
		$data = array('title' => 'My Title',
			'heading' => 'My Heading'
			);
		
		// form data

		// handle country radios 

		if (!$country)  {

			//$ip_data = $this->_locate_ip('67.195.111.158');
			$ip_data = $this->_locate_ip($_SERVER['REMOTE_ADDR']);
			//$ip_data = $this->_locate_ip('192.189.54.255');
			//$ip_data = $this->_locate_ip('85.234.144.145');
			
			$country_from_ip=$this->Country_model->get_id_by_name($ip_data['country_name']);
			
			//$country_from_ip = 'rome';
			//echo "<p>$country_from_ip</p>";
			
			$country_list = array(223,13,38,240,241,242,243);
			if (in_array($country_from_ip, $country_list )) {
				$country = $country_from_ip; // default united states :)
				//echo 'found a country';				
				$state_from_ip = $res=$this->State_model->get_id_by_name($country, $ip_data['region_name']);	
				$state = $state_from_ip;
				//echo $country;					
			}	
			else {
				$country = 223;
							//echo $country;
			}
		}

		// end country radios

$res=$this->State_model->get($country);		
$state_ddmenu = array();
$state_ddmenu[0] = 'All States';		
foreach ($res as $tablerow) {
	$result = get_object_vars($tablerow);
	$res_count=$this->User_model->get_users_per_state($result['id']);
	if ($res_count>0)	
		$state_ddmenu[$result['id']] = $result['name'].'('.$res_count.")";
}	

$res=$this->County_model->get($country,$state);		
$county_menu = array();
$res_count=$this->User_model->get_users_per_state($state);		
$state_name = $this->State_model->get_name_by_id($state);

//MARKER 1

$time = microtime(true); 
// start time in Microseconds

//$county_menu[0] = "All $state_name Counties";	
$county_menu[0] = "All $state_name Regions";	
foreach ($res as $tablerow) {
	$result = get_object_vars($tablerow);
	//THIS IS THE PROBLEM TAKING 2-3 SECONDS TO RUN
	$res_count=$this->User_model->get_users_per_county($result['county_id']);
	if ($res_count>0)					
		$county_menu[$result['county_id']] = $result['name'].'('.$res_count.")";
}	

$microtime = (microtime(true) - $time) . ' # line 590 - 603 DISCOVER SLOW QUERY time elapsed';
echo "<script language='javascript'>console.log('$microtime');</script>";
// end time in Microseconds

//MARKER 2

$sort_menu['joined'] = 'Most Recent';
$sort_menu['statuses_count'] = 'Most Tweets';		
$sort_menu['followers_count'] = 'Most Followers';		
$sort_menu['friends_count'] = 'Most Following';		
$sort_menu['tags'] = 'Tags';				

$query = $this->db->query('SELECT t.tag_id,t.tag,tg.name FROM tags as t, tag_group as tg where t.tag_group_id = tg.tag_group_id order by tg.name asc');
$query2 = $this->db->query("SELECT tag_id, COUNT(tag_id) as tag_count FROM user_tags where user_id IN (select user_id from users where country_id='$country' and approved=1)  GROUP BY tag_id ");
$tag_count = array();

foreach ($query2->result() as $row)
{
	$tag_count[$row->tag_id] = $row->tag_count;
}	

$sort_options = array();
$sort_options[0] = "#All Tags";
foreach ($query->result() as $row)
{

	if (isset($tag_count[$row->tag_id]))
				//$sort_options[$row->tag_id] = $row->name.' - #'.$row->tag."(".$tag_count[$row->tag_id].")";
		$sort_options[$row->tag_id] = $row->name.' - #'.$row->tag;
}	

if ($state) 
	$show_all_results = false;
else
	$show_all_results = true;

$offset = $this->input->get('per_page');

$sort_by = 'tags';

if ($sort_by!='tags')

	if ($search && $search!="type anything ...") {
		list($first_name, $last_name) =  split(",", $search);
		$latest_users = $this->User_model->search_users($country,$first_name,$last_name,$show_all_results,$offset,$recs_per_page,$sort_by);
		$count_latest_users = $this->User_model->count_search_users($country,$first_name,$last_name,$show_all_results);

	}
	else
	{

		$latest_users = $this->User_model->get_latest_users($country,$state,$county,$show_all_results,$offset,$recs_per_page,$sort_by);
		$count_latest_users = $this->User_model->count_latest_users($country,$state,$county,$show_all_results);

	}
	else {
		if ($tag_id !=0) {
			$tag_list = $tag_list.$tag_id.",";
			$latest_users = $this->User_model->get_latest_users_by_tag($country,$state,$county,$show_all_results,$offset,$recs_per_page,$tag_id);
				//$count_latest_users = $this->User_model->count_latest_users_by_tag($country,$state,$county,$show_all_results,$tag_id);
				

		}
		else {
			
			$latest_users = $this->User_model->get_latest_users($country,$state,$county,$show_all_results,$offset,$recs_per_page,'');
			
			$count_latest_users = $this->User_model->count_latest_users($country,$state,$county,$show_all_results);
			
			//echo 'home page load query here';

		}
	}

	if ($show_guests == 'true') {

		$guest_users = $this->User_model->get_latest_users($country,$state,$county,$show_all_results,$offset,$recs_per_page,'', true);
		$count_guest_users = $this->User_model->count_latest_users($country,$state,$county,$show_all_results, true);
	}

	$tag_list_temp = trim($tag_list,",");
	
	//$tag_array = split(",", $tag_list_temp); 
	$tag_array = preg_split('/,/', $tag_list_temp); //May need to do this in other spots 
	
	for($i=0;$i<count($tag_array);$i++)
		$tag_array_name[] = $this->Tag_model->get_tag_by_id($tag_array[$i]);		
		//print_r($tag_array_name);


	if ($sort_by=='')
		$sort_by = 'tags';

	$upload_path = $this->Config_model->get_value('UPLOADED_PROFILE_IMAGES')->value;	

		//$user_tags = array();
	foreach ($latest_users as $user) {

		$query = $this->db->query('SELECT name FROM training_org where id='.$user->training_org_id);
		$row = $query->row();
		$user_training_org[$user->user_id] = $row->name;	

		$query = $this->db->query('SELECT name FROM certificate where certificate_id='.$user->certificate_id);
		$row = $query->row();
		$user_certificate[$user->user_id] = $row->name;			

		for($i=1;$i<=3;$i++) {
			$tag_result = $this->User_Tag_model->get_by_group($user->user_id,$i);
			foreach ($tag_result as $tag) {
				$user_tags[$user->user_id][$i][] = $this->Tag_model->get_tag_by_id($tag);

			}
		}

			// images

		foreach (glob($upload_path.$user->user_id."*.*") as $filename) {
			$user_image[$user->user_id]['exist'] = true;	
			$user_image[$user->user_id]['image_file']= $filename;			
		}	

	}

		// ALL USERS _ Get and limit records

	$most_followers_users = $this->User_model->get_latest_users_for_stats($country,0,0,true,0,18,"followers_count");
	$most_recent_users = $this->User_model->get_latest_users_for_stats($country,0,0,true,0,999999,null);
	$random_users = $this->User_model->get_latest_users_for_stats($country,0,0,true,0,999999,null);
	shuffle($random_users);
	$random_users = array_slice($random_users, 0, 100);

		// GUESTS - Show and limit records
	$all_guests = $this->User_model->get_latest_guests_for_stats($country,0,0,true,0,999999,null);
	$new_guests = $this->User_model->get_latest_guests_for_stats($country,0,0,true,0,18,null);


		// hidden data
	$hidden_data = array(
		'country'  => $country,
		'tag_list' => $tag_list
	); 


	/****************** Bread Crumb ***************/

	if ($country) {
		$breadcrumb[] = anchor('?c=welcome&m=index&country='.$country, $this->Country_model->get_name_by_id($country));
		if ($state) {
			$breadcrumb[] = anchor('?c=welcome&m=index&country='.$country."&state=".$state, $this->State_model->get_name_by_id($state));
			if ($county) {
				$breadcrumb[] = anchor('?c=welcome&m=index&country='.$country."&state=".$state."&county=".$county, $this->County_model->get_name_by_id($county));
				if ($city) {
					$breadcrumb[] = $this->City_model->get_name_by_id($city);
				}
			}
		}		
	}

		//$breadcrumb = array('red','blue','green','yellow');


	/*************  Pagination ******************/
		//if (!$state) $state = $_REQUEST['state']; //DO NOT DO THIS FOR CI	
		if (!$state) $state = $this->input->post('state'); 	
		//$county = $_REQUEST['county']; //DO NOT DO THIS FOR CI	
		$county = $this->input->post('county');	
		//$sort_by = $_REQUEST['sort_menu']; //DO NOT DO THIS FOR CI	
		$sort_by = $this->input->post('sort_menu'); 	
		//$tag_id = $_REQUEST['sort_options']; //DO NOT DO THIS FOR CI	
		$tag_id = $this->input->post('sort_options');
			
		$total_pages = ceil($count_latest_users / $recs_per_page);
		$current_page = ceil($offset / $recs_per_page)+1;			
		$config['base_url'] = "index.php?c=welcome&country=$country&state=$state&sort_menu=$sort_by&sort_options=$tag_id";
		$config['total_rows'] = $count_latest_users;
		$config['per_page'] = $recs_per_page; 
		$config['page_query_string'] = TRUE;
		$config['prev_tag_open'] = '<span class="prev_link">';
		$config['prev_link'] = '&lt;';		
		$config['prev_tag_close'] = '</span>';	
		$config['next_tag_open'] = '<span class="next_link">';
		$config['next_link'] = '&gt;';		
		$config['next_tag_close'] = '</span>';	
		$config['first_link'] = '&laquo;';
		//$config['first_link'] = "<span class=\"prev_link\">previous</span>";
		$config['last_link'] = '&raquo;';
		//$config['last_link'] = "<span class=\"next_link\">next</span>";
		$config['cur_tag_open'] = "<span class=\"current\">";
		$config['cur_tag_close'] = '</span>';
		$config['num_links'] = $total_pages;
		
		$this->pagination->initialize($config); 		
		$pagination = $this->pagination->create_links();	
		
		
		/******************  Form Objects *************/	
		
		$data['hidden_data'] = $hidden_data;	
		$data['state_list'] = $state_ddmenu;
		$data['country'] = $country;
		$data['county_list'] = $county_menu;
		$data['sort_menu'] = $sort_menu;	
		$data['sort_options'] = $sort_options;				
		$data['sort_options_selected'] = $tag_id;
		$data['sort_selected'] = $sort_by;					
		$data['state_selected'] = $state;				
		$data['county_selected'] = $county;			
		$data['latest_users'] = $latest_users;
		//$data['latest_guests'] = $latest_guests; //This is not defined or used I guess
		$data['most_followers_users'] = $most_followers_users;
		$data['most_recent_users'] = $most_recent_users;
		$data['random_users'] = $random_users;
		$data['new_guests'] = $new_guests;
		$data['all_guests'] = $all_guests;
		$data['pagination'] = $pagination;
		$data['total_pages'] = $total_pages;
		$data['current_page'] = $current_page;
		$data['user_tags'] = $user_tags;
		$data['user_training_org'] = $user_training_org;
		$data['user_certificate'] = $user_certificate;
		$data['profile_image_path'] = $dir = $this->Config_model->get_value('CACHED_PROFILE_IMAGES')->value;
		//$data['upload_image_path'] = $dir = $this->Config_model->get_value('UPLOAD_PHOTO_PATH')->value;	
		$data['user_image'] = $user_image;
		$data['breadcrumb'] = $breadcrumb;
		$data['error'] = $error;
		return $data;
	
	}

	function _get_map_data() {

		$recs_per_page = 10;
		
		$state = $this->input->post('state');	
		$county = $this->input->post('county');	
		$sort_by = $this->input->post('sort_menu');	
		$tag_id = $this->input->post('sort_options');						
		
		$this->load->helper('form');
		$data = array('title' => 'My Title',
			'heading' => 'My Heading'
			);
		
		// form data
		

		// handle country radios 
		$country=$this->input->post("country");	
		

		
		if (!$country) $country = 223; // default united states :)

		// end country radios

$res=$this->State_model->get($country);		
$state_ddmenu = array();
$state_ddmenu[0] = 'All States';		
foreach ($res as $tablerow) {
	$result = get_object_vars($tablerow);
	$res_count=$this->User_model->get_users_per_state($result['id']);
	if ($res_count>0)	
		$state_ddmenu[$result['id']] = $result['name'].'('.$res_count.")";
}	

$res=$this->County_model->get($country,$state);		
$county_menu = array();

$res_count=$this->User_model->get_users_per_state($state);		

$state_name = $this->State_model->get_name_by_id($state);

		//$county_menu[0] = "All $state_name Counties";	
$county_menu[0] = "All $state_name Regions";	
foreach ($res as $tablerow) {
	$result = get_object_vars($tablerow);
	$res_count=$this->User_model->get_users_per_county($result['county_id']);
	if ($res_count>0)					
		$county_menu[$result['county_id']] = $result['name'].'('.$res_count.")";
}	

$sort_menu['joined'] = 'Most Recent';
$sort_menu['statuses_count'] = 'Most Tweets';		
$sort_menu['followers_count'] = 'Most Followers';		
$sort_menu['friends_count'] = 'Most Following';		
$sort_menu['tags'] = 'Tags';				

$query = $this->db->query('SELECT t.tag_id,t.tag,tg.name FROM tags as t, tag_group as tg where t.tag_group_id = tg.tag_group_id order by tg.name asc');

$query2 = $this->db->query("SELECT tag_id, COUNT(tag_id) as tag_count FROM user_tags where user_id IN (select user_id from users where country_id='$country' and approved=1) GROUP BY tag_id ");
$tag_count = array();

foreach ($query2->result() as $row)
{
	$tag_count[$row->tag_id] = $row->tag_count;
}	


$sort_options = array();
foreach ($query->result() as $row)
{

	if (isset($tag_count[$row->tag_id]))
		$sort_options[$row->tag_id] = $row->name.' - #'.$row->tag."(".$tag_count[$row->tag_id].")";

}	

if ($state) 
	$show_all_results = false;
else
	$show_all_results = true;

$offset = $this->input->get('per_page');

if ($sort_by!='tags')
	$latest_users = $this->User_model->get_latest_users($country,$state,$county,$show_all_results,$offset,$recs_per_page,$sort_by);
else
	$latest_users = $this->User_model->get_latest_users_by_tag($country,$state,$county,$show_all_results,$offset,$recs_per_page,$tag_id);

$count_latest_users = $this->User_model->count_latest_users($country,$state,$county,$show_all_results);


		//$user_tags = array();
foreach ($latest_users as $user) {

	$query = $this->db->query('SELECT name FROM training_org where id='.$user->training_org_id);
	$row = $query->row();
	$user_training_org[$user->user_id] = $row->name;			

	for($i=1;$i<=3;$i++) {
		$tag_result = $this->User_Tag_model->get_by_group($user->user_id,$i);
		foreach ($tag_result as $tag) {
			$user_tags[$user->user_id][$i][] = $this->Tag_model->get_tag_by_id($tag);

		}
	}

	$address = $address.$this->County_model->get_name_by_id($user->county_id).",".$this->State_model->get_name_by_id($user->state_id).",".$this->Country_model->get_name_by_id($user->country_id)."#";

			// check if user has subscribed
			//$amember_id = $this->Amember_model->get_amember_id($user->user_id);
			//$no_of_subs = $this->Amember_model->has_subscribed($amember_id);
			//echo $no_of_subs;
}

		// top ten user lists


/***********************************  Pagination **********************************************/

$total_pages = ceil($count_latest_users / $recs_per_page);
$current_page = ceil($offset / $recs_per_page)+1;			
$config['base_url'] = 'index.php?c=welcome';
$config['total_rows'] = $count_latest_users;
$config['per_page'] = $recs_per_page; 
$config['page_query_string'] = TRUE;
		//$config['first_link'] = '&laquo;';
$config['first_link'] = "<span class=\"prev_link\">previous</span>";
		//$config['last_link'] = '&raquo;';
$config['last_link'] = "<span class=\"next_link\">next</span>";
$config['cur_tag_open'] = "<span class=\"current\">";
$config['cur_tag_close'] = '</span>';
$this->pagination->initialize($config); 		
$pagination = $this->pagination->create_links();	


/***********************************  Form Objects *******************************************/	

$data['state_list'] = $state_ddmenu;
$data['country'] = $country;
$data['county_list'] = $county_menu;
$data['sort_menu'] = $sort_menu;	
$data['sort_options'] = $sort_options;				
$data['sort_selected'] = $sort_by;					
$data['state_selected'] = $state;				
$data['county_selected'] = $county;			
$data['latest_users'] = $latest_users;	
$data['pagination'] = $pagination;
$data['total_pages'] = $total_pages;
$data['current_page'] = $current_page;
$data['user_tags'] = $user_tags;
$data['user_training_org'] = $user_training_org;
$data['address_line'] = $address;
$data['profile_image_path'] = $dir = $this->Config_model->get_value('CACHED_PROFILE_IMAGES')->value;
$data['upload_image_path'] = $dir = $this->Config_model->get_value('UPLOAD_PHOTO_PATH')->value;			
		//print_r($user_tags);
print_r($data);
echo "<script language='javascript'>console.log('function get_map_data ');</script>";
return $data;
}


function guests() {

            $country=$_REQUEST['country']; //$this->input->post("country");
            $state = $_REQUEST['state']; //$this->input->post('state');
            $county = $_REQUEST['county']; //$this->input->post('county');

        // breadcrumbs
            
            if ($country) {
            	$breadcrumb[] = anchor('?c=welcome&m=index&country='.$country, $this->Country_model->get_name_by_id($country));
            	if ($state) {
            		$breadcrumb[] = anchor('?c=welcome&m=index&country='.$country."&state=".$state, $this->State_model->get_name_by_id($state));
            		if ($county) {
            			$breadcrumb[] = anchor('?c=welcome&m=index&country='.$country."&state=".$state."&county=".$county, $this->County_model->get_name_by_id($county));
            			if ($city) {
            				$breadcrumb[] = $this->City_model->get_name_by_id($city);
            			}
            		}
            	}
            }


            
        }

        function view_links() {

        	$user_id   = $this->input->get('user_id');

        	$user_data = $this->User_model->get_user($user_id);
        	$data['user'] = $user_data;

        	$data['profile_image_path'] = $dir = $this->Config_model->get_value('CACHED_PROFILE_IMAGES')->value;
        	$this->load->view('header_lite');						
        	$this->load->view('modal_view_links', $data);
        	$this->load->view('footer_lite');		

        }

        function view_map() {

        	$user_id   = $this->input->get('user_id');
        	if (!$this->User_model->user_exist($user_id)) show_404();
        	$user = $this->User_model->get_user($user_id);
        	$hide_street = $user->hide_google_map;
        	$data['user'] = $user;


        	$county = $this->County_model->get_name_by_id($user->county_id);
        	$state =  $this->State_model->get_name_by_id($user->state_id);
        	$country = $this->Country_model->get_name_by_id($user->country_id);
        	$city = $this->City_model->get_name_by_id($user->city_id);
        	$street_address	= $user->street_address;	
        	$show_street_address= $user->hide_google_map;
        	$name = $user->first_name." ".$user->last_name;

        	if ($country) {
        		$geo = $country;
        		if ($state) {
        			$geo = $state.",".$country;
        			$geo_html = $state.",<br>
        			".$country;
        			if ($county) {
        				$geo = $county.",".$state.",".$country;
        				$geo_html = $county.",<br>
        				".$state.",<br>
        				".$country;
        			}	
        		}
        	}

        	if ($city) {
        		$geo = $city.",".$county.",".$state.",".$country;
        		$geo_html = $city.",<br>
        		".$county.",<br>
        		".$state.",<br>
        		".$country;
        	}		

        	if ($street_address && !$hide_street) {

        		$geo = $street_address.",".$city.",".$county.",".$state.",".$country;
        		$geo_html = $street_address.",<br>
        		".$city.",<br>
        		".$county.",<br>
        		".$state.",<br>
        		".$country;
        	}

        	$geo = str_replace(",,",",",$geo);

        	$data['html'] = $geo_html;
        	$data['geo'] = $geo;
        	$data['name'] = $name;
        	$data['profile_image_url'] = $user->profile_image_url;


		//show_404('page');
		//$this->load->view('header_lite');						
        	$this->load->view('modal_view_map', $data);
		//$this->load->view('footer_lite');		

        }	

        function amember() {
        	$data = array();
        	$id = $_COOKIE['user_id'];		

        	if ($this->input->get('member_id')) {
        		$this->_verify_amember();
        		$id = $this->input->get('member_id');

        	}
        	$data = array(
        		'login'  => $id,
        		'pass' =>  md5($id),
        		'submit' => 'Login'
        		);		 

        	$this->load->view('amember_redirect', $data);
        }

        function _verify_amember()
        {		
        	$this->load->library('xmlrpc');
        	$this->xmlrpc->server('http://personaltrainerwall.com/amember/xmlrpc/', 80);
        	$this->xmlrpc->method('query');
        	$member_id =  $this->input->get('member_id');

        	$request = array("update members set email_verified=1 where login='$member_id'");

        	$this->xmlrpc->request($request);
        	$query = $this->db->query("UPDATE users set email_verified = 1 where user_id = '$member_id'");

        	if ( ! $this->xmlrpc->send_request())
        	{

			//echo $this->xmlrpc->display_error();
        	} else {
			//print_r($this->xmlrpc->display_response());
        	}
        }	

        function _locate_ip($ip){
	  $time = microtime(true); // time in Microseconds
	  //$d = file_get_contents("http://www.ipinfodb.com/ip_query.php?ip=$ip&output=xml&timezone=false");
	  $d = file_get_contents("http://api.ipinfodb.com/v3/ip-city?key=89ae5eb408ea4d70c6c92dbe4d949a60f1de36772231945ccd1ac814123d7362&ip=$ip&timezone=false&format=xml");

	  //Use backup server if cannot make a connection
	  if (!$d){
	  	$backup = file_get_contents("http://backup.ipinfodb.com/ip_query.php?ip=$ip&output=xml&timezone=false");
	  	$answer = new SimpleXMLElement($backup);
	  	if (!$backup) 
		return false; // Failed to open connection
	
} else {
		//echo "<p>$d</p>";
	$answer = new SimpleXMLElement($d);

	echo "<script language='javascript'>console.log('successfully getting data from IP');</script>";
		//echo (microtime(true) - $time) . ' index function elapsed';
	$microtime = (microtime(true) - $time) . ' _locate_ip function elapsed';
	echo "<script language='javascript'>console.log('$microtime');</script>";	
}

$ip = $answer->ipAddress;
$country_code = $answer->countryCode;
$country_name = $answer->countryName;
$region_name = $answer->regionName;
$city = $answer->cityName;
$zippostalcode = $answer->zipCode;
$latitude = $answer->latitude;
$longitude = $answer->longitude;

	  //Return the data as an array
return array('ip' => $ip, 'country_code' => $country_code, 'country_name' => $country_name, 'region_name' => $region_name, 'city' => $city, 'zippostalcode' => $zippostalcode, 'latitude' => $latitude, 'longitude' => $longitude);


}	

function logoff() {
	setcookie('oauth_token', '',1);
	setcookie('oauth_token_secret','',1);
	setcookie('user_id','',1);		
	header("location: index.php");
}

function test() {

		//$this->load->helper('amember');
	echo is_user_sponsor('1265458539');


}

function clear() {
	session_start();
	session_destroy();
	print_r($_SESSION);
}

	//Memory usage script
}