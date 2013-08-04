1. Copy folder subusers to amember/plugins/protect

2. Have to enable plugin at
aMember CP -> Setup/Configuration ->Plugins

3. wrap code with payment history and renew in ammeber/templates/member.html with
{if !$smarty.session._amember_user.data.parent_id}
{/if}

Please have to do the following if you enable 'E-Mail Payment Receipt to user' at
aMember CP -> Setup/Configuration -> Email

Edit file amember/common.inc.php
find function mail_payment_user
and after line if ($p['data'][0]['ORIG_ID'] > 0) return; // don't sent for child payments
insert the following line:
if ($p['receipt_id'] == 'SUBUSER') return; //don't sent for subuser's payments