<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MODULE NAME   : Users.php
 *
 * DESCRIPTION   : Users module controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2009-11-22 03:47 PM   - Pradesh Chanderpaul     - Created
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

class Country extends Controller {

   /**
   * Contructor function
   *
   * Load the instance of CI by invoking the parent constructor
   *
   * @access      public
   * @return      none
   */
   function Country() {
      parent::Controller();
      $this->load->scaffolding('country');
   }




}
?>