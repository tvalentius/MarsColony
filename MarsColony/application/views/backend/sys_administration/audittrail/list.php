<p>
	<h3>Data Audit Trail</h3>
	<div>
		<form action="" method="POST">
			<fieldset>
				<legend>Filter Pencarian</legend>
				<table>
					<tr>
						<td>Modul</td>
						<td width="300">
							<?php
								echo $Form->create_input("text",array(
									"name"=>$Req->form_module,
									"value"=>$filter[$Req->con->module]
									)
								);
							?>
						</td>
						<td>User</td>
						<td>
							<?php
								$parameter = array(
									"name"=>$Req->form_user, "value"=>$drop_creator,
									"all"=>TRUE, "selected"=>$filter[$Req->con->create_by]
								);
								echo $Form->create_input("dropdown",$parameter);
							?>
						</td>
					</tr>
					<tr>
						<td>Value</td>
						<td>
							<?php
								echo $Form->create_input("text",array(
									"name"=>$Req->form_value,
									"value"=>$filter[$Req->con->value]
									)
								);
							?>
						</td>
						<td>Action</td>
						<td>
							<?php
								$parameter = array(
									"name"=>$Req->form_action, "value"=>$drop_action,
									"all"=>TRUE, "selected"=>$filter[$Req->con->fk_lookup_action]
								);
								echo $Form->create_input("dropdown",$parameter);
							?>
						</td>
					</tr>
					<tr>
						<td>Date Start</td>
		                <td>
		                	<?php 
								echo $Form ->create_input("datestart",array(
									"name"=>$Req->form_datestart, "required" => TRUE,
									"value"=>$filter[$Req->form_datestart],"id"=>$Req->form_datestart
									)
								)
							?>
		                </td>
						<td>Date End</td>
		                <td>
		                	<?php 
								echo $Form ->create_input("dateend",array(
									"name"=>$Req->form_dateend, "required" => TRUE, "start"=>$Req->form_datestart,
									"value"=>$filter[$Req->form_dateend],"id"=>$Req->form_dateend
									)
								)
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
	<button onclick="chenxAjaxRefreshID('table_audittrail')">Refresh</button>
	<div id="table_audittrail">
		<?php echo $table_audittrail; ?>
	</div>
</p>