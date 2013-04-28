<p>
	<h3>Tambahkan Gambar Baru</h3>
	<form action="" method="POST" enctype="multipart/form-data">
		<table class="table_default">
			<tr>
				<th>Nama / Kategori</th>
				<td>
					<?php
						echo $Form->create_input("text",array(
							"name"=>$Req->form_name, "required"=>TRUE,
							"value"=>$data[$Req->con->name],"size"=>50,"maxlength"=>100
							)
						);
					?>
					<?php
						$parameter = array(
							"name"=>$Req->form_category, "value"=>$result_cat,
							"selected"=>$data[$Req->con->fk_lookup_category]
						);
						echo $Form->create_input("dropdown",$parameter);
					?>
				</td>
			</tr>
			<tr>
				<th>Deskripsi</th>
				<td>
					<?php
						echo $Form->create_input("tiny_mce",array(
							"name"=>$Req->form_desc,
							"value"=>$data[$Req->con->desc],"cols"=>60, "rows"=>15, "id"=>"ajaxfilemanager"
							)
						);
					?>
				</td>
			</tr>
			<tr>
				<th>Images</th>
				<td>
					<?php
						echo $Form->create_input("upload",array(
							"name"=>$Req->form_image
							)
						);
					?>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Simpan" /></td>
			</tr>
		</table>
	</form>
</p>
