<?
   $this->load->helper('url');
   $modify_url = site_url('users/modify/');
   $delete_url = site_url('users/delete/');
   $add_url    = site_url('users/add/');

?>


<form action='<?= $add_url; ?>' method='POST' id='frmusers'>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
<tr>
   <th align="left" class="formSecHeader">Browsing users values</th>
   <th align="right">
    <input class="redbutton" value="&nbsp;&nbsp;Add&nbsp;&nbsp;" type="submit" name='add' id='add' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
</table>
</form>

<br />
<table class="tbl" border="0" cellpadding="2" cellspacing="1" width="100%">
<thead>
<tr>
	<th align="right" width="70"> &nbsp; sort by:&nbsp; </th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		User_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Twitter_name
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Country_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		State_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		County_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Email
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Hide_email
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Profile_image_url
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		First_name
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Last_name
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Certificate_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Insurance_org_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Training_org_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Cert_reg_no
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Cert_expiry
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Insurance_reg_no
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Insurance_expiry
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Oauth_access_token
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Oauth_access_token_secret
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Statuses_count
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Followers_count
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Friends_count
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Description
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Url
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Joined
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Sync
	</th>

</tr>
</thead>
<tbody>

      <?
         $i = 0;
         foreach ($users_list as $users) {
            $i++;
            if (($i%2)==0) { $bgColor = "#FFFFFF"; } else { $bgColor = "#C0C0C0"; }
      ?>
      <tr bgcolor="<?= $bgColor; ?>">
         <td align="center" nowrap="nowrap">
            <a href = "<?= $modify_url."/".$users["user_id"]; ?>" >Edit</a>
            &nbsp;&nbsp;&nbsp;
            <a href = "<?= $delete_url."/".$users["user_id"]; ?>" >Delete</a>
         </td>
   <td align="left" nowrap="nowrap"><?= $users['user_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['twitter_name']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['country_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['state_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['county_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['email']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['hide_email']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['profile_image_url']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['first_name']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['last_name']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['certificate_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['insurance_org_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['training_org_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['cert_reg_no']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['cert_expiry']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['insurance_reg_no']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['insurance_expiry']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['oauth_access_token']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['oauth_access_token_secret']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['statuses_count']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['followers_count']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['friends_count']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['description']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['url']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['joined']; ?></td>
   <td align="left" nowrap="nowrap"><?= $users['sync']; ?></td>
</tr>
      <? } ?>
</tbody>
</table>
<br />




