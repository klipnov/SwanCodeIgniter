<html>

<head><title>Theory101</title>

<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/text.css" />
<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/960.css" />
<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/superfish/css/superfish.css" />
<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/theory101.css" />

<script type="text/javascript" src="/SwanCodeIgniter/css/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/SwanCodeIgniter/css/superfish/js/hoverIntent.js"></script>
<script type="text/javascript" src="/SwanCodeIgniter/css/superfish/js/superfish.js"></script>

<?php $this->load->helper('html'); ?>
<?php $this->load->helper('url'); ?>

<script>

		jQuery(function(){
			jQuery('ul.sf-menu').superfish({
			animation: {height:'show'},   
            delay:     1200                
			});
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
	<ul class="sf-menu menuStyle">
		<li class="current">
			<a href="<?php echo site_url('theory101_logged'); ?>">HOME</a>
		</li>
		<li>
			<a href="#">LESSON</a>
				<ul>
				<?php foreach($learnLinks as $item): ?>
				<li><a href="<?php echo site_url('theory101_logged/lessons/'); ?>
				<?php echo '/' . $item->id; ?>" >
				<?php echo $item->title; ?></a></li>
				<?php endforeach; ?>
				</ul>
		</li>
		<li>
			<a href="#">VIDEO</a>
				<ul>
				<?php foreach($videoLinks as $item): ?>
				<li><a href="<?php echo site_url('theory101_logged/video/'); ?>
				<?php echo '/' . $item->id; ?>" >
				<?php echo $item->title; ?></a></li>
				<?php endforeach; ?>
				</ul>
		</li>
		<li>
			<a href="#">QUIZ</a>
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
			<a href="#">MISC</a>
			<ul>
				<li><a href="#">Quiz History</a></li>
				<li><a href="#">Suggestions</a></li>
			</ul>
		</li>
		<li>
			<a href="<?php echo site_url('theory101_logout'); ?>">LOGOUT</a>
		</li>
	</ul>
	</div>
