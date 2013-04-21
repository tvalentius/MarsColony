<h3>Data Cash</h3>
<div class="content_nav">
</div>
<p>
	<div>
		<form action="" method="POST">
			<fieldset>
				<legend>Filter Pencarian</legend>
				<table>
					<tr>
						<td>Facebook ID</td>
						<td>
							<?php
								echo $Form->create_input("text",array(
									"name"=>$Req->form_player,
									"value"=>$filter["fbid"]
									)
								);
							?>
						</td>
					</tr>
					<tr>
						<td>Type</td>
						<td>
							<?php
								echo $Form->create_input("text",array(
									"name"=>$Req->form_type,
									"value"=>$filter[$Req->con->type]
									)
								);
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
	<button onclick="chenxAjaxRefreshID('table_cash')">Refresh</button>
	<div id="table_cash">
		<?php echo $table_cash; ?>
	</div>
</p>