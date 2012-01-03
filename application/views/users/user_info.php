<!-- User_info View -->
<div class="clear"></div>
<div id="videoContent" class="grid_12">
	
	<?php foreach($userinfo as $item): ?>
	<br/>

	<h3>Username : <?php echo $item->username; ?></h3>
	<h3>E-Mail : <?php echo $item->email; ?></h3>
	<h3>Overall Progress :<?php echo $overall; ?> %</h3>
	<br/>
	<?php endforeach; ?>

	<table width='600' class='swanTable'>
	<tr>
		<th><b>Date</b></th>
		<th><b>Chapter</b></th>
		<th><b>Marks</b></th>
		<th><b>Percentage</b></th>
	</tr>
	
	<?php foreach($history as $item): ?>
	<tr>
	
	<td><?php echo $item->date; ?></td>
	<td><?php echo $item->quiz_chapter; ?></td>
	<td><?php echo $item->marks; ?></td>
	<td><?php echo $item->percentage; ?></td>
	
	</tr>
	<?php endforeach; ?>
	
	</table>
	<br/>
</div>
