<table class="table_default">
	<tr>
		<td colspan="3">
			<?php echo $ajax_pagination ?>
			<input type="hidden" id="<?php echo CHENX_AJAX_SEARCH?>" value="<?php echo $ajax_src_encode?>"/> 
		</td>
	</tr>
	<tr>
		<th>Nama</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Status</th>
	</tr>
	<?php foreach($result as $row): ?>
	<tr align="center">
		<td>
			<?php
				echo anchor(
					$this->current_path.'update/'.$row[$Contact->con->pk],
					$row[$Contact->con->name],
					array("onclick"=>"boxFrame(this)")
				);
			?>
		</td>
		<td><?php echo $row[$Contact->con->phone]; ?></td>
		<td><?php echo $row[$Contact->con->email]; ?></td>
		<td><?php	echo $row[$Contact->Lookup->con->name] ?></td>
	</tr>
	<?php endforeach; ?>
</table>