<!-- Lessons View -->
<div class="clear"></div>
<div id="content" class="grid_12">
	<?php foreach($lesson as $item): ?>
	<h1><?php echo $item->title; ?></h1>
	<?php echo $item->content; ?>
	<?php endforeach; ?>
</div>
