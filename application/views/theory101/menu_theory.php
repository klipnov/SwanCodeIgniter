<script type="text/javascript">
$(document).ready(function(){

    $("#learn").hide();
    $("#assess").hide();

  $("#learnLink").click(function(){
    $("#learn").toggle("slow");
  });
  
  $("#assessLink").click(function(){
   $("#assess").toggle("slow");
  });
  
});
</script>

<!-- Menu for theory101 -->
<div id ="menu" class="grid_3 homeLink">
	<a href="<?php echo site_url('theory101_logged'); ?>" class="link">
	Home
	</a><br/>
	<a href="#" id="learnLink" class="link">Lesson</a><br/>
	<div id="learn">
		<?php foreach($learnLinks as $item): ?>
		<a href="<?php echo site_url('theory101_logged/lessons/'); ?>
		<?php echo '/' . $item->id; ?>" class="link" >
		<?php echo $item->title; ?></a><br>
		<?php endforeach; ?>
	</div>
	<a href="#" id="assessLink" class="link">Quiz</a>
	<div id="assess">
		<?php for($i = 1; $i <= $total_quiz; $i++)
				{
					echo "<a href='".
					 site_url('theory101_logged/quiz/')."/".$i.
					"'class='link'>"."Quiz ". $i . "</a>"."<br/>";
				}
		?>
	</div>
</div>

<!-- Horizontal Rule after Menu/Logo -->
<div class="clear"></div>
<hr>
