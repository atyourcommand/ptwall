<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class MY_Log extends CI_Log {

    var $_levels	= array('ERROR' => '3', 'DEBUG' => '2',  'INFO' => '1', 'ALL' => '4');
    
    function ptwall_log($info)
    {
        log_message('info',$_SERVER['REMOTE_ADDR']."-".$info);

        return TRUE;
    }

}


?>
