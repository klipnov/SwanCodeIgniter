<div id="content">
	
	<h3>Select a Chapter to edit the Quiz</h3><br>

	<?php for($i=1;$i <= $total_lesson; $i++) {
	echo "<a href=" . site_url('quiz/select_chapter/') . "/$i" . " >Chapter $i</a><br>";
	} ?>
	<br/>
	<a href="<?php echo site_url('quiz/display_add_quiz'); ?>" class="addLink" > Add a Question </a>
</div>
