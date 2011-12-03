<div id="content">
	<?php foreach($content as $item): ?>
	
	<?php echo $item->content ?>
	
	
	<?php endforeach; ?>
	
	<?php echo anchor('/pages','return'); ?>
</div>
