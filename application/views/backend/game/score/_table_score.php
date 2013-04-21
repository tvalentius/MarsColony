<table class="table_default">
	<tr>
		<td colspan="3">
			<?php echo $ajax_pagination ?>
			<input type="hidden" id="<?php echo CHENX_AJAX_SEARCH?>" value="<?php echo $ajax_src_encode?>"/> 
		</td>
	</tr>
	<tr>
		<th>Nama (FBID)</th>
		<th>Point</th>
		<th>Type</th>
		<th>Date</th>
	</tr>
	<?php foreach($scores as $row): ?>
	<tr align="center">
		<td>
			<?php
				echo $row[$Score->Player->con->name]." (".$row[$Score->Player->con->fbid].")"
			?>
		</td>
        <td><?php echo $row[$Score->con->point]?></td>
        <td><?php echo $row[$Score->con->type]?></td>
        <td><?php echo convert_mysql_date_format($row[$Score->con->create_date], 'd F Y H:i:s')?></td>
	</tr>
	<?php endforeach; ?>
</table>