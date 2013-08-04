<?php
# MySQLCounter by Niall Douglas
# Released into the public domain

# Config - customise these before use
# Base URL - removed before fetching the counter
$baseurl='/~http://personaltrainerwall.com';
# DB name
$dbname='424389_ptwall_2';
# DB username & password
$dbuser='424389_ptwall3';
$dbpassword='Samsung123$%^';
/* WARNING: As this file contains a password, ensure it not publicly
accessible on your website! */

# The host where the MySQL DB lives
$dbhost='mysql50-29.wc1';
# Table within DB to use
$dbtable='counters';

$dbh=mysql_connect("${dbhost}", "${dbuser}", "${dbpassword}")
         or die("Failed to connect to database host");
mysql_select_db("${dbname}") or die("Database not found - site is probably being maintained");
# Database is in form of id,page,count,created
$queryres=mysql_query("SELECT * FROM ${dbtable}") or die("Invalid query: " . mysql_error());
if(mysql_num_fields($queryres)!=4) die("Counters database is in incorrect format");

$querypage=$_SERVER['PHP_SELF'];
$baseurllen=strlen($baseurl);
if(strncmp($querypage, $baseurl, $baseurllen)==0)
    $querypage=substr($querypage, $baseurllen);
if(strncmp($querypage, "//", 2)==0)
    $querypage=substr($querypage, 1);
do
{
    $queryres=mysql_query("SELECT * FROM ${dbtable} WHERE page='${querypage}'")
              or die("Query for ${querypage} failed: " . mysql_error());
    if(!$queryrows=mysql_num_rows($queryres))
    {
        $today=getdate();
        $todaystr=sprintf("%d-%d-%d", $today["year"], $today["mon"], $today["mday"]);
        $query="INSERT INTO ${dbtable} (page,created) VALUES('${querypage}', '${todaystr}')";
        mysql_query($query) or die("Insert failed: " . mysql_error());
    }
} while(!$queryrows);
$pagedata=mysql_fetch_row($queryres) or die("Fetch failed: " . mysql_error());
# Update count atomically
mysql_query("UPDATE ${dbtable} SET count=count+1 WHERE id={$pagedata[0]}") or die("Increment failed: " . mysql_error());

$timevals=sscanf($pagedata[3], "%d-%d-%d");
$daymod=$timevals[2] % 10;
$ths="th";
if($daymod<10 || $daymod>13)
{
    if($daymod==1) $ths="st";
    if($daymod==2) $ths="nd";
    if($daymod==3) $ths="rd";
}
$timestr=strftime("%e${ths} %B %Y", mktime(0,0,0,$timevals[1],$timevals[2],$timevals[0]));
$times=(string) ($pagedata[2]+1);
$times=substr(strrev(chunk_split(strrev($times), 3, ',')),1);
echo "<b>${times}</b> times since the ${timestr}";
mysql_free_result($queryres) or die("Result free failed: " . mysql_error());

?>
