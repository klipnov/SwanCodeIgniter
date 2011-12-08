<html>

<head>
<title>Simple Web Admin</title>
<?php $this->load->helper('url'); ?>
<script src="/SwanCodeIgniter/css/jquery/js/jquery-1.6.2.min.js"></script>
<script src="/SwanCodeIgniter/css/jquery/js/jquery-ui-1.8.16.custom.min.js"></script>

<link type="text/css" href="/SwanCodeIgniter/css/jquery/css/smoothness/jquery-ui-1.8.16.custom.css" rel="Stylesheet" />	

	<script>
	$(function() {
	
		$( "#dialog-message" ).dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$( this ).dialog( "close" );
					window.location = "<?php echo site_url("$link"); ?>" ;
				}
			}
		});
	});
	</script>

</head>

<body>
	
	<div id="dialog-message" title="<?php echo $title; ?>">
	<p>
		<span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
		<?php echo $message; ?>
	</p>
</div>
 
</body>

</html>
