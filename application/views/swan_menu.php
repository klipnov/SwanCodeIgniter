	<div id="menu">
		<?php foreach ($main_links as $link => $name): ?>
	
		<li class="link"><?php echo anchor($link,$name); ?></li>
		
		<?php endforeach; ?>
	</div>
