<div id="content">
<?php $this->load->helper('form'); ?>

	<?php echo form_open('pages/approve_user_lesson'); ?>
	
	<?php echo form_hidden('id',$id); ?>
	Approve:&nbsp;
	<select name='approved'>
	<option value='yes'>YES</option>
	<option value='no'>NO</option>
	</select> &nbsp;&nbsp;&nbsp;
	<?php echo form_submit('submit','Submit'); ?>

	<?php echo form_close(); ?>
	<br/><br/><br/>
	
	<?php foreach($content as $item): ?>

	<?php echo $item->content ?>
	
	<?php endforeach; ?>
	
	<?php echo anchor('/pages','return'); ?>
</div>
