<div id="content">

	<div id='message_box' class='grid_12'>
	<?php foreach($messages as $item): ?>
	<?php echo "<b>" . $item->username . "</b>" . ": "; ?>
	<font class='medium'><?php echo $item->message . " "; ?></font>
	<font class='small'><?php echo "on " . $item->date . " "; ?></font>
	<a href="<?php echo site_url('messages/announce') . '/' . $item->id; ?>" class='small'>Announce</a>
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
	
	<input type='submit' value='Submit'>
	
	<?php echo form_close(); ?>
	</div>
	
	<br>
	
</div>
