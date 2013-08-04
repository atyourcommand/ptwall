<?php /* Smarty version 2.6.2, created on 2010-08-29 20:33:15
         compiled from admin/email.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/email.html', 8, false),array('modifier', 'default', 'admin/email.html', 20, false),array('function', 'html_options', 'admin/email.html', 14, false),)), $this); ?>
<?php $this->assign('title', "Email To Users: Type"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/email_nb.inc.html", 'smarty_include_vars' => array('selected' => 'email')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>

<br /><h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<form method=post name=mail enctype="multipart/form-data" action="<?php echo ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<table class=vedit>
<tr>
    <th><b>Select a category of<br /> users to send e-mail</b></th>
    <td>
    <select name='email_type[]' size=5 multiple>
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['email_types'],'selected' => $this->_tpl_vars['vars']['email_type']), $this);?>

    </select>    
    </td>
</tr>
<tr>
    <th><b>Choose e-mail Subject</b></th>
    <td><input type=text name=subj value="<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['vars']['subj'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Your membership') : smarty_modifier_default($_tmp, 'Your membership')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size=32></td>
</tr>
<tr>
    <th><b>Choose e-mail Format</b></th>
    <td>
    <input style='border: none;' type=radio name=is_html value=0 <?php if (! $this->_tpl_vars['vars']['is_html']): ?>checked<?php endif; ?>>
    Plain Text (recommended)  <br />
    <input style='border: none;' type=radio name=is_html value=1 <?php if ($this->_tpl_vars['vars']['is_html']): ?>checked<?php endif; ?>>
    HTML (your message text must be valid HTML)
    </td>
</tr>
<tr>
    <th><b>Add e-mail attachment(s)</B><br /> (<?php print ini_get('upload_max_filesize') ?> max)</th>
    <td> 
         <?php if (count($_from = (array)$this->_tpl_vars['uploaded_files'])):
    foreach ($_from as $this->_tpl_vars['f']):
?>
         <?php echo $this->_tpl_vars['f']; ?>
<br />
         <?php endforeach; unset($_from); endif; ?>
    
         <input type=file name='file[0]'><br />
         <input type=file name='file[1]'><br />
         <input type=submit name=upload value="Upload files" style='font-size: 7pt;'>
    </td>
</tr>
</table>
<br />
<textarea name=text cols=70 rows=20><?php echo ((is_array($_tmp=$this->_tpl_vars['vars']['text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
<br />
<input type=submit value="&nbsp;&nbsp;&nbsp;&nbsp;Preview&nbsp;&nbsp;&nbsp;&nbsp;">
<input type=hidden name="files" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['files'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type=hidden name="action" value="preview">
<br />

</form>

<!--<?php echo ' --><script language=JavaScript>
    function ins_tag(tag){
        elem = document.forms[\'mail\'].elements[\'text\'];
        elem.value = elem.value + \' \' + tag + \' \'; 
        elem.focus();
    }
</script><!--{literal} '; ?>
-->
<!--<?php echo ' --><style>
    .tag {
        background-color: #FCFCFC;
    }
</style><!--{literal} '; ?>
-->

<table bgcolor=#F0F0F0><tr><td>
You may use following tags to personalize email:
<ul><pre style='font-size: 9pt;'><?php echo '
    <span class=tag>{$user.name}</span>    - first and last name <a href="javascript:ins_tag(\'{$user.name}\')">(insert)</a>
    <span class=tag>{$user.email}</span>   - email <a href="javascript:ins_tag(\'{$user.email}\')">(insert)</a>
    <span class=tag>{$user.name_f}</span>  - first name <a href="javascript:ins_tag(\'{$user.name_f}\')">(insert)</a>
    <span class=tag>{$user.name_l}</span>  - last name <a href="javascript:ins_tag(\'{$user.name_l}\')">(insert)</a>
    <span class=tag>{$user.login}</span>   - login <a href="javascript:ins_tag(\'{$user.login}\')">(insert)</a>
    <span class=tag>{$user.pass}</span>    - password <a href="javascript:ins_tag(\'{$user.pass}\')">(insert)</a>
'; ?>
</pre></ul>
</td></tr></table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
