<!--User Lessons View -->
<div class="clear"></div>
<div id="content" class="grid_12">
	<?php foreach($user_lesson as $item): ?>
	<h1><?php echo $item->title . " " . "by " . $item->username; ?></h1>
	<?php echo $item->content; ?>
	<?php endforeach; ?>
</div>
