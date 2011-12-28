<div id="content">

	<?php foreach($messages as $item): ?>
	<?php echo "<b>" . $item->username . "</b>" . ": "; ?>
	<?php echo $item->message . " "; ?>
	<font class='small'><?php echo "on " . $item->date . " "; ?></font>
	<a href="<?php echo site_url('messages/announce'); ?>" class='small'>Announce</a>
	<br/>
	<?php endforeach; ?>
	<br/>
	<a href="#" class='small'> Cancel Announcements</a>
	<br/><br/>
	<?php $this->load->helper('form'); ?>
	<?php echo form_open('messages/send'); ?>
	
	<?php echo form_hidden('username',$username); ?>
	
	Message: <input name='message' type='text' size='70'>
	
	<input type='submit' value='Submit'>
	
	<?php echo form_close(); ?>
	
	
	<br>
	
</div>
