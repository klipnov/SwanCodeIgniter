<div id="content">
	
	<h3>Select a Question to edit</h3><br>
	
	<table width="780" class="swanTable">
	<?php foreach($question as $item): ?>
	<tr>
	<td width="600"><?php echo $item->question; ?></td>
	<td><?php echo anchor('/quiz/edit_quiz','edit'); ?></td>
	<td><?php echo anchor('/quiz/remove_quiz','remove'); ?></td>
	</tr>
	<?php endforeach; ?>
	</table>
</div>
