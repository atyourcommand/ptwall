<!--data for auto tweeting-->
<?php foreach($most_recent_users as $user):
			   $profile_image = get_user_thumb($user->user_id);
          ?>

<?php if($user->approved==1) { ?>
<?php if($user->city_id==0) { ?>
<?php echo $this->County_model->get_name_by_id($user->county_id)."" ?>
<? } else {	?>
<?php echo $this->City_model->get_name_by_id($user->city_id)."" ?>
<? } ?>

&nbsp;Personal Training&nbsp;&mdash;&nbsp;<?php echo $user->first_name.'&nbsp;'.$user->last_name ?>&nbsp;<?php echo base_url(); ?>index.php/personal-trainer/<?php echo str_replace(" ","_",trim($user->first_name)."_".trim($user->last_name)); ?> ,
<? } ?>

<?php endforeach;?>
<!--<?php echo get_user_thumb($user->user_id); ?> -->
<!--<?php echo $this->State_model->get_name_by_id($user->state_id)."" ?>-->