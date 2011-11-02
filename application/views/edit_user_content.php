<div id="content">

<h3> Edit User Record </h3>
<br>

<?php $this->load->helper('form'); ?>

<?php echo form_open('users/update_user'); ?>

	
	
	<table>
	<?php foreach ($user as $item): ?>
	
	<tr>
		<td><?php echo form_label('id:','id'); ?></td>
		<td>
			<?php echo form_hidden('id',"$item->id"); ?>
			<?php echo $item->id; ?>
		</td>
	</tr>

	<tr>
		<td><?php echo form_label('Username:','username'); ?></td>
		<td><?php echo form_input('username',"$item->username"); ?></td>
	</tr>

	<tr>
		<td><?php echo form_label('Password:','password'); ?></td>
		<td><?php echo form_input('password',"$item->password"); ?></td>
	</tr>

	<tr>
		<td><?php echo form_label('E-mail:','email'); ?></td>
		<td><?php echo form_input('email',"$item->email"); ?></td>
	</tr>

	</table>

<?php echo form_submit('submit', 'Submit'); ?>
<?php endforeach; ?>

<?php echo form_close(); ?>

</div>
