<html>
<head><title>SWAN Login</title>

<?php $this->load->helper('html'); ?>
<?php $this->load->helper('url'); ?>
<?php $this->load->helper('form'); ?>

</head>

<body>

<center><?php echo img('images/swanLogo.png'); ?></center>

<?php echo form_open('login/authenticate'); ?>


<center><?php echo form_input('username'); ?></center><br>
<center><?php echo form_password('password'); ?></center><br>

<center><?php echo form_submit('submit','Login'); ?></center>

<?php echo form_close(); ?>

</body>

</html>
