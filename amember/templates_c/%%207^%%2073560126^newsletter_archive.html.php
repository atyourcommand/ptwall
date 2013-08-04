<?php /* Smarty version 2.6.2, created on 2010-09-08 20:18:32
         compiled from admin/newsletter_archive.html */ ?>
<?php require_once(_SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'span', 'admin/newsletter_archive.html', 8, false),array('function', 'cycle', 'admin/newsletter_archive.html', 20, false),array('modifier', 'date_format', 'admin/newsletter_archive.html', 21, false),array('modifier', 'escape', 'admin/newsletter_archive.html', 22, false),)), $this); ?>
<?php $this->assign('title', 'Newsletter Archive'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/email_nb.inc.html", 'smarty_include_vars' => array('selected' => 'archive')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<center>
<br /><h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<?php if ($this->_tpl_vars['al']): ?>
<?php echo smarty_function_span(array(), $this);?>

<br /><br />

<table width=80% class=hedit border=1 bordercolor=#909090>
<tr>
    <th>Date</th>
    <th>Subject</th>
    <th>Message</th>
    <th>Threads</th>
    <th width=5%><font color=606060>Actions</font></th>
</tr>
<?php if (count($_from = (array)$this->_tpl_vars['al'])):
    foreach ($_from as $this->_tpl_vars['a']):
?>
<tr class=<?php echo smarty_function_cycle(array('values' => "xx,odd"), $this);?>
>
    <td> <?php echo ((is_array($_tmp=$this->_tpl_vars['a']['add_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['config']['time_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['config']['time_format'])); ?>
 </td>
    <td> <a href="newsletter_archive.php?action=edit&archive_id=<?php echo $this->_tpl_vars['a']['archive_id']; ?>
"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['a']['subject'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</b></a> </td>
    <td><?php if (! $this->_tpl_vars['a']['is_html']): ?><pre><?php endif;  
    $message = $this->_tpl_vars['a']['message'];
    $message = strip_tags($message);
    if (strlen($message) > 255) {
        print (substr($message, 0, 255) . " ...");
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
    foreach ($_from as $this->_tpl_vars['thread_title']):
        $this->_foreach['titles']['iteration']++;
        $this->_foreach['titles']['first'] = ($this->_foreach['titles']['iteration'] == 1);
        $this->_foreach['titles']['last']  = ($this->_foreach['titles']['iteration'] == $this->_foreach['titles']['total']);
?>
        <?php if ($this->_tpl_vars['thread_title']): ?>
        <?php echo $this->_tpl_vars['thread_title'];  if (! $this->_foreach['titles']['last']): ?>, <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; unset($_from); endif; ?>
    </td>
    <td nowrap>
            <a href="newsletter_archive.php?action=edit&archive_id=<?php echo $this->_tpl_vars['a']['archive_id']; ?>
">Edit</a>
            <a href="newsletter_archive.php?action=delete&archive_id=<?php echo $this->_tpl_vars['a']['archive_id']; ?>
" onclick="return confirm('You want to delete newsletter <?php echo $this->_tpl_vars['a']['subject']; ?>
?')">Delete</a>
     </td>
</tr>
<?php endforeach; unset($_from); endif; ?>
</table>
<br />
<?php echo smarty_function_span(array(), $this);?>

<?php else: ?>
No messages in archive.
<?php endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
