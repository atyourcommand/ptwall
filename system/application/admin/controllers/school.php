<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MODULE NAME   : School.php
 *
 * DESCRIPTION   : School module controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2009-11-22 07:52 AM   - Pradesh Chanderpaul     - Created
 *
 * @package             School
 * @subpackage          school component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

class School extends Controller {

   /**
   * Contructor function
   *
   * Load the instance of CI by invoking the parent constructor
   *
   * @access      public
   * @return      none
   */
   function School() {
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
   // Description: Extracts a list of all school data records and displays it.
   //
   // //////////////////////////////////////////////////////////////////////////
   function browse() {

      // ///////////////////////////////////////////////////////////////////////
      // Request the list from database. This is done by creating an instance of
      // ...the school model and sending it a 'retrievelist' request.
      // ///////////////////////////////////////////////////////////////////////

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you are not using pagination, then set appropriate values for
      // NOTE: ...the $start and $limit_per_page values, or remove then from the
      // NOTE: ...function call.
      // ///////////////////////////////////////////////////////////////////////
      $start = $this->uri->segment(3,0);
      $limit_per_page = 10;

      $this->load->model('schoolmodel');                  // Instantiate the model
      $the_results['school_list'] = $this->schoolmodel->findAll($start, $limit_per_page);  // Send the retrievelist msg
      // $the_results['rowcount'] = count($the_results['school_list']);

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set up the paging links. Just remove this if you don't need it,
      // NOTE: ...but you must remember to change the views too.
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('pagination');
      $this->load->helper('url');

      $config['base_url']     = site_url('school/showall/');   // or just /school/
      $config['total_rows']   = $this->schoolmodel->table_record_count;
      $config['per_page']     = $limit_per_page;

      $this->pagination->initialize($config);

      $the_results['page_links'] = $this->pagination->create_links();


      // ///////////////////////////////////////////////////////////////////////
      // Print the results on the web page tmeplate. This is done by creating an
      // ...instance of the layout library and sending it a 'render_page' request
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('layout');

      $this->layout->render_page('/school/schoolgrid', $the_results);
      // NOTE: If you don't want to use the layout library, use the line below.
      // $this->load->view('/school/schoolgrid', $the_results);

   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: add()
   //
   // Description: Prompts user for input and adds a new school entry
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
         $this->load->model('schoolmodel');

         /*
		// XXS Filtering enforced for user input
		$data['college_id']		= $this->input->post('college_id', TRUE);
		$data['name']		= $this->input->post('name', TRUE);
		$data['country_id']		= $this->input->post('country_id', TRUE);
		$data['state_id']		= $this->input->post('state_id', TRUE);

         */
         $data = $this->_get_form_values();

         $this->schoolmodel->add($data);

         // $this->load->helper('url');
         redirect('/school/', 'location');

      }
      else {
         // We have to show the user the input form
         /*
		$data['college_id']		= '';
		$data['name']		= '';
		$data['country_id']		= '';
		$data['state_id']		= '';

         */
         $data = $this->_clear_form();
         $data['action']       = 'add';



         // Call upon the layout library to draw the input screen
         $this->load->library('layout');
         $this->layout->render_page('/school/schooldetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('/school/schooldetails', $data);


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
         $this->load->model('schoolmodel');

         // $data['action']          = 'modify';
         /*
		// XXS Filtering enforced for user input
		$data['college_id']		= $this->input->post('college_id', TRUE);
		$data['name']		= $this->input->post('name', TRUE);
		$data['country_id']		= $this->input->post('country_id', TRUE);
		$data['state_id']		= $this->input->post('state_id', TRUE);

         */
         $data = $this->_get_form_values();

         $this->schoolmodel->modify($data['college_id'], $data);

         redirect('/school/', 'location');

      }
      else {
         // We have to show the user the input form

         $idField = $this->uri->segment(3);

         $this->load->model('schoolmodel');
         $data = $this->schoolmodel->retrieve_by_pkey($idField);
         $data['action'] = 'modify';



         $this->load->library('layout');
         $this->layout->render_page('/school/schooldetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('/school/schooldetails', $data);


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

      $this->load->model('schoolmodel');
      $the_results = $this->schoolmodel->delete_by_pkey($idField);

      $this->load->helper('url');
      redirect('/school/', 'location');

   }

   function _clear_form() {

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set default values for the form here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		$data['college_id']		= '';
		$data['name']		= '';
		$data['country_id']		= '';
		$data['state_id']		= '';

      return $data;

   }

   function _get_form_values() {
      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Perform customisation on the retrieved form values here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		// XXS Filtering enforced for user input
		$data['college_id']		= $this->input->post('college_id', TRUE);
		$data['name']		= $this->input->post('name', TRUE);
		$data['country_id']		= $this->input->post('country_id', TRUE);
		$data['state_id']		= $this->input->post('state_id', TRUE);

      return $data;

   }

}
?>