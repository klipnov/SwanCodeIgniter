<div id="content">

	<table width="780" class="swanTable" >
	
	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Password</th>
		<th>E-mail</th>
		<th>Info</th>
		<th>Edit</th>
		<th>Remove</th>
	</tr>	
	
	<?php foreach($content as $result): ?>
		<tr> 	
			<td><?php echo $result->id; ?></td>
			<td><?php echo $result->username; ?>
			<?php if($result->admin == 'yes')
			  {
			  	echo "*";
			  }
		    ?> 
			</td>
			<td><?php for($i=0; $i<= strlen($result->password); $i++)
					  {
					    echo "*";					  
					  } 
			?></td>
			<td><?php echo $result->email; ?></td>
			<td><?php echo anchor("users/user_info/$result->id",'Info'); ?></td>
			<td><?php echo anchor("users/edit_user/$result->id",'Edit'); ?></td>
			
			<td>
			<?php echo anchor("users/delete_user/$result->id", 'Remove',
			array('onclick'=>"return confirm('Are you sure?');")); ?>
			</td>	
				
		</tr>
	
	<?php endforeach; ?>
	
	</table>	
	<br/>
	<font class='medium'>* after a username is an admin</font>
	<br/>
	<br/>
	<?php echo anchor('users/display_add_form', 'Add a new User') ?>
	
</div>
