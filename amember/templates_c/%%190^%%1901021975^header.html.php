<?php /* Smarty version 2.6.2, created on 2011-02-28 05:34:23
         compiled from header.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<link rel="stylesheet" type="text/css" 
        href="<?php echo $this->_tpl_vars['config']['root_surl']; ?>
/templates/css/reset.css" />
<link rel="stylesheet" type="text/css" 
        href="<?php echo $this->_tpl_vars['config']['root_surl']; ?>
/templates/css/amember.css" />
<link rel="stylesheet" type="text/css" 
        href="<?php echo $this->_tpl_vars['config']['root_surl']; ?>
/templates/css/site.css" />
<link rel="stylesheet" type="text/css" 
        href="http://www.personaltrainerwall.com/css/style.css" />
</head>
<body class="amember">
<?php if ($this->_tpl_vars['config']['lang']['display_choice']): ?><div style='width: 100%; text-align: right;'> <?php echo display_lang_choice(); ?> </div>
<?php endif; ?>
<!-- start header content -->
<div id="headerContainer">
  <div id="header" class="clearfix" style=""> <a href="http://personaltrainerwall.com" title="Find a Personal Trainer in your city" class="btn-std blue fade format" style="float:right;margin:0;"><span>Take me back to the Directory</span></a> </div>
</div>
<!--end header container-->
<!--login start-->
<div id="loginArea" class="clearfix">
  <h1 id="production"><a href="/" title="Home"> Find a Personal Trainer &mdash; Personal Trainer Directory </a> </h1>
</div>
<!--login end-->
<div id="pageWrapper">
<div id="page" style="min-height:500px;">
<h3 style="text-align:center;"><?php echo $this->_tpl_vars['title']; ?>
</h3>