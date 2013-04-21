<p>
	<h3>Update User : "<?php echo $data[$Req->con->login_name] ?>"</h3>
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
				<td>Submit</td>
				<td><input type="submit" value="Simpan" /></td>
			</tr>
			<tr>
				<td colspan="2">
					<a href="<?php echo base_url().$this->current_path.'update_pass'?>">
						Ganti Password
					</a>
				</td>
			</tr>
		</table>
	</form>
</p>