<?php /* Smarty version 2.6.2, created on 2010-08-24 08:08:10
         compiled from newsletter_archive.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'newsletter_archive.html', 13, false),array('function', 'span', 'newsletter_archive.html', 37, false),array('modifier', 'amember_date_format', 'newsletter_archive.html', 14, false),)), $this); ?>
<?php $this->assign('title', "#_TPL_NEWSLETTER_ARCHIVE#"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="backend-wrapper">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "member_menu.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table class="hedit" width="100%">
<tr>
    <th>#_TPL_NEWSLETTER_DATE#</th>
    <th>#_TPL_NEWSLETTER_SUBJECT#</th>
    <th>#_TPL_NEWSLETTER_MESSAGE#</th>
    <th>#_TPL_NEWSLETTER_THREADS#</th>
</tr>
<?php if (count($_from = (array)$this->_tpl_vars['al'])):
    foreach ($_from as $this->_tpl_vars['a']):
?>
<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['a']['add_date'])) ? $this->_run_mod_handler('amember_date_format', true, $_tmp) : smarty_modifier_amember_date_format($_tmp)); ?>
</td>
    <td><b><?php echo $this->_tpl_vars['a']['subject']; ?>
</b></td>
    <td><?php if (! $this->_tpl_vars['a']['is_html']): ?><pre><?php endif;  
    $message = $this->_tpl_vars['a']['message'];
    $message = strip_tags($message);
    $archive_id = $this->_tpl_vars['a']['archive_id'];
    if (strlen($message) > 255) {
        print (substr($message, 0, 255) . " <a href=newsletter.php?a=archive&archive_id=".$archive_id.">...</a>");
    } else {
        print ($message);
    }
      if (! $this->_tpl_vars['a']['is_html']): ?></pre><?php endif; ?></td>
    <td>
    <?php if (isset($this->_foreach['titles'])) unset($this->_foreach['titles']);
$this->_foreach['titles']['name'] = 'titles';
$this->_foreach['titles']['total'] = count($_from = (array)$this->_tpl_vars['a']['threads']);
$this->_foreach['titles']['show'] = $this->_foreach['titles']['total'] > 0;
if ($this->_foreach['titles']['show']):
$this->_foreach['titles']['iteration'] = 0;
    foreach ($_from as $this->_tpl_vars['thread_id'] => $this->_tpl_vars['thread_title']):
        $this->_foreach['titles']['iteration']++;
        $this->_foreach['titles']['first'] = ($this->_foreach['titles']['iteration'] == 1);
        $this->_foreach['titles']['last']  = ($this->_foreach['titles']['iteration'] == $this->_foreach['titles']['total']);
?>
    <?php if ($this->_tpl_vars['thread_id']): ?>
        <a href="newsletter.php?a=archive&thread_id=<?php echo $this->_tpl_vars['thread_id']; ?>
"><?php echo $this->_tpl_vars['thread_title']; ?>
</a><?php if (! $this->_foreach['titles']['last']): ?>, <?php endif; ?>
    <?php endif; ?>
    <?php endforeach; unset($_from); endif; ?>
    </td>
</tr>
<?php endforeach; unset($_from); endif; ?>
</table>
<br />
<?php echo smarty_function_span(array(), $this);?>

<br />
<br />
<center>
<input type=button value="&nbsp;&nbsp;&nbsp;&nbsp;#_TPL_NEWSLETTER_BACK#&nbsp;&nbsp;&nbsp;&nbsp;" onclick="history.back(-1)">
</center>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
