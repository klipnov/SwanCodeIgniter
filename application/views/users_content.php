	<div id="content">
		
		<?php foreach($content as $result): ?>
		
		<?php echo $result->id; ?>
		<?php echo $result->username; ?>
		<?php echo $result->password; ?>
		<?php echo $result->email; ?>
		<br/>
		
		<?php endforeach; ?>
		
	</div>
