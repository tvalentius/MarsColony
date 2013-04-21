<table class="table_default">
	<tr>
		<td colspan="5">
			<?php echo $ajax_pagination ?>
			<input type="hidden" id="<?php echo CHENX_AJAX_SEARCH?>" value="<?php echo $ajax_src_encode?>"/> 
		</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<?php $i=1; foreach($result as $row): ?>
	<?php if($i==1): $i++; echo "<tr align='center'>"; elseif($i==5): $i=1; echo "</tr>"; endif; ?>
		
		<td width="160">
				<div><img width="150" src="<?php echo $Images->view_image($row, TRUE) ?>" /></div>
				<div style="float:left; width:80%; text-align: center;">
					<div><?php echo $row[$Images->con->name]?></div>
					<div style="font-size:12px; font-style: italic;"><?php echo $row[$Images->Lookup->con->name]?></div>
				</div>
				<div style="float:left">
					<?php
						echo anchor($this->current_path.'do_choose_gallery/'.$type.'/'.$pk.'/'.$row[$Images->con->pk],img(BACKEND_IMAGE_PATH.'add.png'));
					?>
				</div>
				<div style="clear:both"></div>
		</td>
		
	<?php endforeach; ?>
	<?php if($i>1 && $i<5): echo "</tr>"; endif; ?>
</table>