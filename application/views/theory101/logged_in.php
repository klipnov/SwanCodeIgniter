<!-- the main control panel -->

<!-- LEARN -->
<div class="grid_4 push_2">
Hi, <b><?php echo $username; ?></b> what do you want to do today?
<br/>
<?php echo anchor('theory101_logout','logout',"class='link'"); ?>
</div>

<div class="clear"> </div>
<div id="leftBottomContent" class="grid_4">
	<a href="#" id="learnLink"><img src="/SwanCodeIgniter/images/theory101/learn.png"></a>
	<p>Learn a lesson</p>
	<div id="learn">
	<?php foreach($learnLinks as $item): ?>
	<a href="<?php echo site_url('theory101_logged/lessons/'); ?><?php echo '/' . $item->id; ?>" class="link" >
	<?php echo $item->title; ?></a><br>
	<?php endforeach; ?>
	</div>
</div>

<!--ASSESS-->
<div id="middleBottomContent" class="grid_4">
	<a href="#" id="assessLink"><img src="/SwanCodeIgniter/images/theory101/assess.png"></a>	
	<p>After learning take a quiz to test yourself</p>
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
<!--TRACK-->
<div id="rightBottomContent" class="grid_4">
	<a href="#" id="trackLink"><img src="/SwanCodeIgniter/images/theory101/track.png"></a>
	<p>Track your progress</p>
	<div id="track">
	Your Rank:
	<b><?php echo $rank; ?></b><br/>
	
	<?php if($post_enabled == TRUE)
		  {
		  	echo "<a href='#' class='link'> POST A LESSON </a><br/>";
		  }
	?>
	
	Total Progress:
	<b><?php echo $total_percentage ?>%</b><br/>
	
	Your last quiz: 
	<?php foreach($last_quiz as $item): ?>
	<b><?php echo $item->percentage . "%"; ?>
	<?php echo " Chapter " . $item->quiz_chapter; ?></b>
	<?php endforeach; ?>
	
	</div>
</div>
