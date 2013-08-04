<?php /* Smarty version 2.6.2, created on 2010-09-13 00:54:09
         compiled from admin/newsletter_guest.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/newsletter_guest.html', 5, false),array('function', 'html_options', 'admin/newsletter_guest.html', 21, false),array('function', 'span', 'admin/newsletter_guest.html', 39, false),array('function', 'cycle', 'admin/newsletter_guest.html', 50, false),)), $this); ?>
<?php $this->assign('title', 'Newsletter Guests'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/email_nb.inc.html", 'smarty_include_vars' => array('selected' => 'guests')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>
<br /><h3><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h3>

<p>This page allows to search and manage site visitors who subscribed
to newsletters without creating an account in aMember. Only email and 
name are stored for these visitors.</p>


<form action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<table class=hedit border=1 bordercolor=#909090>
<tr><th colspan=4 style='text-align: left'>
<input style='border: none;' type=radio name="type" value="thread" <?php if ($_REQUEST['type'] != 'string'): ?>checked<?php endif; ?>> 
<b>Search by newsletter thread</b></th></tr>
<tr>
    <td>Threads</td>
    <td> 
    <select name='threads[]' size=5 multiple>
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['threads_list'],'selected' => $_REQUEST['threads']), $this);?>

    </select>    
    </td>
</tr>
<tr><th colspan=2 style='text-align: left'>
<input style='border: none;' type=radio name="type" value="string" <?php if ($_REQUEST['type'] == 'string'): ?>checked<?php endif; ?>> 
<b>Search by Name and Email</th></tr>
<tr>
    <td>Search</td>
    <td> 
        <input type=text onclick="return sw1(this.form, 'string')" onfocus="return sw1(this.form, 'string')" name=q value="<?php echo ((is_array($_tmp=$_REQUEST['q'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=20 class=small>
    </td>
</tr>
</table>
<br />
<input type=submit value=Display>
</form>

<?php echo smarty_function_span(array(), $this);?>

<br /><br />

<table width=80% class=hedit border=1 bordercolor=#909090>
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Subscriptions</th>
    <th width=5%><font color=606060>Actions</font></th>
</tr>
<?php if (count($_from = (array)$this->_tpl_vars['gl'])):
    foreach ($_from as $this->_tpl_vars['g']):
?>
<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['g']['guest_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
    <td> <a href="mailto:<?php echo $this->_tpl_vars['g']['guest_email']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['g']['guest_email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a> </td>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['g']['threads'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
    <td nowrap>
            <a href="newsletter_guests.php?action=edit&guest_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['g']['guest_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">Edit</a>
            <a href="newsletter_guests.php?action=delete&guest_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['g']['guest_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="return confirm('You want to delete a guest <?php echo ((is_array($_tmp=$this->_tpl_vars['g']['guest_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
?')">Delete</a>
     </td>
</tr>
<?php endforeach; unset($_from); endif; ?>
</table>
<br />
<?php echo smarty_function_span(array(), $this);?>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>