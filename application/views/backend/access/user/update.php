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
				<td>Grup</td>
				<td>
					<?php
						$parameter = array(
							"name"=>$Req->form_group,"value"=>$drop_group,
							"selected"=>$data[$Req->con->fk_group]
						);
						if($data[$Req->con->pk]==$Req->con->admin_pk):
							$parameter["attr"] = "disabled='1'";
						endif;
						echo $Form->create_input("dropdown",$parameter);
					?>
				</td>
			</tr>
			<tr>
				<td>Submit</td>
				<td><input type="submit" value="Simpan" /></td>
			</tr>
			<?php if($is_update_pass):?>
			<tr>
				<td colspan="2">
					<a href="<?php echo base_url().$this->current_path.'update_pass/'.$data[$Req->con->pk]?>">
						Ganti Password
					</a>
				</td>
			</tr>
			<?php endif; ?>
		</table>
	</form>
</p>