<?php /* Smarty version 2.6.2, created on 2011-02-26 02:23:17
         compiled from admin/access_log.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin/access_log.html', 17, false),array('function', 'html_options', 'admin/access_log.html', 33, false),array('function', 'span', 'admin/access_log.html', 44, false),array('modifier', 'date_format', 'admin/access_log.html', 18, false),array('modifier', 'escape', 'admin/access_log.html', 20, false),)), $this); ?>
<?php $this->assign('title', 'Access Log'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>
<br /><h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<table class=hedit width=70%>
<tr>
    <th>Time</th>
    <th>Member</th>
    <th>URL</th>
	<?php if (! $this->_tpl_vars['config']['demo']): ?>
    <th>Remote IP</th>
	<?php endif; ?>
    <th>HTTP Referrer</th>
</tr>
<?php if (count($_from = (array)$this->_tpl_vars['list'])):
    foreach ($_from as $this->_tpl_vars['p']):
?>
<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['config']['time_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['config']['time_format'])); ?>
 </td>
    <td> <a href="users.php?action=edit&member_id=<?php echo $this->_tpl_vars['p']['member_id']; ?>
"><?php echo $this->_tpl_vars['p']['login']; ?>
</a> </td>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
	<?php if (! $this->_tpl_vars['config']['demo']): ?>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['remote_addr'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
	<?php endif; ?>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['referrer'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
</tr>
<?php endforeach; unset($_from); endif; ?>
</table>

<br />
<form action="access_log.php">
  <select name=order1 size=1 onchange="this.form.submit()">
  <option value="">** Order by ** 
  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['order_options'],'selected' => $_REQUEST['order1']), $this);?>

  </select>

  <select name=order2 size=1 onchange="this.form.submit()">
  <option value="">** Order by ** 
  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['order_options'],'selected' => $_REQUEST['order2']), $this);?>

  </select>
</form>

<a href="access_log.php?order1=<?php echo ((is_array($_tmp=$_REQUEST['order1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&order2=<?php echo ((is_array($_tmp=$_REQUEST['order2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&get_csv=1">Download CSV file</a>

<?php echo smarty_function_span(array('count' => $this->_tpl_vars['count']), $this);?>


<br /><br />
<table width=70% bgcolor=#F0F0F0><tr><td>
<b>ACCESS_LOG NOTES:</b><br />
aMember logs each access, including users accessing protected pages.
This helps you to detect and control Sales Agreement violations, such
as access from different IP networks using the same password, which
may be an indication that someone is sharing their password with
someone who isn't supposed to have access.<br /><br />
<font color="red">Please remember that aMember cannot log access to pages protected
with .htpasswd.
With new_rewrite protection it only logs first access, so account 
sharing protection is working, but you cannot see which pages user accessed.
</font>

</td><tr></table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>