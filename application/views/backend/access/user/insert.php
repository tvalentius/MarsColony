<p>
	<h3>Tambahkan User Baru</h3>
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
				<td>User</td>
				<td>
					<?php
						echo $Form->create_input("text",array(
							"name"=>$Req->form_login_name, "required"=>TRUE,
							"value"=>$data[$Req->con->login_name]
							)
						);
					?>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<?php
						echo $Form->create_input("password",array(
							"name"=>$Req->form_pass, "required"=>TRUE
							)
						);
					?>
				</td>
			</tr>
			<tr>
				<td>Ulang Password</td>
				<td>
					<?php
						echo $Form->create_input("password",array(
							"name"=>$Req->form_repass, "required"=>TRUE
							)
						);
					?>
				</td>
			</tr>
			<tr>
				<td>Grup</td>
				<td>
					<?php
						$parameter = array(
							"name"=>$Req->form_group, "value"=>$drop_group,
							"selected"=>$data[$Req->con->fk_group]
						);
						echo $Form->create_input("dropdown",$parameter);
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
