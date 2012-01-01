<!-- Quiz_history View -->
<div class="clear"></div>
<div id="videoContent" class="grid_12">

	<table width='600'>
	<tr>
		<th>Date</th>
		<th>Chapter</th>
		<th>Marks</th>
		<th>Percentage</th>
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
</div>
