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
		<form name="login" action="theory101/login" method="post">
		<br>
		<table>
		<tr>
			<td class="loginFont"><b>Username </b></td>
			<td><input type="text" name="username"/></td>
		</tr>
		<tr>
			<td class="loginFont"><b>Password </b></td>
			<td><input type="password" name="password" /></td>
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
		<img src="/SwanCodeIgniter/images/theory101/display.gif" />
	</div>
	
	<div id="leftTopContent" class="grid_5 push_1">
		<h2>Learn Music Theory!</h2>
		<p>Theory 101 is a site to learn music theory. This site gives lessons
		that are fun to learn. Learn with videos and interactive elements.
		If you're done learning. Take a test, you will be tested according to
		your chosen topic, you can choose a single topic or multiple topics.
		Register to keep track of your progress. By keeping track, you will
		know what topic that can be improved and topics that you already mastered.
		Please take a moment by registering with us, to start learning.
		</p>
		
		<a href="#" id="registerLink" class="link"><b>Register Now!</b></a>
		
		<div id="register">
		<form name="login" action="theory101/login" method="post">
		<br>
		<table>
		<tr>
			<td class="loginFont"><b>Username </b></td>
			<td><input type="text" name="username"/></td>
		</tr>
		<tr>
			<td class="loginFont"><b>Password </b></td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td class="loginFont"><b>E-Mail </b></td>
			<td><input type="text" name="e-mail" /></td>
		</tr>
		<tr><td></td>
			<td><input type="submit" value="Register" /></td>
		</tr>
		</table>
		</form>
		</div>
		
	</div>
	
	<!-- Left,Middle,Right bottom content -->
	<div class="clear"> </div>
	<div id="leftBottomContent" class="grid_4">
		<img src="/SwanCodeIgniter/images/theory101/learn.png">
		<p>Learn a lesson</p>
	</div>
	
	<div id="middleBottomContent" class="grid_4">
		<img src="/SwanCodeIgniter/images/theory101/assess.png">	
		<p>After learning take a quiz to test yourself</p>
	</div>
	
	<div id="rightBottomContent" class="grid_4">
		<img src="/SwanCodeIgniter/images/theory101/track.png">
		<p>Track your progress</p>
	</div>
	
	<!-- Footer -->
	<div class="clear"></div>
	<div id="footer" class="grid_12">
	Theory101 FYP Project 2011
	</div>
	
</div>


</body>

</html>
