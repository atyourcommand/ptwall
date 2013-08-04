<?php 
/*
*   Members page. Used to renew subscription.
*
*
*     Author: Alex Scott
*      Email: alex@cgi-central.net
*        Web: http://www.cgi-central.net
*    Details: Member display page
*    FileName $RCSfile$
*    Release: 3.1.8PRO ($Revision: 3749 $)
*
* Please direct bug reports,suggestions or feedback to the cgi-central forums.
* http://www.cgi-central.net/forum/
*                                                                          
* aMember PRO is a commercial software. Any distribution is strictly prohibited.
*                                                                                 
*/

include('./config.inc.php');
$t = & new_smarty();
$t->assign('config', $config);
$_product_id = array('ONLY_LOGIN');

include($config['plugins_dir']['protect'] . '/php_include/check.inc.php');

function check_new_username($login){
    global $config, $db;
    if (!preg_match($p="/^\w{{$config[login_min_length]}}\w*$/", $login)){
        return sprintf(_MEMBER_PROFILE_CORRECTLOG, $config[login_min_length]);
    } else if (!$member_id=$db->check_uniq_login($login)){
        return sprintf(_MEMBER_PROFILE_NAMEEXISTS, $login);
    }
}

function save_profile(&$vars, &$user){
    global $db, $config;
    global $_amember_id, $member_additional_fields;

    $fields_to_change = (array)$config['profile_fields'];

    $maf = array();
    foreach ($member_additional_fields as $f){
        $maf[$f['name']] = $f;
        // Set empty values for all fields that were not submited. 
        // Need to do this to get validation functions working for radio buttons. 
		if(!$vars[$f[name]]) $vars[$f[name]] = '';
    }

    $error = array();
    foreach ($vars as $k=>$v){
        $field = $k;

        if (in_array($k, $fields_to_change))
            $field_type = 1;
        elseif ($maf[$k]['display_profile'] || $maf[$k]['display_affiliate_profile'])
            $field_type = 2;
        else {
            continue;
        }

        ///check username
        if (($k == 'login') && ($v != $_SESSION['_amember_login']) && $err=check_new_username($v)){
            $error[] = sprintf(_MEMBER_PROFILE_ERROR1, $err);
            $user['login'] = $v;
            continue;
        }
        ////
        
        if (($k == 'email') && !check_email($v)){
            $error[] = _MEMBER_PROFILE_ERROR2;
            $user['email'] = $v;
            continue;
        } elseif (($k == 'email') && $config['unique_email']){
            $ul = $db->users_find_by_string($vars['email'], 'email', 1);
            if($ul && ($ul[0][member_id] != $_amember_id)){
                $error[] = _MEMBER_PROFILE_ERROR3;
                continue;
            }
        }


        if (($k == 'name_f') && !strlen($v)){
            $error[] = _MEMBER_PROFILE_ERROR4;
            $user['name_f'] = $v;
            continue;
        }
        if (($k == 'name_l') && !strlen($v)){
            $error[] = _MEMBER_PROFILE_ERROR5;
            $user['name_l'] = $v;
            continue;
        }
        if (($k == 'name_f') && preg_match('/[<>"]/', $v)){
            $error[] = _MEMBER_PROFILE_ERROR4;
            $user['name_f'] = $v;
            continue;
        }
        if (($k == 'name_l') && preg_match('/[<>"]/', $v)){
            $error[] = _MEMBER_PROFILE_ERROR5;
            $user['name_l'] = $v;
            continue;
        }
        /// check password
        if ($k == 'pass0'){
            if (strlen($v) == 0) { //don't change at all
                continue;
            }
            if (strlen($v) < $config['pass_min_length']) {
                $error[] = sprintf(_MEMBER_PROFILE_ERROR6, $config[pass_min_length]);
                continue;
            }
            if (strlen($v) > $config['pass_max_length']) {
                $error[] = sprintf(_MEMBER_PROFILE_ERROR7, $config[pass_max_length]);
                continue;
            }
            if ($vars['pass0'] != $vars['pass1']){
                $error[] = _MEMBER_PROFILE_ERROR8;
                continue;
            }
            $field = 'pass';
        }
        /// set value
        if ($field_type == 1){
            $user[$field] = $v;
        } elseif ($field_type == 2) {
            $ff = $maf[$k];
            foreach ((array)$ff['validate_func'] as $func){
                if (!strlen($func)) continue;
                if ($ff['display_profile'] > 0 && $err = $func($v, $ff['title'], $ff)){
                    $error[] = $err;
                }
            }
            if ($ff['display_profile'] > 0){
                if ($ff['sql'])
                    $user[$k] = $v;
                else
                    $user['data'][$k] = $v;
            }
        } else {
            fatal_error(sprintf(_MEMBER_PROFILE_ERROR9, $k, $field_type));
        }
    }
    if (!$error){
        $db->update_user($_amember_id, $user);
        if (in_array('login', $fields_to_change))
            $_SESSION['_amember_login'] = $user['login'];
        $_SESSION['_amember_pass'] = $user['pass'];
    }
    return $error;
}

function display_saved(){
    global $t, $db;
    global $_amember_id;
    $user = $db->get_user($_amember_id);
    html_redirect("member.php", false,
        _TPL_PROFILE_SAVED_TITLE, _TPL_PROFILE_SAVED_SUCCESS);
}

function display_form($user){
    global $t, $config;
    global $_amember_id, $error;
    $t->assign('state_options', db_getStatesForCountry($user['country'], 1));
    $t->assign('user', $user);

    
    if ($config['use_affiliates'] && $user['is_affiliate'] == '2')
        $additional_fields = get_additional_fields_html($user, 'affiliate_profile');
    else
        $additional_fields = get_additional_fields_html($user, 'profile');
    $t->assign('additional_fields_html', $additional_fields);

    $fields_to_change = array();
    foreach ((array)$config['profile_fields'] as $f)
        $fields_to_change[$f]=1;
    $t->assign('fields_to_change', $fields_to_change);
    $t->assign('error', $error);
    $t->display('profile.html');
}

$vars = get_input_vars();
$_amember_id = $_SESSION['_amember_id'];
$user = $db->get_user($_amember_id);

if ($vars['do_save']){
    $error = save_profile($vars, $user);
    if ($error)
        display_form($user);
    else
        display_saved();
} else {
    display_form($user);
}


?>
