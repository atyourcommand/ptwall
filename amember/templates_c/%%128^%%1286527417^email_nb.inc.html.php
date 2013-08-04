<?php /* Smarty version 2.6.2, created on 2010-08-29 20:33:15
         compiled from admin/email_nb.inc.html */ ?>
<table width=100% cellspacing=1 cellpadding=0 class=notebook><tr>
    <td width=25% class=<?php if ($this->_tpl_vars['selected'] == 'email'): ?>sel<?php else: ?>notsel<?php endif; ?>>
    <a href="email.php">Email Users</a>
    </td>
    <td width=25% class=<?php if ($this->_tpl_vars['selected'] == 'threads'): ?>sel<?php else: ?>notsel<?php endif; ?>>
    <a href="newsletter_threads.php">Newsletter Threads</a>
    </td>
    <td width=25% class=<?php if ($this->_tpl_vars['selected'] == 'archive'): ?>sel<?php else: ?>notsel<?php endif; ?>>
    <a href="newsletter_archive.php">Newsletter Archive</a>
    </td>
    <td width=25% class=<?php if ($this->_tpl_vars['selected'] == 'guests'): ?>sel<?php else: ?>notsel<?php endif; ?>>
    <a href="newsletter_guests.php">Newsletter Guests</a>
    </td>
</tr>
</table>