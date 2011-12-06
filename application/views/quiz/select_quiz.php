<div id="content">
	
	<h3>Select a Question to edit</h3><br>
	
	<table width="780" class="swanTable">
	<?php foreach($question as $item): ?>
	<tr>
	<td width="600"><?php echo $item->question; ?></td>
	<td><a href="<?php echo site_url('/quiz/edit_quiz') . '/' . $item->id; ?>">Edit</a></td>
	<td><a href="<?php echo site_url('/quiz/remove_quiz') . '/' . $item->id; ?>">Remove</a></td>
	</tr>
	<?php endforeach; ?>
	</table>
	<br/>
		<a href="<?php echo site_url('quiz/display_add_quiz') . '/' . $chapter; ?>" class="addLink" > Add a Question </a>
	
</div>
