<?php /* Smarty version 2.6.2, created on 2010-08-29 20:34:19
         compiled from unsubscribe_link.inc.html */ ?>
<?php if (! $this->_tpl_vars['config']['disable_unsubscribe_link']): ?>
<?php if ($this->_tpl_vars['is_html']): ?>
<br />
<font color=gray>To unsubscribe from our periodic e-mail messages, please click the following <a href="<?php echo $this->_tpl_vars['link']; ?>
">link</a></font>
<br />
<?php else: ?>

-------------------------------------------------------------------
To unsubscribe from our periodic e-mail messages, please click the following link:
  <?php echo $this->_tpl_vars['link']; ?>

  
-------------------------------------------------------------------

<?php endif; ?>
<?php endif; ?>