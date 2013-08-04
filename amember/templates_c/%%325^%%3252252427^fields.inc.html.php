<?php /* Smarty version 2.6.2, created on 2011-02-10 21:09:48
         compiled from fields.inc.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'fields.inc.html', 30, false),array('modifier', 'default', 'fields.inc.html', 43, false),)), $this); ?>
<br /><h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<center>
<?php if ($this->_tpl_vars['error']): ?>
<table><tr><td>
<?php if (count($_from = (array)$this->_tpl_vars['error'])):
    foreach ($_from as $this->_tpl_vars['e']):
?>
<li><font color=red><b><?php echo $this->_tpl_vars['e']; ?>
</b></font>
<?php endforeach; unset($_from); endif; ?>
</td></tr></table>
<?php endif; ?>

<form>
<table class=vedit align=center>

<tr>
  <th>
  Report Type
  </th><td>
  <b><?php echo $this->_tpl_vars['report_title']; ?>
</b> <a href="report.php?"><small>another report type</small></a>
  </td>
</tr>

<tr>
  <th>
  Select from the fields at right<br />
  Hold down <b>Ctrl</b> to select more than one<br />
  Use <b>Shift</b> to select all

  </th><td> <select name='fields[]' size=10 multiple>
  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields'],'selected' => $_REQUEST['fields']), $this);?>

  </select></td>
</tr>

<tr>
  <th>
  <b>Maximum values to display</b><br />
  <small>Using the 'State' field as an example, you would need to enter a<br />
  value of 50 to display report data for all 50 states. If you only<br />
  want to see data for the top 10 states then you would enter a value<br />
  of 10. If there is more data than the number you enter it will be<br />
  summarized and displayed under the heading: "Other Values"<br />
  </th><td> 
  <input type=text name=max_values value="<?php echo ((is_array($_tmp=@$_REQUEST['max'])) ? $this->_run_mod_handler('default', true, $_tmp, 10) : smarty_modifier_default($_tmp, 10)); ?>
"
  size=5 maxlength=5>
  </td>
</tr>

</table>
<br />
<input class=small type=submit value="Proceed >">
<input type=hidden name=build value=1>
<input type=hidden name=report value=<?php echo $_REQUEST['report']; ?>
>
</form>


</center>