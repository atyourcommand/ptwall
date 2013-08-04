<?php /* Smarty version 2.6.2, created on 2010-09-11 01:05:39
         compiled from admin/email_templates.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/email_templates.html', 25, false),array('function', 'html_options', 'admin/email_templates.html', 32, false),)), $this); ?>
<html><head>
</head>

<?php $this->assign('title', "Edit E-Mail Template"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<center>

<br /><h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<form method=post action="email_templates.php">
<table><tr><td><!-- align entire form -->

<?php if ($this->_tpl_vars['error']): ?>
<table class="errmsg" width=100%><tr><td>
<?php if (count($_from = (array)$this->_tpl_vars['error'])):
    foreach ($_from as $this->_tpl_vars['e']):
?>
<li><?php echo $this->_tpl_vars['e']; ?>
</li>
<?php endforeach; unset($_from); endif; ?>
</td></tr></table>
<?php endif; ?>

<table class="vedit" width=100%><!-- align top controls / text-edit -->

<tr><th><b>Template</b></th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br />
<small><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</small>
</td></tr>

<tr><th><b>Language</b></th>
<td>
<select size="1" name="l" onchange="formReload(this.form, 1)">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['lang_options'],'selected' => $this->_tpl_vars['l']), $this);?>
</select>

<?php if ($this->_tpl_vars['copy_lang_options']): ?>
&nbsp;&nbsp;&nbsp;&nbsp;
<em>Copy from another language</em>
<select name=copy_lang onchange="formReload(this.form, 1)" style="background-color: ButtonFace">
<option value="" selected>** COPY ** </option>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['copy_lang_options']), $this);?>

</select>
<?php endif; ?>

</td></tr>


<?php if ($_REQUEST['product_id']): ?>
<tr>
    <th><b>Product#</b></th>
    <td><?php echo ((is_array($_tmp=$_REQUEST['product_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

    (<?php $p = $GLOBALS['db']->get_product($_REQUEST['product_id']); print $p['title'] ?>)
    </td>
</tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['day'] != ""): ?>
<tr>
    <th><b>Day when message will be sent</b></th>
    <td><input type=text name=day value="<?php echo ((is_array($_tmp=$this->_tpl_vars['day'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="5" readonly style="background-color: ButtonFace" />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <em>Edit another day message</em>
    <select name="another_day" size="1" onchange="formReload(this.form, 1)" style="background-color: ButtonFace">
    <option value="" selected>** EDIT ** </option>
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['another_day_options']), $this);?>

    </select>
    </td>
</tr>
<?php endif; ?>

<tr>
<th><b>E-Mail Message Type</b></th>
<td><select size=1 name="format" onchange="formReload(this.form, -1)">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['format_options'],'selected' => $this->_tpl_vars['format']), $this);?>

</select>
</td></tr>

<tr><th><b>Subject</b></th>
<td><input type=text name=subject size=60 value="<?php echo ((is_array($_tmp=$this->_tpl_vars['subject'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
</tr>

</table> <!-- end of controls align -->

<b>E-Mail Message</b><br />
<div style="border: solid 1px ButtonShadow">
<textarea name="txt" id="txt" cols="78" rows="25" style="border: none"><?php echo ((is_array($_tmp=$this->_tpl_vars['txt'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
</div>

<?php if ($this->_tpl_vars['format'] == 'multipart'): ?>
<b>Alternative E-Mail Text (in plain-text format}</b><br />
<div style="border: solid 1px ButtonShadow">
<textarea name="plain_txt" cols="78" rows="25" style="border: none"><?php echo ((is_array($_tmp=$this->_tpl_vars['plain_txt'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
</div>
<?php endif; ?>

<b>E-Mail Variables:</b><br />
<select size=5 onclick="insertVariable(this)" class="small" style="background-color: ButtonFace">
<option value=''>** Please choose an option below and it will be inserted into email message **</option>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tags']), $this);?>

</select><br />

<b>Attachments:</b><br />
<div class="smalltext">Upload your file to <em>amember/templates/</em> folder and enter filename</div>
<?php if (count($_from = (array)$this->_tpl_vars['attachments'])):
    foreach ($_from as $this->_tpl_vars['a']):
?>
<input type=text class="small" name='attachments[]' size=60 value="<?php echo ((is_array($_tmp=$this->_tpl_vars['a'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /><br />
<?php endforeach; unset($_from); endif; ?>
<input type=text class="small" name='attachments[]' size=60 value="" /> <br />
<input type=text class="small" name='attachments[]' size=60 value="" /> <br />

</td></tr>
</table>
<br />

<input type=hidden name=a value="<?php echo ((is_array($_tmp=$_REQUEST['a'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type=hidden name=product_id value="<?php echo ((is_array($_tmp=$_REQUEST['product_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type=hidden name=email_template_id value="<?php echo ((is_array($_tmp=$this->_tpl_vars['email_template_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type=hidden name=tpl value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type=hidden name=save value="1" />
<input type=hidden name=reload value="0" />

<input type=submit value="&nbsp;&nbsp;Update&nbsp;&nbsp;" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=button value="&nbsp;&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;&nbsp;" onclick="window.location='<?php echo ((is_array($_tmp=$this->_tpl_vars['back_location'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
'"/>
</form>

<!--<?php echo ' --><script type"text/javascript">
function insertVariable(el){
    if (!el.selectedIndex) return;
    txt = el.form.elements.txt;
    txt.value = txt.value + el.options[ el.selectedIndex ].value;
    el.selectedIndex = -1;
}
function formReload(frm, reload){
    frm.elements.reload.value = reload;
    frm.submit();
}
</script><!--{literal} '; ?>
-->

</center>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>