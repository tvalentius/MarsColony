<p>
	<h3>Update Grup : "<?php echo $data[$Req->con->name] ?>"</h3>
	<form action="" method="POST">
		<table class="table_default">
			<tr>
				<td>Nama</td>
				<td>
					<?php
					
						echo $Form->create_input("text",array(
							"name"=>$Req->form_name, "required"=>TRUE,
							"value"=>$data[$Req->con->name]
							)
						);
					?>
				</td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>
					<?php
					
						echo $Form->create_input("textarea",array(
							"name"=>$Req->form_desc,
							"value"=>$data[$Req->con->desc]
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
