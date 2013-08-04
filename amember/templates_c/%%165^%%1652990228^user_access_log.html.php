<?php /* Smarty version 2.6.2, created on 2010-11-06 22:05:23
         compiled from admin/user_access_log.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/user_access_log.html', 17, false),array('function', 'span', 'admin/user_access_log.html', 27, false),array('modifier', 'date_format', 'admin/user_access_log.html', 18, false),array('modifier', 'escape', 'admin/user_access_log.html', 20, false),)), $this); ?>
<?php $this->assign('title', 'User Access Log'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/user_nb.inc.html", 'smarty_include_vars' => array('selected' => 'access_log')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>

<h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<table class=hedit width=70%>
<tr>
    <th>Time</th>
    <th>Member</th>
    <th>URL</th>
    <th>Remote IP</th>
    <th>HTTP Referrer</th>
</tr>
<?php if (count($_from = (array)$this->_tpl_vars['list'])):
    foreach ($_from as $this->_tpl_vars['p']):
?>
<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['config']['time_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['config']['time_format'])); ?>
 </td>
    <td> <?php echo $this->_tpl_vars['p']['login']; ?>
 </td>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['remote_addr'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['referrer'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
</tr>
<?php endforeach; unset($_from); endif; ?>
</table>

<?php echo smarty_function_span(array('count' => $this->_tpl_vars['count']), $this);?>


<br /><br />
<table width=70% bgcolor=#F0F0F0><tr><td>
<b><div style='font-weight: bold;'>ACCESS LOG NOTES:</b><br />
aMember logs each access, including users accessing protected pages.
This helps you to detect and control Sales Agreement violations, such
as access from different IP networks using the same password, which
may be an indication that someone is sharing their password with
someone who isn't supposed to have access.<br /><br />
<font color=red>Please remember that aMember cannot log access to pages protected
with .htpasswd.
With new_rewrite protection it only logs first access, so account 
sharing protection is working, but you cannot see which pages user accessed.</font>

</td><tr></table>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>