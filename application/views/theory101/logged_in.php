<!-- the main control panel -->



<!--TRACK-->
<div id="trackCol" class="grid_12">
	<div id="track">
	<p>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Hi <b><?php echo $username; ?></b> , what do you want to do today?

	<?php echo $rank; ?>
	
	Your total progress is 
	<?php echo $total_percentage ?>%.
	
	<b><?php echo $username; ?></b>, your last quiz, you scored  
	<?php foreach($last_quiz as $item): ?>
	<?php echo $item->percentage . "%"; ?>
	<?php echo "on Chapter " . $item->quiz_chapter . "."; ?>
	<?php endforeach; ?>
	</p>
	<br/><br/>

	<?php if($post_enabled == TRUE)
		  {
		  	echo "<a href='#' class='link'> Post a Lesson </a><br/>";
		  }
	?>
	</div>
</div>
