<?

require 'lite.inc.php';
amember_lite_connect();


if (!$_POST['u1']){
    global $_amember_config;
    $prefix = $_amember_config['db']['mysql']['prefix'];
    $q = mysql_query("SELECT value
        FROM {$prefix}config 
        WHERE name='root_url'");
    list($u1) = mysql_fetch_row($q);
    $q = mysql_query("SELECT value
        FROM {$prefix}config 
        WHERE name='root_surl'");
    list($u2) = mysql_fetch_row($q);
    print "
    <html><body><form method=post><center>
    <input type=text name=u1 size=50 value='$u1'><br><br>
    <input type=text name=u2 size=50 value='$u2'><br><br>
    <br><input type=submit value=Set>
    </form></body></html>
    ";
} else {
    global $_amember_config;
    $prefix = $_amember_config['db']['mysql']['prefix'];
    $_POST['l'] = trim($_POST['l']);
    mysql_query("UPDATE {$prefix}config SET value='{$_POST[u1]}'
        WHERE name='root_url'");
    print mysql_error();
    mysql_query("UPDATE {$prefix}config SET value='{$_POST[u2]}'
        WHERE name='root_surl'");
    print mysql_error();
    print "done";
}


?>