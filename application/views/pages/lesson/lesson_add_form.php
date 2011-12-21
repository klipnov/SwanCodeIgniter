<div id="content">

<?php $this->load->helper('form'); ?>
	
<h3>Add A New Lesson</h3>
<br>

<?php echo form_open('pages/post_lesson'); ?>

<table id="addForm">
	<tr>
		<td>
			<?php echo form_label('Title:','title'); ?>
		</td>
		<td>
			<?php echo form_input('title'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo form_label('Chapter Number:','chapter_num'); ?>
		</td>
		<td>
			<?php echo form_input('chapter_num'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo form_label('Content:','content'); ?>
		</td>
		<td>
			<textarea id="editor1" name="content"></textarea>
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
</table>

<?php echo form_submit('submit','Submit'); ?>

<?php echo form_close(); ?>
	
</div>
