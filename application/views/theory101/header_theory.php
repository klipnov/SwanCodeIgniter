<html>

<head><title>Theory101</title>

<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/text.css" />
<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/960.css" />
<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/theory101.css" />

<script type="text/javascript" src="/SwanCodeIgniter/css/jquery-1.7.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){

    $("#register").hide();

  $("#registerLink").click(function(){
    $("#register").toggle("slow");
  });
  
});
</script>

<?php $this->load->helper('html'); ?>
<?php $this->load->helper('url'); ?>

</head>

<body>

<div class="container_12">
	
	<!-- The black line on top -->
	<div class="topLine grid_12"></div>
	
	<!-- Theory101 Logo and the login form -->
	<div class="clear"></div>
	<div id="logo" class="grid_4">
		<img src="/SwanCodeIgniter/images/theory101/logo1.png"/>	
	</div>
