<div id="content">

<?php $this->load->helper('form'); ?>
	
<h3>Add A New User</h3>
<br>

<?php echo form_open('users/add_user'); ?>

<table id="addForm">
	<tr>
		<td>
			<?php echo form_label('Username','username'); ?>
		</td>
		<td>
			<?php echo form_input('username'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo form_label('Password','password'); ?>
		</td>
		<td>
			<?php echo form_input('password'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo form_label('E-mail','email'); ?>
		</td>
		<td>
			<?php echo form_input('email'); ?>
		</td>
	</tr>
</table>

<?php echo form_submit('submit','Submit'); ?>

<?php echo form_close(); ?>
	
</div>
