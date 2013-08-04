<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MODULE NAME   : Users.php
 *
 * DESCRIPTION   : Users module controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2009-11-21 04:29 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             Users
 * @subpackage          users component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

class Users extends Controller {

   /**
   * Contructor function
   *
   * Load the instance of CI by invoking the parent constructor
   *
   * @access      public
   * @return      none
   */
   function Users() {
      parent::Controller();
   }

   /**
   * "Index" Page
   *
   * Default class action
   *
   * @access      public
   * @return      none
   */

   function index() {
      // The default action is the showall action
      $this->browse();

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Load libraries and other libraries and helpers here. The
      // NOTE: ...generated code loads the database library as it requires it,
      // NOTE: ...but you may prefer to load here or autoload, In this case
      // NOTE: ...remember to delete all explicit load()s.
      // ///////////////////////////////////////////////////////////////////////
   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: showall()
   //
   // Description: Extracts a list of all users data records and displays it.
   //
   // //////////////////////////////////////////////////////////////////////////
   function browse() {

      // ///////////////////////////////////////////////////////////////////////
      // Request the list from database. This is done by creating an instance of
      // ...the users model and sending it a 'retrievelist' request.
      // ///////////////////////////////////////////////////////////////////////

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you are not using pagination, then set appropriate values for
      // NOTE: ...the $start and $limit_per_page values, or remove then from the
      // NOTE: ...function call.
      // ///////////////////////////////////////////////////////////////////////
      $start = $this->uri->segment(3,0);
      $limit_per_page = 10;

      $this->load->model('usersmodel');                  // Instantiate the model
      $the_results['users_list'] = $this->usersmodel->findAll($start, $limit_per_page);  // Send the retrievelist msg
      // $the_results['rowcount'] = count($the_results['users_list']);

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set up the paging links. Just remove this if you don't need it,
      // NOTE: ...but you must remember to change the views too.
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('pagination');
      $this->load->helper('url');

      $config['base_url']     = site_url('users/showall/');   // or just /users/
      $config['total_rows']   = $this->usersmodel->table_record_count;
      $config['per_page']     = $limit_per_page;

      $this->pagination->initialize($config);

      $the_results['page_links'] = $this->pagination->create_links();


      // ///////////////////////////////////////////////////////////////////////
      // Print the results on the web page tmeplate. This is done by creating an
      // ...instance of the layout library and sending it a 'render_page' request
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('layout');

      $this->layout->render_page('/users/usersgrid', $the_results);
      // NOTE: If you don't want to use the layout library, use the line below.
      // $this->load->view('/users/usersgrid', $the_results);

   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: add()
   //
   // Description: Prompts user for input and adds a new users entry
   //              ...onto the database.
   //
   // //////////////////////////////////////////////////////////////////////////
   function add() {

      $this->load->helper('url');

      // ///////////////////////////////////////////////////////////////////////
      // How are we being invoked. The user is either requesting a form or is
      // ...submitting it.
      // ///////////////////////////////////////////////////////////////////////
      $submit = $this->input->post('Submit');

      if ( $submit != false ) {
         // ////////////////////////////////////////////////////////////////////
         // User is submitting data
         // Store the values from the form onto the db
         // ////////////////////////////////////////////////////////////////////
         $this->load->model('usersmodel');

         /*
		// XXS Filtering enforced for user input
		$data['user_id']		= $this->input->post('user_id', TRUE);
		$data['twitter_name']		= $this->input->post('twitter_name', TRUE);
		$data['country_id']		= $this->input->post('country_id', TRUE);
		$data['state_id']		= $this->input->post('state_id', TRUE);
		$data['county_id']		= $this->input->post('county_id', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['hide_email']		= $this->input->post('hide_email', TRUE);
		$data['profile_image_url']		= $this->input->post('profile_image_url', TRUE);
		$data['first_name']		= $this->input->post('first_name', TRUE);
		$data['last_name']		= $this->input->post('last_name', TRUE);
		$data['certificate_id']		= $this->input->post('certificate_id', TRUE);
		$data['insurance_org_id']		= $this->input->post('insurance_org_id', TRUE);
		$data['training_org_id']		= $this->input->post('training_org_id', TRUE);
		$data['cert_reg_no']		= $this->input->post('cert_reg_no', TRUE);
		$data['cert_expiry']		= $this->input->post('cert_expiry', TRUE);
		$data['insurance_reg_no']		= $this->input->post('insurance_reg_no', TRUE);
		$data['insurance_expiry']		= $this->input->post('insurance_expiry', TRUE);
		$data['oauth_access_token']		= $this->input->post('oauth_access_token', TRUE);
		$data['oauth_access_token_secret']		= $this->input->post('oauth_access_token_secret', TRUE);
		$data['statuses_count']		= $this->input->post('statuses_count', TRUE);
		$data['followers_count']		= $this->input->post('followers_count', TRUE);
		$data['friends_count']		= $this->input->post('friends_count', TRUE);
		$data['description']		= $this->input->post('description', TRUE);
		$data['url']		= $this->input->post('url', TRUE);
		$data['joined']		= $this->input->post('joined', TRUE);

         */
         $data = $this->_get_form_values();

         $this->usersmodel->add($data);

         // $this->load->helper('url');
         redirect('/users/', 'location');

      }
      else {
         // We have to show the user the input form
         /*
		$data['user_id']		= '';
		$data['twitter_name']		= '';
		$data['country_id']		= '';
		$data['state_id']		= '';
		$data['county_id']		= '';
		$data['email']		= '';
		$data['hide_email']		= '';
		$data['profile_image_url']		= '';
		$data['first_name']		= '';
		$data['last_name']		= '';
		$data['certificate_id']		= '';
		$data['insurance_org_id']		= '';
		$data['training_org_id']		= '';
		$data['cert_reg_no']		= '';
		$data['cert_expiry']		= '';
		$data['insurance_reg_no']		= '';
		$data['insurance_expiry']		= '';
		$data['oauth_access_token']		= '';
		$data['oauth_access_token_secret']		= '';
		$data['statuses_count']		= '';
		$data['followers_count']		= '';
		$data['friends_count']		= '';
		$data['description']		= '';
		$data['url']		= '';
		$data['joined']		= '';

         */
         $data = $this->_clear_form();
         $data['action']       = 'add';



         // Call upon the layout library to draw the input screen
         $this->load->library('layout');
         $this->layout->render_page('/users/usersdetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('/users/usersdetails', $data);


      }
   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: modify()
   //
   // Description: Controller function to process user modify requests
   //
   // //////////////////////////////////////////////////////////////////////////
   function modify() {

      $this->load->helper('url');

      // ///////////////////////////////////////////////////////////////////////
      // How are we being invoked
      // ///////////////////////////////////////////////////////////////////////
      $submit = $this->input->post('Submit');

      if ( $submit != false ) {
         // ////////////////////////////////////////////////////////////////////
         // User is submitting data
         // Store the values from the form onto the db
         // ////////////////////////////////////////////////////////////////////
         $this->load->model('usersmodel');

         // $data['action']          = 'modify';
         /*
		// XXS Filtering enforced for user input
		$data['user_id']		= $this->input->post('user_id', TRUE);
		$data['twitter_name']		= $this->input->post('twitter_name', TRUE);
		$data['country_id']		= $this->input->post('country_id', TRUE);
		$data['state_id']		= $this->input->post('state_id', TRUE);
		$data['county_id']		= $this->input->post('county_id', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['hide_email']		= $this->input->post('hide_email', TRUE);
		$data['profile_image_url']		= $this->input->post('profile_image_url', TRUE);
		$data['first_name']		= $this->input->post('first_name', TRUE);
		$data['last_name']		= $this->input->post('last_name', TRUE);
		$data['certificate_id']		= $this->input->post('certificate_id', TRUE);
		$data['insurance_org_id']		= $this->input->post('insurance_org_id', TRUE);
		$data['training_org_id']		= $this->input->post('training_org_id', TRUE);
		$data['cert_reg_no']		= $this->input->post('cert_reg_no', TRUE);
		$data['cert_expiry']		= $this->input->post('cert_expiry', TRUE);
		$data['insurance_reg_no']		= $this->input->post('insurance_reg_no', TRUE);
		$data['insurance_expiry']		= $this->input->post('insurance_expiry', TRUE);
		$data['oauth_access_token']		= $this->input->post('oauth_access_token', TRUE);
		$data['oauth_access_token_secret']		= $this->input->post('oauth_access_token_secret', TRUE);
		$data['statuses_count']		= $this->input->post('statuses_count', TRUE);
		$data['followers_count']		= $this->input->post('followers_count', TRUE);
		$data['friends_count']		= $this->input->post('friends_count', TRUE);
		$data['description']		= $this->input->post('description', TRUE);
		$data['url']		= $this->input->post('url', TRUE);
		$data['joined']		= $this->input->post('joined', TRUE);

         */
         $data = $this->_get_form_values();

         $this->usersmodel->modify($data['user_id'], $data);

         redirect('/users/', 'location');

      }
      else {
         // We have to show the user the input form

         $idField = $this->uri->segment(3);

         $this->load->model('usersmodel');
         $data = $this->usersmodel->retrieve_by_pkey($idField);
         $data['action'] = 'modify';



         $this->load->library('layout');
         $this->layout->render_page('/users/usersdetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('/users/usersdetails', $data);


      }
   }


   // //////////////////////////////////////////////////////////////////////////
   // Function: delete()
   //
   // Description: Controller function to process user delete requests
   //
   // //////////////////////////////////////////////////////////////////////////
   function delete() {
      $idField = $this->uri->segment(3);

      $this->load->model('usersmodel');
      $the_results = $this->usersmodel->delete_by_pkey($idField);

      $this->load->helper('url');
      redirect('/users/', 'location');

   }

   function _clear_form() {

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set default values for the form here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		$data['user_id']		= '';
		$data['twitter_name']		= '';
		$data['country_id']		= '';
		$data['state_id']		= '';
		$data['county_id']		= '';
		$data['email']		= '';
		$data['hide_email']		= '';
		$data['profile_image_url']		= '';
		$data['first_name']		= '';
		$data['last_name']		= '';
		$data['certificate_id']		= '';
		$data['insurance_org_id']		= '';
		$data['training_org_id']		= '';
		$data['cert_reg_no']		= '';
		$data['cert_expiry']		= '';
		$data['insurance_reg_no']		= '';
		$data['insurance_expiry']		= '';
		$data['oauth_access_token']		= '';
		$data['oauth_access_token_secret']		= '';
		$data['statuses_count']		= '';
		$data['followers_count']		= '';
		$data['friends_count']		= '';
		$data['description']		= '';
		$data['url']		= '';
		$data['joined']		= '';

      return $data;

   }

   function _get_form_values() {
      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Perform customisation on the retrieved form values here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		// XXS Filtering enforced for user input
		$data['user_id']		= $this->input->post('user_id', TRUE);
		$data['twitter_name']		= $this->input->post('twitter_name', TRUE);
		$data['country_id']		= $this->input->post('country_id', TRUE);
		$data['state_id']		= $this->input->post('state_id', TRUE);
		$data['county_id']		= $this->input->post('county_id', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['hide_email']		= $this->input->post('hide_email', TRUE);
		$data['profile_image_url']		= $this->input->post('profile_image_url', TRUE);
		$data['first_name']		= $this->input->post('first_name', TRUE);
		$data['last_name']		= $this->input->post('last_name', TRUE);
		$data['certificate_id']		= $this->input->post('certificate_id', TRUE);
		$data['insurance_org_id']		= $this->input->post('insurance_org_id', TRUE);
		$data['training_org_id']		= $this->input->post('training_org_id', TRUE);
		$data['cert_reg_no']		= $this->input->post('cert_reg_no', TRUE);
		$data['cert_expiry']		= $this->input->post('cert_expiry', TRUE);
		$data['insurance_reg_no']		= $this->input->post('insurance_reg_no', TRUE);
		$data['insurance_expiry']		= $this->input->post('insurance_expiry', TRUE);
		$data['oauth_access_token']		= $this->input->post('oauth_access_token', TRUE);
		$data['oauth_access_token_secret']		= $this->input->post('oauth_access_token_secret', TRUE);
		$data['statuses_count']		= $this->input->post('statuses_count', TRUE);
		$data['followers_count']		= $this->input->post('followers_count', TRUE);
		$data['friends_count']		= $this->input->post('friends_count', TRUE);
		$data['description']		= $this->input->post('description', TRUE);
		$data['url']		= $this->input->post('url', TRUE);
		$data['joined']		= $this->input->post('joined', TRUE);

      return $data;

   }

}
?>