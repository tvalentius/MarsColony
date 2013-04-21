<table class="table_default">
	<tr>
		<td colspan="3">
			<?php echo $ajax_pagination ?>
			<input type="hidden" id="<?php echo CHENX_AJAX_SEARCH?>" value="<?php echo $ajax_src_encode?>"/> 
		</td>
	</tr>
	<tr>
		<th>Nama</th>
		<th>Deskripsi</th>
		<th>Value</th>
	</tr>
	<?php foreach($sysparams as $row): ?>
	<tr align="center">
		<td>
			<?php
				if($is_update && $row[$Sysparam->con->is_static]==0):
					echo anchor(
						$this->current_path.'update/'.$row[$Sysparam->con->name],
						$row[$Sysparam->con->name],
						array("onclick"=>"boxFrame(this)")
					);
				else:
					echo $row[$Sysparam->con->name];
				endif;
			?>
		</td>
		<td align="left"><?php echo nl2br($row[$Sysparam->con->desc]); ?></td>
		<td><?php echo $row[$Sysparam->con->value]; ?></td>
	</tr>
	<?php endforeach; ?>
</table>