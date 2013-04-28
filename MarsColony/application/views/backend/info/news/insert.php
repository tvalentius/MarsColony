<p>
	<h3>Tambahkan News Baru</h3>
	<form action="" method="POST" enctype="multipart/form-data">
		<table class="table_default">
			<tr>
				<th>Judul Berita</th>
				<td>
					<?php
						echo $Form->create_input("text",array(
							"name"=>$Req->form_name, "required"=>TRUE,
							"value"=>$data[$Req->con->name],"size"=>100,"maxlength"=>200
							)
						);//<input type='text' name='name' value=''
					?>
				</td>
			</tr>
			<tr>
				<th>Teaser</th>
				<td>
					<?php
						echo $Form->create_input("textarea",array(
							"name"=>$Req->form_teaser, "required"=>TRUE,
							"value"=>$data[$Req->con->teaser],"cols"=>80, "rows"=>5
							)
						);
					?>
				</td>
			</tr>
			<tr>
				<th>
                    Keyword<br>
                    <span class="note">* Kata Kunci untuk membantu pencarian (Usahakan dibawah 5 kata)</span>
                </th>
				<td>
					<?php
						echo $Form->create_input("textarea",array(
							"name"=>$Req->form_keyword,
							"value"=>$data[$Req->con->keyword],"cols"=>80, "rows"=>2
							)
						);
					?>
				</td>
			</tr>
			<tr>
				<th>
                    Meta Description <br>
                    <span class="note">* Penjelasan untuk ditampilkan di mesin pencarian Google (170 Karakter)</span>
                </th>
				<td>
					<?php
						echo $Form->create_input("textarea",array(
							"name"=>$Req->form_metadesc,
							"value"=>$data[$Req->con->metadesc],"cols"=>80, "rows"=>2, "maxlength"=>"170"
							)
						);
					?>
				</td>
			</tr>
			<tr>
				<th>Konten</th>
				<td>
					<?php
						echo $Form->create_input("tiny_mce",array(
							"name"=>$Req->form_content,
							"value"=>$data[$Req->con->content],"cols"=>80, "rows"=>20
							)
						);
					?>
				</td>
			</tr>
			<tr>
				<th>Upload Images</th>
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
