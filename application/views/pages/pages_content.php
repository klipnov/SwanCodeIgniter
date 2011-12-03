<div id="content">
	
	<div id="pagesdiv1">
	<h3>Main Pages</h3>
	
	<?php foreach($main_pages as $item): ?>
	
	<?php echo anchor("pages/remove_page/$item->id","x",
	                   array('onclick'=>"return confirm('Are you sure?');",
	                   'class'=>'removelink')); ?>
	<?php echo anchor("pages/display_page_info/$item->id","$item->title"); ?>
	<?php echo anchor("pages/preview/$item->id","Preview",
					   array('class'=>"addlink")); ?>
	<br/>

	<?php endforeach; ?>
	
	<?php echo anchor("pages/display_add_page","Add New Page",
					  array('class'=>'addlink')); ?>
	<br>
	<br>
	</div>
	
	<div id="pagesdiv2">
	<h3>Lessons</h3>
	
	<?php foreach($lesson as $block): ?>
	
	<?php echo anchor("pages/remove_lesson/$block->id","x",
						array('onclick' => "return confirm('Are you sure?');",
						'class'=>'removelink')); ?>
	
	<?php echo anchor("pages/display_lesson_info/$block->id","$block->title"); ?>
	<?php echo anchor("pages/lesson_preview/$block->id","Preview",
					   array('class'=>"addlink")); ?>
	<br>
	<?php endforeach; ?>
	

		<?php echo anchor("pages/display_add_lesson","Add New Lesson",
					  array('class'=>'addlink')); ?> 
	<br>
	<br>
	</div>
	
</div>
