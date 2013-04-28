<table class="table_default">
	<tr>
		<td colspan="3">
			<?php echo $ajax_pagination ?>
			<input type="hidden" id="<?php echo CHENX_AJAX_SEARCH?>" value="<?php echo $ajax_src_encode?>"/> 
		</td>
	</tr>
	<tr>
		<th>Modul</th>
		<th>Action</th>
		<th>Value</th>
		<th>Created</th>
	</tr>
	<?php foreach($audittrails as $row): ?>
	<tr align="center">
		<td><?php	echo $row[$Audit->con->module];	?></td>
		<td><?php echo $row[$Audit->Lookup->con->name]; ?></td>
		<td align="left"><?php echo nl2br($row[$Audit->con->value]); ?></td>
		<td>
			<?php echo $row[$Audit->User->con->login_name]; ?>
			<br><?php echo convert_mysql_date_format($row[$Audit->con->create_date], "d F Y H:i:s"); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>