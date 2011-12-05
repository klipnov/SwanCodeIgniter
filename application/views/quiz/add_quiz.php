<div id="content">

<?php $this->load->helper('form'); ?>
	
<h3>Add A Question</h3>
<br>

<?php echo form_open('quiz/add_quiz'); ?>

<table id="addForm">
	<tr>
		<td>
			<?php echo form_label('Chapter:','chapter'); ?>
		</td>
		<td>
			<?php echo form_input('chapter'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo form_label('Question:','question'); ?>
		</td>
		<td>
			<textarea id="editor1" name="question"></textarea>
		</td>
	</tr>
		<tr>
		<td>
			<?php echo form_label('Answer(a):','a'); ?>
		</td>
		<td>
			<textarea id="editor2" name="a"></textarea>
		</td>
	</tr>
		<tr>
		<td>
			<?php echo form_label('Answer(b):','b'); ?>
		</td>
		<td>
			<textarea id="editor3" name="b"></textarea>
		</td>
	</tr>
			<tr>
		<td>
			<?php echo form_label('Answer(c):','c'); ?>
		</td>
		<td>
			<textarea id="editor4" name="c"></textarea>
		</td>
	</tr>
			<tr>
		<td>
			<?php echo form_label('Answer(d):','d'); ?>
		</td>
		<td>
			<textarea id="editor5" name="d"></textarea>
		</td>
	</tr>
		<tr>
		<td>
			<?php echo form_label('Answer:','answer'); ?>
		</td>
		<td>
			<input type="text" name="answer"/>
		</td>
		</tr>
</table>

<?php echo form_submit('submit','Submit'); ?>

<?php echo form_close(); ?>

			<script type="text/javascript">
			
					CKEDITOR.replace( 'editor1',
					{
						filebrowserBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html',
						filebrowserImageBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html?Type=Images',
						filebrowserFlashBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html?Type=Flash',
						filebrowserUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						filebrowserImageUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
						filebrowserFlashUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
					});
			
					CKEDITOR.replace( 'editor2',
					{
						filebrowserBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html',
						filebrowserImageBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html?Type=Images',
						filebrowserFlashBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html?Type=Flash',
						filebrowserUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						filebrowserImageUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
						filebrowserFlashUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
					});
			
					CKEDITOR.replace( 'editor3',
					{
						filebrowserBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html',
						filebrowserImageBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html?Type=Images',
						filebrowserFlashBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html?Type=Flash',
						filebrowserUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						filebrowserImageUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
						filebrowserFlashUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
					});
			
					CKEDITOR.replace( 'editor4',
					{
						filebrowserBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html',
						filebrowserImageBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html?Type=Images',
						filebrowserFlashBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html?Type=Flash',
						filebrowserUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						filebrowserImageUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
						filebrowserFlashUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
					});

					CKEDITOR.replace( 'editor5',
					{
						filebrowserBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html',
						filebrowserImageBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html?Type=Images',
						filebrowserFlashBrowseUrl : 'http://localhost/SwanCodeIgniter/ckfinder/ckfinder.html?Type=Flash',
						filebrowserUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						filebrowserImageUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
						filebrowserFlashUploadUrl : 'http://localhost/SwanCodeIgniter/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
					});
				
			</script>
	
</div>
