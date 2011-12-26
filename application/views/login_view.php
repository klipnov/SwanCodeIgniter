<!DOCTYPE HTML>
<html>
<head><title>SWAN Login</title>

<?php $this->load->helper('html'); ?>
<?php $this->load->helper('url'); ?>
<?php $this->load->helper('form'); ?>

<style>
#login{
text-align:center;
}

#logo{
padding-left:40px;
text-align:center;
}
</style>

</head>

<body>

<div id="logo">
<?php echo img('images/swanLogo.png'); ?>
</div>
<div id="login">
<?php echo form_open('login/authenticate_admin'); ?>


<input type="text" name="username" required="required" placeholder="Username"/><br>
<input type="password" name="password" required="required" placeholder="Password"/><br>

<?php echo form_submit('submit','Login'); ?>

<?php echo form_close(); ?>
</div>
</body>

</html>
