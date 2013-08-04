<?php
/*************************
  Coppermine Photo Gallery
  ************************
  Version 1.0.0
  Copyright (c) 2006 CGI-Central
  based on code written by Gregory DEMAR
  ********************************************
  Coppermine version: 1.4.9 - last
**********************************************/

if (!defined('IN_COPPERMINE')) die('Not in Coppermine...');

// Switch that allows overriding the bridge manager with hard-coded values
define('USE_BRIDGEMGR', 1);

require_once 'bridge/udb_base.inc.php';

class cpg_udb extends core_udb {

        function cpg_udb()
        {                
              global $BRIDGE,$CONFIG,$AMURL;

              $AMURL = 'http://unreal-www.cgi-central.int/amember2';


              $this->db = array(
                        'name'     => 'unreal_amember2',
                        'host'     => 'localhost',
                        'user'     => 'root',
                        'password' => '',
                        'prefix'   => 'amember_'
                );
                
                // Board table names
                $this->table = array(
                        'users'    => 'members',
                        'products' => 'products',
                        'payments' => 'payments'
                );

                // Derived full table names
                $this->usertable = '`' . $this->db['name'] . '`.' . $this->db['prefix'] . $this->table['users'];
                $this->prodtable = '`' . $this->db['name'] . '`.' . $this->db['prefix'] . $this->table['products'];
                $this->paymtable = '`' . $this->db['name'] . '`.' . $this->db['prefix'] . $this->table['payments'];
                
                // Table field names
                $this->field = array(
                        'username' => 'login', // name of 'username' field in users table
                        'user_id' => 'member_id', // name of 'id' field in users table
                        'password' => 'pass', // name of 'password' field in users table
                        'email' => 'email', // name of 'email' field in users table
                        'regdate' => 'added', // name of 'registered' field in users table
                        'location' => "''", // name of 'location' field in users table
                        'website' => "''" // name of 'website' field in users table                
                );
                
                // Pages to redirect to
                $this->page = array(
                        'register'        => $AMURL.'/signup.php',
                        'editusers'       => $AMURL.'/member.php',
                        'edituserprofile' => $AMURL.'/member.php'
                );
                // Group ids
                $this->admingroups = array(1);
                $this->guestgroup = 3;

                $this->connect();

        }

        function authenticate()
        {
                global $USER_DATA;
                session_start();

                if (isset($_SESSION['_amember_user']['member_id']))
                {
                        $id = addslashes($_SESSION['_amember_user']['member_id']);

                        $sql = "SELECT * FROM {$this->usertable} WHERE
                                member_id = $id";

                        $result=mysql_query($sql);

                        if ($res = mysql_fetch_assoc($result))
                        {

                            $pass = addslashes($_SESSION['_amember_user']['pass']);

                            if ($pass != $res['pass'])
                               return false;


                        $dt=date("Y-m-d");                        
                        $sql = "SELECT * FROM {$this->paymtable} WHERE
                                member_id = $id
                                AND begin_date <= '$dt'
                                AND expire_date >= '$dt'
                                AND completed > 0";
                        $r=mysql_query($sql);
                        while ($res3=mysql_fetch_assoc($r))
                        {
                           settype($res3['prodcut_id'],"integer");

                           $sql = "SELECT * FROM {$this->prodtable} WHERE
                                   product_id='$res3[product_id]'";
                           $r2=mysql_query($sql);
                           if ($res2=mysql_fetch_assoc($r2))
                           {
                              $cp_acc=unserialize($res2['data']);
                              if ($cp_acc['coppermine_access'])
                              {
                                 $ret_val['group_id'][]=$res2['coppermine_access']+100;
                              }
                           }
                        }

                        $ret_val['group_id']=max($ret_val['group_id']);

                        foreach ($ret_val as $gr)

                            $str=unserialize($res['data']);

                            if ($str['is_admin']==1)
                                $ret_val['group_id']=101;

                            $ret_val['id']=$res['member_id'];
                            $ret_val['username']=$res['login'];
                            $ret_val['password']=$res['pass'];

                            $this->load_user_data($ret_val); 
                        }
                } 
                else 
                {
                        $this->load_guest_data();
                }

        $user_group_set = '(' . implode(',', $USER_DATA['groups']) . ')';

        $USER_DATA = array_merge($USER_DATA, $this->get_user_data($USER_DATA['groups'][0], $USER_DATA['groups'], $this->guestgroup));

                if ($this->use_post_based_groups){
                        $USER_DATA['has_admin_access'] = (in_array($USER_DATA['groups'][0] - 100,$this->admingroups)) ? 1 : 0;
                } else {
                        $USER_DATA['has_admin_access'] = ($USER_DATA['groups'][0] == 1) ? 1 : 0;
                }

                $USER_DATA['can_see_all_albums'] = $USER_DATA['has_admin_access'];

                // avoids a template error
                if (!$USER_DATA['user_id']) $USER_DATA['can_create_albums'] = 0;



        define('USER_ID', $USER_DATA['user_id']);
        define('USER_NAME', addslashes($USER_DATA['user_name']));
        define('USER_GROUP', $USER_DATA['group_name']);
        define('USER_GROUP_SET', $user_group_set);
        define('USER_IS_ADMIN', $USER_DATA['has_admin_access']);
        define('USER_CAN_SEND_ECARDS', (int)$USER_DATA['can_send_ecards']);
        define('USER_CAN_RATE_PICTURES', (int)$USER_DATA['can_rate_pictures']);
        define('USER_CAN_POST_COMMENTS', (int)$USER_DATA['can_post_comments']);
        define('USER_CAN_UPLOAD_PICTURES', (int)$USER_DATA['can_upload_pictures']);
        define('USER_CAN_CREATE_ALBUMS', (int)$USER_DATA['can_create_albums']);
        define('USER_UPLOAD_FORM', (int)$USER_DATA['upload_form_config']);
        define('CUSTOMIZE_UPLOAD_FORM', (int)$USER_DATA['custom_user_upload']);
        define('NUM_FILE_BOXES', (int)$USER_DATA['num_file_upload']);
        define('NUM_URI_BOXES', (int)$USER_DATA['num_URI_upload']);

                $this->session_update();
        }

        function session_extraction()
        {
           return false;
        }
        
        function cookie_extraction()
        {
             return false;

        }
        
        // definition of actions required to convert a password from user database form to cookie form
        function udb_hash_db($password)
        {
                global $AMURL;
                return $password; // unused
        }
        
        function login_page()
        {
                global $AMURL;
                $this->redirect($AMURL."/login.php");
        }

        function logout_page()
        {
                global $AMURL;
                $this->redirect($AMURL."/logout.php");
        }
}

// and go !
$cpg_udb = new cpg_udb;