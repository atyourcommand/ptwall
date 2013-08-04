<?php /* Smarty version 2.6.2, created on 2010-11-06 21:47:40
         compiled from admin/admin_log.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/admin_log.html', 8, false),array('modifier', 'date_format', 'admin/admin_log.html', 29, false),array('function', 'html_options', 'admin/admin_log.html', 10, false),array('function', 'cycle', 'admin/admin_log.html', 28, false),array('function', 'span', 'admin/admin_log.html', 46, false),)), $this); ?>
<?php $this->assign('title', 'Admin Actions Log'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>
<br /><h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<form method=get>
<table class=vedit align=center><tr><th>
<input type=text name=q size=30 value="<?php echo ((is_array($_tmp=$_REQUEST['q'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style='font-size: 8pt;'>
<select name='q_where' size=1 style='font-size: 8pt;'>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['q_where_options'],'selected' => $_REQUEST['q_where']), $this);?>

</select>
<input type=submit value="Filter by string" style='font-size: 8pt;'>
</tr></th></table>
</form>
<br/>

<table class=hedit width=70%>
<tr>
    <th>Time</th>
    <th>Admin</th>
	<?php if (! $this->_tpl_vars['config']['demo']): ?>
    <th>IP Address</th>
	<?php endif; ?>
    <th>Action</th>
    <th>Subject (record)</th>
</tr>
<?php if (count($_from = (array)$this->_tpl_vars['list'])):
    foreach ($_from as $this->_tpl_vars['p']):
?>
<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['dattm'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['config']['time_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['config']['time_format'])); ?>
 </td>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['admin_login'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
	<?php if (! $this->_tpl_vars['config']['demo']): ?>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['ip'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
	<?php endif; ?>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['message'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
    <td> 
    <?php if ($this->_tpl_vars['p']['record_link']): ?>
        <a target=_blank href="<?php echo $this->_tpl_vars['p']['record_link']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['p']['tablename'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['record_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a> 
    <?php elseif ($this->_tpl_vars['p']['record_id']): ?>
        <?php echo ((is_array($_tmp=$this->_tpl_vars['p']['tablename'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['p']['record_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 
    <?php endif; ?>
    </td>
</tr>
<?php endforeach; unset($_from); endif; ?>
</table>

<?php echo smarty_function_span(array('count' => $this->_tpl_vars['count']), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>