<p>
	<h3>Update Value System Parameter : "<?php echo $data[$Req->con->name] ?>"</h3>
	<form action="" method="POST">
		<table class="table_default">
			<tr>
				<td>Nama</td>
				<td>
					<?php
						echo $Form->create_input("text",array(
							"name"=>$Req->form_name,
							"value"=>$data[$Req->con->name]
							), TRUE
						);
					?>
				</td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>
					<?php
					
						echo $Form->create_input("textarea",array(
							"name"=>$Req->form_desc, "value"=>$data[$Req->con->desc]
							), TRUE
						);
					?>
				</td>
			</tr>
			<tr>
				<td>Value</td>
				<td>
					<?php
						echo $Form->create_input("text",array(
							"name"=>$Req->form_value, "required"=>TRUE,
							"value"=>$data[$Req->con->value]
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