<table class="table_default">
	<tr>
		<td colspan="3">
			<?php echo $ajax_pagination ?>
			<input type="hidden" id="<?php echo CHENX_AJAX_SEARCH?>" value="<?php echo $ajax_src_encode?>"/> 
		</td>
	</tr>
	<tr>
		<th>Lookup</th>
		<th>Grup</th>
		<th>Action</th>
	</tr>
	<?php foreach($lookups as $row): ?>
	<tr align="center">
		<td>
			<?php
				if($is_update && $row[$lookup->Lookupgroup->con->is_static]==0):
					echo anchor(
						$this->current_path.'update/'.$row[$lookup->con->pk],
						$row[$lookup->con->name],
						array("onclick"=>"boxFrame(this)")
					);
				else:
					echo $row[$lookup->con->name];
				endif;
			?>
		</td>
		<td><?php echo $row[$lookup->Lookupgroup->con->name]; ?></td>
		<td>
			<?php
				if($is_delete && $row[$lookup->Lookupgroup->con->is_static]==0):
					if($row[$lookup->con->status]): $delete_message = "Non-Aktifkan";
					else:	$delete_message = "Aktifkan";
					endif;
					echo $this->chenx_ajax->button_action(
						$this->current_path.'delete/'.$row[$lookup->con->pk],$delete_message,'table_lookup',TRUE
					);
				endif;
			?>		
		</td>
	</tr>
	<?php endforeach; ?>
</table>