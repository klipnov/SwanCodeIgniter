<html>

<head><title>Theory101</title>

<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/text.css" />
<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/960.css" />
<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/superfish/css/superfish.css" />
<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/theory101.css" />

<script type="text/javascript" src="/SwanCodeIgniter/css/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/SwanCodeIgniter/css/superfish/js/superfish.js"></script>
<script type="text/javascript" src="/SwanCodeIgniter/css/superfish/js/hoverIntent.js"></script>
<?php $this->load->helper('html'); ?>
<?php $this->load->helper('url'); ?>

<!--<script type="text/javascript">
$(document).ready(function(){

    $("#learn").hide();
    $("#assess").hide();
    $("#track").hide();

  $("#learnLink").click(function(){
    $("#learn").toggle("slow");
    $("#assess").hide();
    $("#track").hide();

  });
  
  $("#assessLink").click(function(){
   $("#assess").toggle("slow");
    $("#learn").hide();
    $("#track").hide();

  });
  
  $("#trackLink").click(function(){
    $("#track").toggle("slow");
    $("#assess").hide();
    $("#learn").hide();

  });
  
});
</script>-->
<script>

	$(document).ready(function() {
		$("ul.sf-menu".superfish();
	});

</script>

</head>

<body>

<div class="container_12">
	
	<!-- The black line on top -->
	<div class="topLine grid_12"></div>
	
	<!-- Theory101 Logo and the login form -->
	<div class="clear"></div>
	<div id="logo" class="grid_6">
		<img src="/SwanCodeIgniter/images/theory101/logo1.png"/>
		<img src="/SwanCodeIgniter/images/theory101/home2.png" height='35'/>	
	</div>
	
	<!-- Theory101 menu -->
	<div class="clear"></div>
	<div id="menu" class="grid_12">
	<ul class="sf-menu">
		<li class="current">
			<a href="#">Lesson</a>
				<ul>
				<?php foreach($learnLinks as $item): ?>
				<li><a href="<?php echo site_url('theory101_logged/lessons/'); ?>
				<?php echo '/' . $item->id; ?>" >
				<?php echo $item->title; ?></a></li>
				<?php endforeach; ?>
				</ul>
		</li>
		<li>
			<a href="#">Video</a>
				<ul>
				<?php foreach($videoLinks as $item): ?>
				<li><a href="<?php echo site_url('theory101_logged/video/'); ?>
				<?php echo '/' . $item->id; ?>" class="link" >
				<?php echo $item->title; ?></a></li>
				<?php endforeach; ?>
				</ul>
		</li>
		<li>
			<a href="#">Quiz</a>
				<ul>
					<?php for($i = 1; $i <= $total_quiz; $i++)
					{
						echo "<li><a href='".
				 		site_url('theory101_logged/quiz/')."/".$i.
						"'>"."Quiz ". $i . "</a>"."</li>";
					}
					?>
				</ul>
		</li>
		<li>
			<a href="<?php echo site_url('theory101_logout'); ?>">Logout</a>
		</li>
	</ul>
	</div>
