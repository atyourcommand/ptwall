<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<title><?php echo $title; ?></title>

<style type='text/css'>
<?php $this->file(BASEPATH.'scaffolding/views/stylesheet.css'); ?>
</style>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv='expires' content='-1' />
<meta http-equiv= 'pragma' content='no-cache' />

</head>
<body>

<div id="header">

	<table border="0" cellpadding="0" cellspacing="1" style="width:200"> 
		 <tr> 
				<th><a href="<?php echo base_url()?>index.php">Home</a></th> 
				<th><a href="<?php echo site_url("config/manage"); ?>">Config</a></th> 
				<th><a href="<?php echo site_url("users/manage"); ?>">Users</a></th>
				<th><a href="<?php echo site_url("certs/manage");?>">Certificates</a></th>
				<th><a href="<?php echo site_url("insurance/manage");?>">Insurance</a></th>
				<th><a href="<?php echo site_url("training/manage");?>">Training Orgs</a></th>
				<th><a href="<?php echo site_url("country/manage");?>">Countries</a></th>
				<th><a href="<?php echo site_url("state/manage");?>">States</a></th>
				<th><a href="<?php echo site_url("county/manage");?>">Counties</a></th>
			</tr> 
		 <tr>
	</table>
	
<div id="header_left">
<h3>Scaffolding:&nbsp; <?php echo $title; ?></h3>
</div>
<div id="header_right">
<?php echo anchor(array($base_uri, 'view'), $scaff_view_records); ?> &nbsp;&nbsp;|&nbsp;&nbsp;
<?php echo anchor(array($base_uri, 'add'),  $scaff_create_record); ?>
</div>
</div>

<br clear="all">
<div id="outer">
