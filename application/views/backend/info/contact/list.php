<h3>Data Hubungi Kami</h3>
<div class="content_nav">
</div>
<p>
	<div>
		<form action="" method="POST">
			<fieldset>
				<legend>Filter Pencarian</legend>
				<table>
					<tr>
						<td>Nama</td>
						<td>
							<?php
								echo $Form->create_input("text",array(
									"name"=>$Req->form_name,
									"value"=>$filter[$Req->con->name]
									)
								);
							?>
						</td>
					</tr>
					<tr>
						<td>Status</td>
						<td>
							<?php
								$parameter = array(
									"name"=>$Req->form_status, "value"=>$drop_status,
									"all"=>TRUE, "selected"=>$filter[$Req->con->fk_lookup_status]
								);
								echo $Form->create_input("dropdown",$parameter);
							?>
						</td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" value="Filter!" /></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>
	<button onclick="chenxAjaxRefreshID('table_contactus')">Refresh</button>
	<div id="table_contactus">
		<?php echo $table_contactus; ?>
	</div>
</p>