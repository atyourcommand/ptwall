<?php

if (!defined('INCLUDED_AMEMBER_CONFIG')) 
    die("Direct access to this location is not allowed");
 
/**
* Plugins functions
*
*     Author: Alex Scott
*      Email: alex@cgi-central.net
*        Web: http://www.cgi-central.net
*    Details: Plugins handling functions
*    FileName $RCSfile$
*    Release: 3.1.9PRO ($Revision: 3669 $)
*
* Please direct bug reports,suggestions or feedback to the cgi-central forums.
* http://www.cgi-central.net/forum/
*                                                                          
* aMember PRO is a commercial software. Any distribution is strictly prohibited.
*                                                                                 
*/

/*
* Instantiated plugins
* @global mixed $___plugins
**/
global $___plugins;
$__plugins = array();

/*
* For plugin hooks setup
* @global mixed $___hooks
**/
global $__hooks;
$__hooks = array();

/**
* Load Plugins
* Include all plugins of type to setup all hooks
*
* @param string $type Plugin Type = db|payment|protect
*
* @global array Plugins List
* @global mixed Script Config
*/
function load_plugins($type){
    global $plugins;
    global $config;

    foreach ((array)$plugins[$type] as $name){
        if (!strlen($name)) continue;
        $file = $config['plugins_dir'][$type]."/$name/$name.inc.php";
        if (!file_exists($file)){
            trigger_error("Plugin file ($file) for plugin ($type/$name) does not exists", E_USER_WARNING);
            continue;
        }
        if ($type == 'protect'){
            if (is_lite()){
                if (!in_array($name, array('htpasswd', 'php_include')))
                    fatal_error("Sorry, but this plugin ($type/$name) cannot be used with aMember Lite");
            }
        }
        if ($type == 'payment'){
            if (is_lite()){
                if (!in_array($name, array('twocheckout', 'twocheckout_r', 'paypal', 'paypal_r', 'free')))
                    fatal_error("Sorry, but this plugin ($type/$name) cannot be used with aMember Lite");
            }
        }
        $open = include($file);
        //@LPCHK@
    }
}

/**
* Setup Plugin Hook
* Setup plugin hook to be called at specified event
*
* @param string $hook Hook Name
* @param string $func_name Function Name to be called
*
* @global array Hooks List
*/
function setup_plugin_hook($hook, $func_name){
    global $__hooks;
    if (is_callable($func_name))
        $__hooks[$hook][] = $func_name;
    else {
        $ptr = ',';
        if (is_array($func_name))
            if (is_object($func_name[0])) {
                $func_name[0] = get_class($func_name[0]);
                $ptr = '->';
            } else
                $ptr = '::';
        $func_name = join($ptr, $func_name);
        fatal_error(sprintf("Hook function is not defined: '%s' for $hook", 
            $func_name));
    }
}

/**
* Instantiate Plugin 
* Get it from cache if it already exists
*
* @param string $type Plugin Type = db|payment|protect
* @param string $name Plugin Name
* @return mixed Plugin Object
*
* @global array Plugins List
* @global mixed Script Config
* @global mixed Plugins Config
* @global mixed Plugins Cache
*/
function &instantiate_plugin($type, $name, $need_to_include=0){
    global $plugins;
    global $config, $plugin_config;
    global $___plugins; //array of existsing plugins, indexed by [type][name]

    if (!strlen($type))
        fatal_error("Plugin type is empty in instantiate_plugin(NULL, '$type')");
    if (!strlen($name))
        fatal_error("Plugin name is empty in instantiate_plugin('$type',NULL)");
    if (!in_array($name, $plugins[$type]))
        fatal_error("Plugin '$name' is not enabled. Died");


    $class = $type . "_" . $name;
    $exists = & $___plugins[$type][$name];
    if (gettype($exists) == 'object')
        return $___plugins[$type][$name];
    
    if ($need_to_include){
        $file = $config['plugins_dir'][$type]."/$name/$name.inc.php";
        if (!file_exists($file))
            fatal_error("Plugin file ($file) for plugin ($type/$name) not exists");
        $open = include($file);
    }

    if (!class_exists($class)) 
        fatal_error("Error in plugin $type/$name: class $class not exists!");
    return $___plugins[$type][$name] = new $class($plugin_config[$type][$name]);
}

/**
* Instantiate Database Plugin 
* Return always first of database plugins.
* Use {@link instaniate_plugin}
*
* @param string $name Database Plugin Name
* @return mixed db Object
*
* @global array Plugins List
*/
function instantiate_db(){
    global $plugins;
    return instantiate_plugin('db', $plugins['db'][0], 1);    
}

///////////////////// PAYMENT PLUGINS hooks ////////////////////////////

function plugin_do_payment($paysys_id, $payment_id, $member_id, $product_id,
            $price, $begin_date, $expire_date, &$vars){
    $pay_plugin = &instantiate_plugin('payment', $paysys_id);

    $ps = get_paysystem($paysys_id);
    global $db;
    if ($ps['fixed_price'] &&  
        ($product=$db->get_product($product_id))
    && ($product['price'] != $price) && ($product['trial1_price'] != $price)){
        return "Sorry, it is impossible to use this payment method for 
        this order. Please select another payment method";
    }
    return $pay_plugin->do_payment($payment_id, $member_id, $product_id,
            $price, $begin_date, $expire_date, $vars);
}

function plugin_validate_thanks($paysys_id, &$vars){
    $pay_plugin = &instantiate_plugin('payment', $paysys_id);
    return $pay_plugin->validate_thanks($vars);
    
}

function plugin_process_thanks($paysys_id, &$vars){
    $pay_plugin = &instantiate_plugin('payment', $paysys_id);
    return $pay_plugin->process_thanks($vars);
}

//////////////////// PROTECT PLUGINS hooks ////////////////////////////////

function plugin_finish_waiting_payment($payment_id, $member_id=0){
    //payment finished ok - call plugins to possible update databases, etc.
    global $__hooks;
    foreach ((array)$__hooks['finish_waiting_payment'] as $func_name){
        call_user_func($func_name, $payment_id, $member_id);
    }
}


function check_for_signup_mail($payment_id, $member_id){
    ### fix me! Signup mail ####
    global $config, $db;
    if (!$payment_id && !$member_id) return;
    global $db;
    if (!$member_id) {
        $payment = $db->get_payment($payment_id);
        $member_id = $payment['member_id'];
    }
    $member = $db->get_user($member_id);
    if ($member['data']['signup_email_sent']) return;
    if (!$config['manually_approve'] || $member['data']['is_approved']){
        $payments = $db->get_user_payments($member_id, 1);
        foreach ($payments as $p) $exists_payments++;
         // send mail only if it FIRST payment for this product
         if ($exists_payments && $config['send_signup_mail']){
             mail_signup_user($member_id);
             $member['data']['signup_email_sent']++;
             $db->update_user($member_id, $member);
         }
    } else {
        if ($member['data']['approval_email_sent']) return;
        mail_approval_wait_user($member_id);
        mail_approval_wait_admin($member_id);
        $member['data']['approval_email_sent']++;
        $db->update_user($member_id, $member);
    }
}

function plugin_update_users($member_id=0){
    //payment finished ok - call plugins to possible update databases, etc.
    global $__hooks;
    if (!is_array($__hooks['update_users'])) return;
    foreach ($__hooks['update_users'] as $func_name){
        call_user_func($func_name, $member_id);
    }
}

function plugin_update_payments($payment_id=0, $member_id=0){
    global $__hooks;
    if (!is_array($__hooks['update_payments'])) return;
    foreach ($__hooks['update_payments'] as $func_name){
        call_user_func($func_name, $payment_id, $member_id);
    }
}


function plugin_check_logged_in(){
    //check if customer already logged-in in the slave application
    global $__hooks;
    foreach ((array)$__hooks['check_logged_in'] as $func_name){
        list ($l, $p) = (array)call_user_func($func_name);
        if ($l) return array($l,$p);
    }
    return array('','');
}

function plugin_after_login($user){
    //called after successful payment
    //mutiple calls per session POSSIBLE!
    global $__hooks;
    foreach ((array)$__hooks['after_login'] as $func_name){
        call_user_func($func_name, $user);
    }
}

function plugin_after_logout($user){
    //called after logout
    global $__hooks;
    foreach ((array)$__hooks['after_logout'] as $func_name){
        call_user_func($func_name, $user);
    }
}

function plugin_get_member_links($user){
    //get array of links to display on the member.php page
    global $__hooks;
    $res = array();
    foreach ((array)$__hooks['get_member_links'] as $func_name){
        $res += (array)call_user_func($func_name, $user);
    }
    return $res;
}
function plugin_get_left_member_links($user){
    //get array of links to display on the member.php page
    global $__hooks;
    $res = array();
    foreach ((array)$__hooks['get_left_member_links'] as $func_name){
        $res += (array)call_user_func($func_name, $user);
    }
    return $res;
}


function loggingObHandler($output)
{
    // Free a piece of memory.
    unset($GLOBALS['_tmp_buf']);
    // Now we have additional 100K of memory, so - continue to work.
    if ($output == '' || trim($output) == '.') return;
    if (strstr($output, 'Fatal error') !== false){
        $GLOBALS['db']->log_error("FATAL CRON ERROR:<br />\n$output");
        return amDie("ERROR: Cron run resulted to fatal script execution error. Please look for details
        in the aMember CP -> Error Log (seek for FATAL CRON ERROR string)", true);
    } else
        $GLOBALS['db']->log_error("DEBUG (CRON OUTPUT):<br />\n$output");
}


function start_special_logging(){
    // Reserve 100K of memory for emergency needs.
    $GLOBALS['_tmp_buf'] = str_repeat('x', 1024 * 100);
    // Handle the output stream and set a handler function.
    ob_start('loggingObHandler');
}

function stop_special_logging(){
    unset($GLOBALS['_tmp_buf']);
    ob_end_clean();
}

// cron hourly
function plugin_hourly(){
    global $__hooks;
    start_special_logging();
    foreach ((array)$__hooks['hourly'] as $func_name){
        call_user_func($func_name);
    }
    stop_special_logging();
}

// cron daily
function plugin_daily(){
    global $__hooks;
    start_special_logging();
    foreach ((array)$__hooks['daily'] as $func_name){
        call_user_func($func_name);
    }
    stop_special_logging();
}

// called if subscription added
function plugin_subscription_added($member_id, $product_id,
    $member=0){
    global $__hooks;
    global $__plugins_in_rebuild;
    if ($__plugins_in_rebuild) return;
    foreach ((array)$__hooks['subscription_added'] as $func_name){
        call_user_func($func_name,$member_id, $product_id, $member);
    }
}

// called if member info updated
function plugin_subscription_updated($member_id, 
    $oldmember=0, $member=0){
    global $__hooks;
    global $__plugins_in_rebuild;
    if ($__plugins_in_rebuild) return;
    foreach ((array)$__hooks['subscription_updated'] as $func_name){
        call_user_func($func_name, $member_id, $oldmember, $member);
    }
}

// called if subscription expired/deleted
function plugin_subscription_deleted($member_id, $product_id,
    $member=0){
    global $__hooks;
    global $__plugins_in_rebuild;
    if ($__plugins_in_rebuild) return;
    foreach ((array)$__hooks['subscription_deleted'] as $func_name){
        call_user_func($func_name, $member_id, $product_id, $member);
    }
}

// called if member removed
function plugin_subscription_removed($member_id, 
    $member=0){
    global $__hooks;
    global $__plugins_in_rebuild;
    if ($__plugins_in_rebuild) return;
    foreach ((array)$__hooks['subscription_removed'] as $func_name){
        call_user_func($func_name, $member_id, $member);
    }
}

// called to check if login is not exists in second databases
// return 1 if not exists
// return 0 if exists
function plugin_subscription_check_uniq_login($login, $email, $pass){
    global $__hooks;
    foreach ((array)$__hooks['subscription_check_uniq_login'] as $func_name){
        $count += !call_user_func($func_name, $login, $email, $pass);
    }
    return !$count;
}

function plugin_subscription_rebuild(){
    global $__hooks;
    global $db;
    global $__plugins_in_rebuild;
    $ul = $db->get_allowed_users(); // should return array[product_id][user_login]=password
    $users = array();
    foreach ($ul as $product_id => $user)
        foreach ($user as $l => $p){
            $users[$l]['pass'] = $p;
            $users[$l]['product_id'][] = $product_id;
        }
    $__plugins_in_rebuild++;
    
    $db->check_subscriptions_for_all();    
    
    $__plugins_in_rebuild--;
    foreach ((array)$__hooks['subscription_rebuild'] as $func_name){
        call_user_func($func_name, $users);
    }
}

function plugin_display_signup_form(){
    global $__hooks;
    foreach ((array)$__hooks['display_signup_form'] as $func_name)
        call_user_func($func_name, $vars);
}

function plugin_validate_signup_form(&$vars, $scope='signup'){
    global $__hooks;
    $res = array();
    foreach ((array)$__hooks['validate_signup_form'] as $func_name){
        $res = array_merge((array)$res, 
            (array)call_user_func_array($func_name, array(&$vars, $scope)));
    }
    return (array)$res;
}

function plugin_validate_member_form(&$vars){
    global $__hooks;
    $res = array();
    foreach ((array)$__hooks['validate_member_form'] as $func_name){
        $res = array_merge((array)$res, 
            (array)call_user_func_array($func_name, array(&$vars, $scope)));
    }
    return (array)$res;
}

function plugin_fill_in_signup_form(&$vars){
    global $__hooks;
    $res = array();
    foreach ((array)$__hooks['fill_in_signup_form'] as $func_name){
        $res = array_merge((array)$res, (array)call_user_func_array($func_name, 
            array(&$vars)));
    }
    return (array)$res;
}

/**
 * @param $menu AdminMenu  
 */
function plugin_init_admin_menu(& $menu){
    global $__hooks;
    foreach ((array)$__hooks['init_admin_menu'] as $func_name)
        call_user_func_array($func_name, array(& $menu));
}

////////////////////////////////////////////////////////////////////////////


function check_cron(){
    global $db;
    $last_runned = $db->load_cron_time(1);
    $h_diff = date('dH') - date('dH', $last_runned);
    $d_diff = date('d') - date('d', $last_runned);
    if ($h_diff || $d_diff) $db->save_cron_time(1);
    if ($h_diff) plugin_hourly();
    if ($d_diff) plugin_daily();
}

global $db;
/*
* Database (db) object
* @global object $db
**/
$db = & instantiate_db();

// set error handler
set_error_handler('_amember_error_handler');

// load language
load_language_defs();
load_language("/language");

/// load plugins
load_plugins('protect');
load_plugins('payment');

global $config;

if ($config['product_paysystem']){
    $ps_list = array('' => '* Choose a paysystem *');
    foreach ($l=get_paysystems_list() as $p)
        $ps_list[$p['paysys_id']] = $p['title'];
    add_product_field('paysys_id', 'Payment System',
        'select', "Choose payment system to be used with this product.<br />
        This option only available if you have enabled option<br />
        \"Assign paysystem to product\" in aMember CP => Setup => Advanced
        ",'',
        array('options' => $ps_list)
    );
};

if (!is_lite()){
// add require another subscription field
$require_options = array();    
$prevent_options = array();
foreach ($db->get_products_list() as $pr){
    $require_options['ACTIVE-'.$pr['product_id']] = 'Require ACTIVE subscription for "' . $pr['title'] . '"';
    $require_options['EXPIRED-'.$pr['product_id']] = 'Require EXPIRED subscription for "' . $pr['title'] . '"';
    $prevent_options['ACTIVE-'.$pr['product_id']] = 'Member has ACTIVE subscription for "' . $pr['title'] . '"';
    $prevent_options['EXPIRED-'.$pr['product_id']] = 'Member has EXPIRED subscription for "' . $pr['title'] . '"';
}

add_product_field('require_other', 'Require another subscription<br />to order this product',
    'multi_select', "When user orders this subscription, aMember will<br />
    check that he has one from the following subscriptions<br />
    hold CTRL key to select several options
    ", '', array(
    'insert_before' => '##13',
    'size' => 4,
    'options' => array(
        ''  => "Don't require anything (default)",
    ) + $require_options
    
    ));
add_product_field('prevent_if_other', 'Disallow subscription to this<br />
    product if the following conditions meet and user has:',
    'multi_select', "When user orders this subscription, aMember will<br />
    check that he has not any from the following subscriptions<br />
    hold CTRL key to select several options
    ", '', array(
    'insert_before' => '##13',
    'size' => 4,
    'options' => array(
        ''  => "Don't prevent anything (default)",
    ) + $prevent_options
    
    ));
}

setup_plugin_hook('daily', array(&$db, 'check_subscriptions_for_all'));

setup_plugin_hook('validate_signup_form', 'member_check_ban');
setup_plugin_hook('validate_signup_form', 'member_check_additional_fields');
setup_plugin_hook('validate_member_form', 'member_check_ban');

setup_plugin_hook('daily', 'mail_not_completed_members');

setup_plugin_hook('daily', 'member_send_autoresponders');
setup_plugin_hook('finish_waiting_payment', 'member_send_zero_autoresponder');

if ($config['send_payment_mail'])
    setup_plugin_hook('finish_waiting_payment', 'mail_payment_user');
if ($config['use_address_info'] == 1)
    setup_plugin_hook('validate_signup_form', 'vsf_address');

function clear_expired_guests(){
    global $db;
    $db->delete_expired_guests();
    $db->delete_expired_threads();
}

setup_plugin_hook('daily', 'clear_expired_guests');

