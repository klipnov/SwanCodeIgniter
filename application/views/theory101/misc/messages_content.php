<div id='content' class='grid_12'>
	<h3>User Messages</h3>
	<div id='message_box_user' class='grid_12'>

	<?php foreach($messages as $item): ?>
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
