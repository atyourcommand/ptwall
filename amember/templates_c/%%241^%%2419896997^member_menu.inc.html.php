<?php /* Smarty version 2.6.2, created on 2011-02-28 06:46:32
         compiled from member_menu.inc.html */ ?>
<?php 
include_once(dirname(__FILE__).'/../tabs.inc.php');
$tabMenu = new TabMenu($_SESSION['_amember_user']['member_id']);
echo $tabMenu->render();
 ?>
<div class="content corners clearfix">