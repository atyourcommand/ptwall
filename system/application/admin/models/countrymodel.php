<?
class CountryModel extends Model {
/**
 * MODULE NAME   : countrymodel.php
 *
 * DESCRIPTION   : Country model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2009-11-22 02:54 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             country
 * @subpackage          Country model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $country_id;
var $name;
var $iso_code_2;
var $iso_code_3;
var $address_format;
var $enabled;


   function CountryModel()
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
      $this->_init_Country();

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
//      return $this->find(array('country_id' => '$key_value'));
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
      $this->table_record_count = $this->db->count_all( 'country' );


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
      $sql = 'SELECT * FROM country ' . $where_clause . $limit_clause;

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

			$query_results['country_id']		 = $row['country_id'];
			$query_results['name']		 = $row['name'];
			$query_results['iso_code_2']		 = $row['iso_code_2'];
			$query_results['iso_code_3']		 = $row['iso_code_3'];
			$query_results['address_format']		 = $row['address_format'];
			$query_results['enabled']		 = $row['enabled'];

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

      $query = $this->db->query("SELECT * FROM country WHERE country_id = '$idField' LIMIT 1");

      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['country_id']		 = $row['country_id'];
		$query_results['name']		 = $row['name'];
		$query_results['iso_code_2']		 = $row['iso_code_2'];
		$query_results['iso_code_3']		 = $row['iso_code_3'];
		$query_results['address_format']		 = $row['address_format'];
		$query_results['enabled']		 = $row['enabled'];

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
      $sql = $this->db->insert_string('country', $data);

      $query = $this->db->query($sql);

      return $this->db->insert_id();
   }

   function modify($keyvalue, $data) {


      // Load the database library
      $this->load->database();

      // Build up the SQL query string
      $where = "country_id = $keyvalue";
      $sql = $this->db->update_string('country', $data, $where);

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
      // $query = $this->db->query("DELETE FROM country WHERE country_id = '$idField' ");

     return true;

   }

	function get_Country_id() {
		return $this->country_id;	}

	function set_Country_id($country_id) {
		$this->country_id = $country_id;	}

	function get_Name() {
		return $this->name;	}

	function set_Name($name) {
		$this->name = $name;	}

	function get_Iso_code_2() {
		return $this->iso_code_2;	}

	function set_Iso_code_2($iso_code_2) {
		$this->iso_code_2 = $iso_code_2;	}

	function get_Iso_code_3() {
		return $this->iso_code_3;	}

	function set_Iso_code_3($iso_code_3) {
		$this->iso_code_3 = $iso_code_3;	}

	function get_Address_format() {
		return $this->address_format;	}

	function set_Address_format($address_format) {
		$this->address_format = $address_format;	}

	function get_Enabled() {
		return $this->enabled;	}

	function set_Enabled($enabled) {
		$this->enabled = $enabled;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Country()
      {
		$this->country_id = "";
		$this->name = "";
		$this->iso_code_2 = "";
		$this->iso_code_3 = "";
		$this->address_format = "";
		$this->enabled = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyCountry()
      {
		$this->country_id = "";
		$this->name = "";
		$this->iso_code_2 = "";
		$this->iso_code_3 = "";
		$this->address_format = "";
		$this->enabled = "";

      }

}

?>
