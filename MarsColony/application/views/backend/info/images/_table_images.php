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
	<?php if($i==1): echo "<tr align='center'>"; elseif($i==5): $i=1; echo "</tr>"; endif; $i++; ?>
		
		<td width="160">
			<a href="<?php echo base_url().$this->current_path.'update/'.$row[$Images->con->pk] ?>" onclick="boxFrame(this,1000,600)">
				<div><img width="150" src="<?php echo $Images->view_image($row, TRUE) ?>" /></div>
				<div style="float:left; width:80%; text-align: center;">
					<div><?php echo $row[$Images->con->name]?></div>
					<div style="font-size:12px; font-style: italic;"><?php echo $row[$Images->Lookup->con->name]?></div>
				</div>
				<div style="float:left">
					<?php
						if($row[$Images->con->status]==1): $status=img(BACKEND_IMAGE_PATH.'active.png');
						else: $status=img(BACKEND_IMAGE_PATH.'unactive.png');
						endif;
						echo $this->chenx_ajax->button_action(
							$this->current_path.'update_status/'.$row[$Images->con->pk],$status,'table_images',TRUE
						);
					?>
				</div>
				<div style="clear:both"></div>
			</a>
		</td>
		
	<?php endforeach; ?>
	<?php if($i>1 && $i<5): echo "</tr>"; endif; ?>
</table>