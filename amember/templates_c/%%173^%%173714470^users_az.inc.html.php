<?php /* Smarty version 2.6.2, created on 2010-08-24 19:18:41
         compiled from admin/users_az.inc.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/users_az.inc.html', 7, false),)), $this); ?>
<?php if ($this->_tpl_vars['az']): ?>
<table class=userslist><tr><td>
&nbsp;&nbsp;
<?php if ($_REQUEST['letter'] == ''): ?>
<span style='background-color: #F0F0F0;'><b>&nbsp;ALL&nbsp;</b></span>
<?php else: ?>
<a href="users.php?status=<?php echo ((is_array($_tmp=$_REQUEST['status'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">ALL</a>&nbsp;
<?php endif; ?>
<?php if (count($_from = (array)$this->_tpl_vars['az'])):
    foreach ($_from as $this->_tpl_vars['l'] => $this->_tpl_vars['ct']):
?>
    <?php if ($this->_tpl_vars['l'] == $_REQUEST['letter'][0]): ?>
    <span style='background-color: #F0F0F0;'><b>&nbsp;<?php echo $this->_tpl_vars['l']; ?>
&nbsp;</b></span>
    <?php else: ?>
    <?php 
    $l = $this->_tpl_vars['l'];
    $url = $_SERVER['REQUEST_URI'];
    $url = preg_replace('/letter=\w/', "letter=$l", $url);
    if (!preg_match('/letter=/', $url))
        if (preg_match('/\?/', $url)) 
            $url .= "&letter=$l";
        else
            $url .= "?letter=$l";
    $url = htmlspecialchars($url);
    print "<a href=\"$url\">{$l}</a>&nbsp;\n";
     ?>
    <?php endif; ?>
<?php endforeach; unset($_from); endif; ?>
<?php if ($_REQUEST['letter'] == ''): ?>
<span style='background-color: #F0F0F0;'><b>&nbsp;ALL&nbsp;</b></span>
<?php else: ?>
<a href="users.php?status=<?php echo ((is_array($_tmp=$_REQUEST['status'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">ALL</a>&nbsp;
<?php endif; ?>
&nbsp;&nbsp;
</td></tr></table>
<br />
<?php endif; ?>