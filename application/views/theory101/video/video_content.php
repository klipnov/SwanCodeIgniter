<!-- Video View -->
<div class="clear"></div>
<div id="videoContent" class="grid_12">
	<center><?php foreach($video as $item): ?>
	<h1><?php echo $item->title; ?></h1>
	<?php echo $item->content; ?>
	<?php endforeach; ?></center>
</div>
