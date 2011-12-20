<div id="content">

<h3> Edit a Video </h3>
<br>

<?php $this->load->helper('form'); ?>

<?php echo form_open('pages/update_video'); ?>

	
	
	<table>
	<?php foreach ($content as $item): ?>
	
	<tr>
		<td>
			<?php echo form_hidden('id',"$item->id"); ?>

		</td>
	</tr>

	<tr>
		<td><?php echo form_label('Title:','title'); ?></td>
		<td><?php echo form_input('title',"$item->title"); ?></td>
	</tr>

	<tr>
		<td><?php echo form_label('Content:','content'); ?></td>
		<td><textarea id="editor1" name="content"><?php echo $item->content; ?>
			</textarea>
			<script type="text/javascript">
				window.onload = function()
				{
				CKEDITOR.replace( 'editor1',
					{
						filebrowserBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html',
						filebrowserImageBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html?Type=Images',
						filebrowserFlashBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html?Type=Flash',
						filebrowserUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						filebrowserImageUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
						filebrowserFlashUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
					});
				};
			</script>
		</td>
	</tr>

	<tr>
		<td><?php echo form_label('Date:','date'); ?></td>
		<td><?php echo $item->date ?></td>
	</tr>

	</table>

<?php echo form_submit('submit', 'Submit'); ?>
<?php endforeach; ?>

<?php echo form_close(); ?>

</div>
