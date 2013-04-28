<table class="table_default">
	<tr>
		<td colspan="3">
			<?php echo $ajax_pagination ?>
			<input type="hidden" id="<?php echo CHENX_AJAX_SEARCH?>" value="<?php echo $ajax_src_encode?>"/> 
		</td>
	</tr>
	<tr>
		<th>Nama (User)</th>
		<th>Grup</th>
		<th>Action</th>
	</tr>
	<?php foreach($users as $row): ?>
	<tr align="center">
		<td>
			<?php
				if($is_update):
					echo anchor(
						$this->current_path.'update/'.$row[$User->con->pk],
						$row[$User->con->name]." (".$row[$User->con->login_name].")",
						array("onclick"=>"boxFrame(this)")
					);
				else:
					echo $row[$User->con->name];
				endif;
			?>
		</td>
		<td><?php echo $row[$User->Usergroup->con->name]; ?></td>
		<td>
			<?php
				if($row[$User->con->pk]!=$User->con->admin_pk && $is_delete==TRUE):
					if($row[$User->con->status]):	$delete_message = "Non-Aktifkan";
					else:	$delete_message = "Aktifkan";
					endif;
					echo $this->chenx_ajax->button_action(
						$this->current_path.'delete/'.$row[$User->con->pk],$delete_message,'table_user',TRUE
					);
				endif;
			?>		
		</td>
	</tr>
	<?php endforeach; ?>
</table>