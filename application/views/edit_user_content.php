<div id="content">

<?php $this->load->helper('form'); ?>

<?php foreach ($user as $item): ?>


<?php echo $item->id . "<br>"; ?>
<?php echo form_input('username',"$item->username").br(); ?>
<?php echo form_input('password',"$item->password").br(); ?>
<?php echo form_input('email',"$item->email").br(); ?>

<?php echo form_submit('submit', 'Submit'); ?>
<?php endforeach; ?>

</div>
