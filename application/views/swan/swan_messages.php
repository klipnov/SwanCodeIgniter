<div id="content">

	<h3>Log Messages</h3>
	<div id='message_box' class='grid_12'>
	<!--<?php $announced_id = 0; ?>-->
	<?php foreach($announced_message as $item): ?>
	<?php $announced_id = $item->id; ?>
	<?php endforeach; ?>
	
	<?php foreach($messages as $item): ?>
	<?php echo "<b>" . $item->username . "</b>" . ": "; ?>
	<font class='medium'><?php echo $item->message . " "; ?></font>
	<font class='small'><?php echo "on " . $item->date . " "; ?></font>
	

	
	<?php
	
	if($announced_id == $item->id)
	{
		 echo "<font class='mediumAlert'>Announced!</font>";
		 
	}
	else
	{
	
	 echo "<a href=". site_url('messages/announce') . '/' . $item->id . " class='small'>Announce</a>";
	}
	
	?>
	

	<br/>
	<?php endforeach; ?>
	<br/>

	</div>
	<a href="<?php echo site_url('messages/remove_announce'); ?>" class='small'> Cancel Announcements</a>
	<br/><br/>
	
	<div class='grid_12'>
	<?php $this->load->helper('form'); ?>
	<?php echo form_open('messages/send'); ?>
	
	<?php echo form_hidden('username',$username); ?>
	
	Message: <input name='message' type='text' size='70'>
	
	<input type='submit' value='Send'>
	
	<?php echo form_close(); ?>
	</div>
	
	<br>
	<h3>User Messages</h3>
	<div id='message_box_user' class='grid_12'>

	<?php foreach($user_messages as $item): ?>
	<?php echo "<b>" . $item->username . "</b>" . ": "; ?>
	<font class='medium'><?php echo $item->message . " "; ?></font>
	<font class='small'><?php echo "on " . $item->date . " "; ?></font>
	
	<br/>
	<?php endforeach; ?>
	</div>
	<br/>
		
	<div class='grid_12'>
	<?php $this->load->helper('form'); ?>
	<?php echo form_open('messages/send_to_user'); ?>
	
	<?php echo form_hidden('username',$username); ?>
	
	Message
	<select name='username'>
	<?php foreach($usernames as $item): ?>
	<option value="<?php echo $item->username; ?>">
	<?php echo $item->username; ?>
	</option>
	<?php endforeach; ?>
	</select>
	<input name='message' type='text' size='60'>
	
	<input type='submit' value='Send'>
	
	<?php echo form_close(); ?>
	</div>
	<br/>

	
</div>
