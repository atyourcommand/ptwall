<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cron
 *
 * @author Mr. Upake
 */
class Cron extends Controller {
    //put your code here
	

	
	function __construct()
	 {
		parent::Controller();
		
		$this->load->model('Config_model');
		$this->load->model('User_model');

	}

    function check_cert_expiry() {

       	$query = $this->db->query("SELECT first_name, last_name from users where cert_expiry<=CURDATE()");


        foreach ($query->result() as $row)
	{  
            print_r($row);
        }
        $name = "Test Name";
        $data = array(
              'name'  => $name,
		);
        
        $this->load->view('email/cert_reminder', $data);

    }
	
	function unsubscribe_users() {
		
		$CI =& get_instance();
		$this->db_amem = $CI->load->database('amember', TRUE);	
		
		$products =  $this->Config_model->get_value('TRAINER_PRODUCTS')->value;
		$cron_key =  $this->Config_model->get_value('CRON_KEY')->value;
		
		if($cron_key!=$_GET['cron_key']) show_404('page');
		
		
		$query = $this->db_amem->query("SELECT max(expire_date) a, m.login  FROM payments p, members m where product_id in ($products) and m.member_id = p.member_id group by m.login having a<curdate()");
        foreach ($query->result() as $row)
		{  
			$user_data = $this->User_model->get_user($row->login);
			$users .= $row->login." ".$user_data->first_name." ".$user_data->last_name." ".$user_data->email."\n\r";
			$query2 = $this->db->query("Update users set subscribed=0 where user_id='$user_data->user_id'");
			
        }
		$content = "The subscription of the following users have expired :\n\r\n\r".$users;
		echo $content;
		$this->load->library('email');
		$this->email->from('do-not-reply@personaltrainerwall.com', 'do-not-reply@personaltrainerwall.com');
		$this->email->to('atyourcommand@mac.com,upake.de.silva@gmail.com');
		//$this->email->to('upake.de.silva@gmail.com'); 		
		$this->email->subject('Cron: List of unsubscribed users');
		$this->email->message($content);	
		$this->email->send();
		
	}
	
}
?>
