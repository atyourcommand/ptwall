<?
$this->load->helper('url');
$action_url = site_url() . "/users/$action/";

?>

<h2>Enter users Details</h2>

<form name="usersdetails" id="usersdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='user_id' id='user_id' value='<?= $user_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> user_id:  </b> </td>

            <td>
               <input type='text' name='user_id' id='user_id' value='<?= $user_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> twitter_name:  </b> </td>

            <td>
               <input type='text' name='twitter_name' id='twitter_name' value='<?= $twitter_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> country_id:  </b> </td>

            <td>
               <input type='text' name='country_id' id='country_id' value='<?= $country_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> state_id:  </b> </td>

            <td>
               <input type='text' name='state_id' id='state_id' value='<?= $state_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> county_id:  </b> </td>

            <td>
               <input type='text' name='county_id' id='county_id' value='<?= $county_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> email:  </b> </td>

            <td>
               <input type='text' name='email' id='email' value='<?= $email; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> hide_email:  </b> </td>

            <td>
               <input type='text' name='hide_email' id='hide_email' value='<?= $hide_email; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> profile_image_url:  </b> </td>

            <td>
               <input type='text' name='profile_image_url' id='profile_image_url' value='<?= $profile_image_url; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> first_name:  </b> </td>

            <td>
               <input type='text' name='first_name' id='first_name' value='<?= $first_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> last_name:  </b> </td>

            <td>
               <input type='text' name='last_name' id='last_name' value='<?= $last_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> certificate_id:  </b> </td>

            <td>
               <input type='text' name='certificate_id' id='certificate_id' value='<?= $certificate_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> insurance_org_id:  </b> </td>

            <td>
               <input type='text' name='insurance_org_id' id='insurance_org_id' value='<?= $insurance_org_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> training_org_id:  </b> </td>

            <td>
               <input type='text' name='training_org_id' id='training_org_id' value='<?= $training_org_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> cert_reg_no:  </b> </td>

            <td>
               <input type='text' name='cert_reg_no' id='cert_reg_no' value='<?= $cert_reg_no; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> cert_expiry:  </b> </td>

            <td>
               <input type='text' name='cert_expiry' id='cert_expiry' value='<?= $cert_expiry; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> insurance_reg_no:  </b> </td>

            <td>
               <input type='text' name='insurance_reg_no' id='insurance_reg_no' value='<?= $insurance_reg_no; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> insurance_expiry:  </b> </td>

            <td>
               <input type='text' name='insurance_expiry' id='insurance_expiry' value='<?= $insurance_expiry; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> oauth_access_token:  </b> </td>

            <td>
               <input type='text' name='oauth_access_token' id='oauth_access_token' value='<?= $oauth_access_token; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> oauth_access_token_secret:  </b> </td>

            <td>
               <input type='text' name='oauth_access_token_secret' id='oauth_access_token_secret' value='<?= $oauth_access_token_secret; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> statuses_count:  </b> </td>

            <td>
               <input type='text' name='statuses_count' id='statuses_count' value='<?= $statuses_count; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> followers_count:  </b> </td>

            <td>
               <input type='text' name='followers_count' id='followers_count' value='<?= $followers_count; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> friends_count:  </b> </td>

            <td>
               <input type='text' name='friends_count' id='friends_count' value='<?= $friends_count; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> description:  </b> </td>

            <td>
               <input type='text' name='description' id='description' value='<?= $description; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> url:  </b> </td>

            <td>
               <input type='text' name='url' id='url' value='<?= $url; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> joined:  </b> </td>

            <td>
               <input type='text' name='joined' id='joined' value='<?= $joined; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> sync:  </b> </td>

            <td>
               <input type='text' name='sync' id='sync' value='<?= $sync; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>