<p>
	<h3>Update Status</h3>
	<form action="" method="POST" enctype="multipart/form-data">
		<table class="table_default">
			<tr>
				<th>Judul Berita</th>
				<td>
					<?php
						echo $Form->create_input("text",array(
							"name"=>$Req->form_name, "required"=>TRUE,
							"value"=>$data[$Req->con->name],"size"=>50,"maxlength"=>50
							),TRUE
						);
					?>
				</td>
			</tr>
			<tr>
				<th>Pesan</th>
				<td>
					<?php
						echo $Form->create_input("textarea",array(
							"name"=>$Req->form_desc, "required"=>TRUE,
							"value"=>$data[$Req->con->message],"cols"=>50, "rows"=>5
							), TRUE
						);
					?>
				</td>
			</tr>
			<tr>
				<th>Phone</th>
				<td><?php echo $data[$Req->con->phone]; ?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?php echo $data[$Req->con->email]; ?></td>
			</tr>
			<tr>
				<th>Status</th>
				<td>
					<?php
						$parameter = array(
							"name"=>$Req->form_status, "value"=>$drop_status,
							"selected"=>$data[$Req->con->fk_lookup_status]
						);
						echo $Form->create_input("dropdown",$parameter);
					?>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Simpan" /></td>
			</tr>
		</table>
	</form>
</p>
