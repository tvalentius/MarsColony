<table class="table_default">
	<tr>
		<td colspan="3">
			<?php echo $ajax_pagination ?>
			<input type="hidden" id="<?php echo CHENX_AJAX_SEARCH?>" value="<?php echo $ajax_src_encode?>"/> 
		</td>
	</tr>
	<tr>
		<th>Nama</th>
		<th>Role</th>
		<th>Action</th>
	</tr>
	<?php foreach($groups as $row): ?>
	<tr align="center">
		<td>
			<?php
				if($is_update):
					echo anchor(
						$this->current_path.'update/'.$row[$Group->con->pk],
						$row[$Group->con->name],
						array("onclick"=>"boxFrame(this)")
					);
				else:
					echo $row[$Group->con->name];
				endif;
			?>
		</td>
		<td>
			<?php
				if($row[$Group->con->pk]!=$Group->con->admin_pk && $is_delete):
					if($is_update):
						echo anchor(
							$this->current_path.'roles/'.$row[$Group->con->pk],
							"View",
							array("onclick"=>"boxFrame(this)")
						);
					endif;
				endif;
			?>		
		</td>
		<td>
			<?php
				if($row[$Group->con->pk]!=$Group->con->admin_pk && $is_delete):
					if($row[$Group->con->status]):	$delete_message = "Non-Aktifkan";
					else:	$delete_message = "Aktifkan";
					endif;
					echo $this->chenx_ajax->button_action(
						$this->current_path.'delete/'.$row[$Group->con->pk],$delete_message,'table_group',TRUE
					);
				endif;
			?>		
		</td>
	</tr>
	<?php endforeach; ?>
</table>