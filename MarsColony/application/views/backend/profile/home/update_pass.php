<p>
	<h3>Update Password of User : "<?php echo $userdata[$Req->con->login_name] ?>"</h3>
	<form action="" method="POST">
		<table class="table_default">
			<tr>
				<td>Password Lama</td>
				<td>
					<?php					
						echo $Form->create_input("password",array(
							"name"=>$Req->form_pass_old, "required"=>TRUE
							)
						);
					?>
				</td>
			</tr>
			<tr>
				<td>Password Baru</td>
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
				<td>Submit</td>
				<td><input type="submit" value="Simpan" /></td>
			</tr>
		</table>
	</form>
</p>