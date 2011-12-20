<!DOCTYPE HTML>
<html>

<head><title>Theory101</title>

<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/text.css" />
<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/960.css" />
<link rel="stylesheet" type="text/css" media="all" href="/SwanCodeIgniter/css/theory101.css" />
<script src="/SwanCodeIgniter/css/jquery/js/jquery-1.6.2.min.js"></script>
<script src="/SwanCodeIgniter/css/jquery/js/jquery-ui-1.8.16.custom.min.js"></script>

<link type="text/css" href="/SwanCodeIgniter/css/jquery/css/smoothness/jquery-ui-1.8.16.custom.css" rel="Stylesheet" />	

<script>
$(document).ready(function(){

	$( "#tabs" ).tabs();
  	
  	$(function(){
    $('.fadein img:gt(0)').hide();
    setInterval(function(){
      $('.fadein :first-child').fadeOut()
         .next('img').fadeIn()
         .end().appendTo('.fadein');}, 
      3000);
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
	</div>
	
	<div id="login" class="grid_4 push_2">
		<form name="login" action="theory101/authenticate" method="post">
		<br>
		<table>
		<tr>
			<td class="loginFont"><b>Username </b></td>
			<td><input type="text" name="username" required="required" /></td>
		</tr>
		<tr>
			<td class="loginFont"><b>Password </b></td>
			<td><input type="password" name="password" required="required" /></td>
			<td><input type="submit" value="Login" /></td>
		</tr>
		</table>
		</form>
	</div>

	<!-- Horizontal rule after the mainPage header -->
	<div class="clear"></div>
	<div class="grid_12">
		<hr/>
	</div>
	
	<!-- Left and Right Top Content -->
	<div class="clear"></div>
	<div id="rightTopContent" class="grid_6">
 <div id="tabs">
	<ul>
		<li><a href="#tabs-1"><b>Welcome</b></a></li>
		<li><a href="#tabs-2"><b>Register</b></a></li>
		<li><a href="#tabs-3"><b>Learn More</b></a></li>
	</ul>
	<div id="tabs-1">
		<h3>Learn Music Theory!</h3>
		<p>Theory 101 is a site to learn music theory. This site gives lessons
		that are fun to learn. Learn with videos and interactive elements.
		If you're done learning. Take a test, you will be tested according to
		your chosen topic, you can choose a single topic or multiple topics.
		Register to keep track of your progress. By keeping track, you will
		know what topic that can be improved and topics that you already mastered.
		Please take a moment by registering with us, to start learning.
		</p>
	</div>
	<div id="tabs-2">
		
		<h3>Register with us!</h3>
		
		<p>You can start learning immediately after the registration.</p>
	
		<form name="login" action="theory101/register" method="post">
		<br>
		<table>
		<tr>
			<td class="loginFont"><b>Username </b></td>
			<td><input type="text" name="username" required="required"/></td>
		</tr>
		<tr>
			<td class="loginFont"><b>Password </b></td>
			<td><input type="password" name="password" required="required" /></td>
		</tr>
		<tr>
			<td class="loginFont"><b>E-Mail </b></td>
			<td><input type="email" name="email" required="required" /></td>
		</tr>
		<tr><td></td>
			<td><input type="submit" value="Register" /></td>
		</tr>
		</table>
		</form>
	
	</div>
	<div id="tabs-3">
		<h3>LEARN.ASSESS.TRACK</h3>
		<p> This site has 3 components to it. First is the lessons. This is where you learn
			music theory. Second is Asessment. You can take the quiz here. Theres a quiz for 
			every chapter. the third component is Track. Track shows you your statistics. The
			higher you score in the quiz, higher your rank. There are 4 ranks.
			Newbie,beginner,intermediate, and master. If you achieve master you can post your 
			own lessons.
		</p>
	</div>
</div>

</div>
	
	<div id="leftTopContent" class="grid_6">
		<div class="fadein">
			<img src="/SwanCodeIgniter/images/theory101/rainbow.jpg"/>
			<img src="/SwanCodeIgniter/images/theory101/SheetMusic.jpg"/>
			<img src="/SwanCodeIgniter/images/theory101/guitar.jpg"/>		
		</div>
	</div>
	
	<!-- Footer -->
	<div class="clear"></div>
	<div id="footer" class="grid_12">
	Theory101 FYP Project 2011
	</div>
	
</div>

</body>

</html>
