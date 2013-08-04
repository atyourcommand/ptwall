<?php /* Smarty version 2.6.2, created on 2010-08-24 16:24:25
         compiled from admin/user_nb.inc.html */ ?>
<?php if ($this->_tpl_vars['member_id']):  else:  $this->assign('member_id', $this->_tpl_vars['u']['member_id']);  endif; ?>
<?php if ($this->_tpl_vars['member_id']):  else:  $this->assign('member_id', $_POST['member_id']);  endif; ?>
<?php if ($this->_tpl_vars['member_id']):  else:  $this->assign('member_id', $_GET['member_id']);  endif; ?>
<?php if (! $this->_tpl_vars['member_id']):  $this->assign('hide_notebook', 1);  endif; ?>
<?php if (! $this->_tpl_vars['hide_notebook']): ?>
<?php if ($this->_tpl_vars['member_id']):  else:  $this->assign('member_id', $this->_tpl_vars['u']['member_id']);  endif; ?>
<?php if ($this->_tpl_vars['member_id']):  else:  $this->assign('member_id', $_POST['member_id']);  endif; ?>
<?php if ($this->_tpl_vars['member_id']):  else:  $this->assign('member_id', $_GET['member_id']);  endif; ?>
<?php if ($this->_tpl_vars['config']['use_affiliates']): ?>
    <?php $this->assign('pc', "20%"); ?>
<?php else: ?>
    <?php $this->assign('pc', "25%"); ?>
<?php endif; ?>

<table width=100% cellspacing=1 cellpadding=0 class=notebook><tr>
    <td width=<?php echo $this->_tpl_vars['pc']; ?>
 class=<?php if ($this->_tpl_vars['selected'] == 'user'): ?>sel<?php else: ?>notsel<?php endif; ?>>
    <a href="users.php?member_id=<?php echo $this->_tpl_vars['member_id']; ?>
&action=edit">User Info</a>
    </td>
    <td width=<?php echo $this->_tpl_vars['pc']; ?>
 class=<?php if ($this->_tpl_vars['selected'] == 'payments'): ?>sel<?php else: ?>notsel<?php endif; ?>>
    <a href="users.php?member_id=<?php echo $this->_tpl_vars['member_id']; ?>
&action=payments">User Payments/Subscriptions</a>
    </td>
    <td width=<?php echo $this->_tpl_vars['pc']; ?>
 class=<?php if ($this->_tpl_vars['selected'] == 'actions'): ?>sel<?php else: ?>notsel<?php endif; ?>>
    <a href="users.php?member_id=<?php echo $this->_tpl_vars['member_id']; ?>
&action=actions">Actions</a>
    </td>
    <td width=<?php echo $this->_tpl_vars['pc']; ?>
 class=<?php if ($this->_tpl_vars['selected'] == 'access_log'): ?>sel<?php else: ?>notsel<?php endif; ?>>
    <a href="users.php?member_id=<?php echo $this->_tpl_vars['member_id']; ?>
&action=access_log">Access Log</a>
    </td>
    <?php if ($this->_tpl_vars['config']['use_affiliates']): ?>
    <td width=<?php echo $this->_tpl_vars['pc']; ?>
 class=<?php if (( $this->_tpl_vars['selected'] == 'aff_clicks' ) || ( $this->_tpl_vars['selected'] == 'aff_sales' )): ?>sel<?php else: ?>notsel<?php endif; ?>>
    <a href="users.php?member_id=<?php echo $this->_tpl_vars['member_id']; ?>
&action=aff_sales">Affiliate Stats</a>
    </td>
    <?php endif; ?>
</tr>
</table>
<?php endif; ?>