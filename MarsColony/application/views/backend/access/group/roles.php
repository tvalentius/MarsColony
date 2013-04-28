<p>
	<h3>Role Grup : "<?php echo $group_name ?>"</h3>
	<form action="" method="POST">
		<table class="table_default">
			<tr>
				<td>Role</td>
				<td>
					<?php
					
						echo $Form->create_input("treecheckbox",array(
							"name"=>$Req->form_role."[]",
							"value"=>$treecheckbox
							)
						);
					?>
				</td>
			</tr>
			<tr>
				<td>Submit</td>
				<td><input type="submit" value="Simpan" /></td>
			</tr>
		</table>
	</form>
</p>
