<!-- Quiz View -->
<div class="clear"></div>
<div id="content" class="grid_12">
	<?php $this->load->helper('form'); ?>
	
	<?php echo form_open('theory101_logged/process_quiz'); ?>
	<?php $i = 0; ?>
	
	<?php foreach($quiz as $item): ?>
	<table>
	<tr>
		<td><?php echo ++$i . "."; ?></td>
		<td><?php echo $item->question; ?></td>
	</tr>
	<tr>
		<td><input type='radio' name="choose<?php echo $i; ?>" value="a" /></td>
		<td><?php echo $item->a; ?></td>
	</tr>
	<tr>
		<td><input type='radio' name="choose<?php echo $i; ?>" value="b" /></td>
		<td><?php echo $item->b; ?></td>
	</tr>
	<tr>
		<td><input type='radio' name="choose<?php echo $i; ?>" value="c" /></td>
		<td><?php echo $item->c; ?></td>
	</tr>
	<tr>
		<td><input type='radio' name="choose<?php echo $i; ?>" value="d" /></td>
		<td><?php echo $item->d; ?></td>
	</tr>
	
	</table>	
	
	<?php echo form_hidden("answer$i",$item->answer); ?>
	
	<?php endforeach; ?>
	
	<?php echo form_hidden('count',$i); ?>
	
	<?php echo form_submit('submit','Check Quiz'); ?>
	
	<?php echo form_close(); ?>
</div>
