<?
class UsersModel extends Model {
/**
 * MODULE NAME   : usersmodel.php
 *
 * DESCRIPTION   : Users model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2009-11-22 03:47 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             users
 * @subpackage          Users model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $user_id;
var $twitter_name;
var $country_id;
var $state_id;
var $county_id;
var $email;
var $hide_email;
var $profile_image_url;
var $first_name;
var $last_name;
var $certificate_id;
var $insurance_org_id;
var $training_org_id;
var $cert_reg_no;
var $cert_expiry;
var $insurance_reg_no;
var $insurance_expiry;
var $oauth_access_token;
var $oauth_access_token_secret;
var $statuses_count;
var $followers_count;
var $friends_count;
var $description;
var $url;
var $joined;
var $sync;


   function UsersModel()
   {
      parent::Model();
      $this->obj =& get_instance();

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Load database libraries and other libraries and helpers. The
      // NOTE: ...generated code loads the database library as it requires it,
      // NOTE: ...but you may prefer to load here or autoload, In this case
      // NOTE: ...remember to delete all explicit load()s.
      // ///////////////////////////////////////////////////////////////////////

      // Initialise or clear class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      $this->_init_Users();

   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: findAll()
   //
   // Description: Retrieves and returns data listing from the database
   //
   // //////////////////////////////////////////////////////////////////////////
   function findAll($start = NULL, $count = NULL) {
      return $this->find(NULL, $start, $count);
   }

//   function findById($key_value) {
//      return $this->find(array('user_id' => '$key_value'));
//   }

   function findByFilter($filter_rules, $start = NULL, $count = NULL) {
      return $this->find($filter_rules, $start, $count);
   }

   function find($filters = NULL, $start = NULL, $count = NULL) {

      $results = array();

      // Load the database library
      $this->load->database();

      // ///////////////////////////////////////////////////////////////////////
      // Make a note of the current table record count
      // ///////////////////////////////////////////////////////////////////////
      $this->table_record_count = $this->db->count_all( 'users' );


      // Filter could be an array or filter values or an SQL string.
      $where_clause = '';
      if ($filters) {
         if ( is_string($filters) ) {
            $where_clause = $filters;
         }
         elseif ( is_array($filters) ) {
            // Build your filter rules
            if ( count($filters) > 0 ) {
               foreach ($filters as $field => $value) {
                  $filter_list[] = " $field = '$value' ";
               }
               $where_clause = ' WHERE ' . join(' AND ', $filter_list );
            }
         }

      }

      $limit_clause = '';
      if ($start) {
         if ($count) {
            $limit_clause = " LIMIT $start, $count ";
         }
         else {
            $limit_clause = " LIMIT $start ";
         }
      }

      // Build up the SQL query string and run the query
      $sql = 'SELECT * FROM users ' . $where_clause . $limit_clause;

      $query = $this->db->query($sql);

      if ($query->num_rows() > 0) {
         // ////////////////////////////////////////////////////////////////////
         // NOTE: At this stage you could return the entire result set, like:
         // NOTE: ...return $query->result_array();
         // NOTE: ...The generated code loops through the result set to provide
         // NOTE: ...the oppurtunity to provide further customisations on the
         // NOTE: ...code (especially if you are generating in verbose mode).
         // ////////////////////////////////////////////////////////////////////

         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['user_id']		 = $row['user_id'];
			$query_results['twitter_name']		 = $row['twitter_name'];
			$query_results['country_id']		 = $row['country_id'];
			$query_results['state_id']		 = $row['state_id'];
			$query_results['county_id']		 = $row['county_id'];
			$query_results['email']		 = $row['email'];
			$query_results['hide_email']		 = $row['hide_email'];
			$query_results['profile_image_url']		 = $row['profile_image_url'];
			$query_results['first_name']		 = $row['first_name'];
			$query_results['last_name']		 = $row['last_name'];
			$query_results['certificate_id']		 = $row['certificate_id'];
			$query_results['insurance_org_id']		 = $row['insurance_org_id'];
			$query_results['training_org_id']		 = $row['training_org_id'];
			$query_results['cert_reg_no']		 = $row['cert_reg_no'];
			$query_results['cert_expiry']		 = $row['cert_expiry'];
			$query_results['insurance_reg_no']		 = $row['insurance_reg_no'];
			$query_results['insurance_expiry']		 = $row['insurance_expiry'];
			$query_results['oauth_access_token']		 = $row['oauth_access_token'];
			$query_results['oauth_access_token_secret']		 = $row['oauth_access_token_secret'];
			$query_results['statuses_count']		 = $row['statuses_count'];
			$query_results['followers_count']		 = $row['followers_count'];
			$query_results['friends_count']		 = $row['friends_count'];
			$query_results['description']		 = $row['description'];
			$query_results['url']		 = $row['url'];
			$query_results['joined']		 = $row['joined'];
			$query_results['sync']		 = $row['sync'];

			$results[]		 = $query_results;


         }

      }

      return $results;

   }


   // TODO: this won't be possible if there is no primary key for the table.
   function retrieve_by_pkey($idField) {

      $results = array();

      // Load  the db library
      $this->load->database();

      $query = $this->db->query("SELECT * FROM users WHERE user_id = '$idField' LIMIT 1");

      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['user_id']		 = $row['user_id'];
		$query_results['twitter_name']		 = $row['twitter_name'];
		$query_results['country_id']		 = $row['country_id'];
		$query_results['state_id']		 = $row['state_id'];
		$query_results['county_id']		 = $row['county_id'];
		$query_results['email']		 = $row['email'];
		$query_results['hide_email']		 = $row['hide_email'];
		$query_results['profile_image_url']		 = $row['profile_image_url'];
		$query_results['first_name']		 = $row['first_name'];
		$query_results['last_name']		 = $row['last_name'];
		$query_results['certificate_id']		 = $row['certificate_id'];
		$query_results['insurance_org_id']		 = $row['insurance_org_id'];
		$query_results['training_org_id']		 = $row['training_org_id'];
		$query_results['cert_reg_no']		 = $row['cert_reg_no'];
		$query_results['cert_expiry']		 = $row['cert_expiry'];
		$query_results['insurance_reg_no']		 = $row['insurance_reg_no'];
		$query_results['insurance_expiry']		 = $row['insurance_expiry'];
		$query_results['oauth_access_token']		 = $row['oauth_access_token'];
		$query_results['oauth_access_token_secret']		 = $row['oauth_access_token_secret'];
		$query_results['statuses_count']		 = $row['statuses_count'];
		$query_results['followers_count']		 = $row['followers_count'];
		$query_results['friends_count']		 = $row['friends_count'];
		$query_results['description']		 = $row['description'];
		$query_results['url']		 = $row['url'];
		$query_results['joined']		 = $row['joined'];
		$query_results['sync']		 = $row['sync'];

		$results		 = $query_results;


      }
      else {
         $results = false;
      }

      return $results;
   }


   function add( $data ) {

      // Load the database library
      $this->load->database();

      // Build up the SQL query string
      $sql = $this->db->insert_string('users', $data);

      $query = $this->db->query($sql);

      return $this->db->insert_id();
   }

   function modify($keyvalue, $data) {


      // Load the database library
      $this->load->database();

      // Build up the SQL query string
      $where = "user_id = $keyvalue";
      $sql = $this->db->update_string('users', $data, $where);

      $query = $this->db->query($sql);

   }

   function delete_by_pkey($idField)
   {
      // Load  the db library
      $this->load->database();

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the query function call below
      // ///////////////////////////////////////////////////////////////////////
      // $query = $this->db->query("DELETE FROM users WHERE user_id = '$idField' ");

     return true;

   }

	function get_User_id() {
		return $this->user_id;	}

	function set_User_id($user_id) {
		$this->user_id = $user_id;	}

	function get_Twitter_name() {
		return $this->twitter_name;	}

	function set_Twitter_name($twitter_name) {
		$this->twitter_name = $twitter_name;	}

	function get_Country_id() {
		return $this->country_id;	}

	function set_Country_id($country_id) {
		$this->country_id = $country_id;	}

	function get_State_id() {
		return $this->state_id;	}

	function set_State_id($state_id) {
		$this->state_id = $state_id;	}

	function get_County_id() {
		return $this->county_id;	}

	function set_County_id($county_id) {
		$this->county_id = $county_id;	}

	function get_Email() {
		return $this->email;	}

	function set_Email($email) {
		$this->email = $email;	}

	function get_Hide_email() {
		return $this->hide_email;	}

	function set_Hide_email($hide_email) {
		$this->hide_email = $hide_email;	}

	function get_Profile_image_url() {
		return $this->profile_image_url;	}

	function set_Profile_image_url($profile_image_url) {
		$this->profile_image_url = $profile_image_url;	}

	function get_First_name() {
		return $this->first_name;	}

	function set_First_name($first_name) {
		$this->first_name = $first_name;	}

	function get_Last_name() {
		return $this->last_name;	}

	function set_Last_name($last_name) {
		$this->last_name = $last_name;	}

	function get_Certificate_id() {
		return $this->certificate_id;	}

	function set_Certificate_id($certificate_id) {
		$this->certificate_id = $certificate_id;	}

	function get_Insurance_org_id() {
		return $this->insurance_org_id;	}

	function set_Insurance_org_id($insurance_org_id) {
		$this->insurance_org_id = $insurance_org_id;	}

	function get_Training_org_id() {
		return $this->training_org_id;	}

	function set_Training_org_id($training_org_id) {
		$this->training_org_id = $training_org_id;	}

	function get_Cert_reg_no() {
		return $this->cert_reg_no;	}

	function set_Cert_reg_no($cert_reg_no) {
		$this->cert_reg_no = $cert_reg_no;	}

	function get_Cert_expiry() {
		return $this->cert_expiry;	}

	function set_Cert_expiry($cert_expiry) {
		$this->cert_expiry = $cert_expiry;	}

	function get_Insurance_reg_no() {
		return $this->insurance_reg_no;	}

	function set_Insurance_reg_no($insurance_reg_no) {
		$this->insurance_reg_no = $insurance_reg_no;	}

	function get_Insurance_expiry() {
		return $this->insurance_expiry;	}

	function set_Insurance_expiry($insurance_expiry) {
		$this->insurance_expiry = $insurance_expiry;	}

	function get_Oauth_access_token() {
		return $this->oauth_access_token;	}

	function set_Oauth_access_token($oauth_access_token) {
		$this->oauth_access_token = $oauth_access_token;	}

	function get_Oauth_access_token_secret() {
		return $this->oauth_access_token_secret;	}

	function set_Oauth_access_token_secret($oauth_access_token_secret) {
		$this->oauth_access_token_secret = $oauth_access_token_secret;	}

	function get_Statuses_count() {
		return $this->statuses_count;	}

	function set_Statuses_count($statuses_count) {
		$this->statuses_count = $statuses_count;	}

	function get_Followers_count() {
		return $this->followers_count;	}

	function set_Followers_count($followers_count) {
		$this->followers_count = $followers_count;	}

	function get_Friends_count() {
		return $this->friends_count;	}

	function set_Friends_count($friends_count) {
		$this->friends_count = $friends_count;	}

	function get_Description() {
		return $this->description;	}

	function set_Description($description) {
		$this->description = $description;	}

	function get_Url() {
		return $this->url;	}

	function set_Url($url) {
		$this->url = $url;	}

	function get_Joined() {
		return $this->joined;	}

	function set_Joined($joined) {
		$this->joined = $joined;	}

	function get_Sync() {
		return $this->sync;	}

	function set_Sync($sync) {
		$this->sync = $sync;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Users()
      {
		$this->user_id = "";
		$this->twitter_name = "";
		$this->country_id = "";
		$this->state_id = "";
		$this->county_id = "";
		$this->email = "";
		$this->hide_email = "";
		$this->profile_image_url = "";
		$this->first_name = "";
		$this->last_name = "";
		$this->certificate_id = "";
		$this->insurance_org_id = "";
		$this->training_org_id = "";
		$this->cert_reg_no = "";
		$this->cert_expiry = "";
		$this->insurance_reg_no = "";
		$this->insurance_expiry = "";
		$this->oauth_access_token = "";
		$this->oauth_access_token_secret = "";
		$this->statuses_count = "";
		$this->followers_count = "";
		$this->friends_count = "";
		$this->description = "";
		$this->url = "";
		$this->joined = "";
		$this->sync = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyUsers()
      {
		$this->user_id = "";
		$this->twitter_name = "";
		$this->country_id = "";
		$this->state_id = "";
		$this->county_id = "";
		$this->email = "";
		$this->hide_email = "";
		$this->profile_image_url = "";
		$this->first_name = "";
		$this->last_name = "";
		$this->certificate_id = "";
		$this->insurance_org_id = "";
		$this->training_org_id = "";
		$this->cert_reg_no = "";
		$this->cert_expiry = "";
		$this->insurance_reg_no = "";
		$this->insurance_expiry = "";
		$this->oauth_access_token = "";
		$this->oauth_access_token_secret = "";
		$this->statuses_count = "";
		$this->followers_count = "";
		$this->friends_count = "";
		$this->description = "";
		$this->url = "";
		$this->joined = "";
		$this->sync = "";

      }

}

?>
