<?

require 'lite.inc.php';
amember_lite_connect();


global $_amember_config;
$prefix = $_amember_config['db']['mysql']['prefix'];

if (!$_POST['l']){
    $q = mysql_query("SELECT blob_value 
        FROM {$prefix}config 
        WHERE name='license'");
    list($lic) = mysql_fetch_row($q);        
    print "
    <html><body><form method=post><center>
    <textarea cols=90 rows=7 style='font-size:7pt;' name=l>$lic</textarea>
    <br><input type=submit value=Set>
    </form></body></html>
    ";
} else {
    $_POST['l'] = trim($_POST['l']);
    mysql_query("UPDATE {$prefix}config SET blob_value='{$_POST[l]}'
        WHERE name='license'");
    print mysql_error();
    print "done";
}


?>