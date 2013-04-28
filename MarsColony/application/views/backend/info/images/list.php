<h3>Data Gambar</h3>
<div class="content_nav">
		<?php if($is_insert): ?>
		<a onclick="boxFrame(this,1000,600)" href="<?php echo $link_insert; ?>">
			<img src='<?php echo BACKEND_IMAGE_PATH.'add.png'?>' title="Tambah Gambar Baru" />
		</a>
		<?php endif; ?>
</div>
<p>
	<div>
		<form action="" method="POST">
			<fieldset>
				<legend>Filter Pencarian</legend>
				<table>
					<tr>
						<td>Nama</td>
						<td>
							<?php
								echo $Form->create_input("text",array(
									"name"=>$Req->form_name,
									"value"=>$filter[$Req->con->name]
									)
								);
							?>
						</td>
					</tr>
					<tr>
						<td>Category</td>
						<td>
							<?php
								$parameter = array(
									"name"=>$Req->form_category, "value"=>$result_cat,
									"all"=>TRUE, "selected"=>$filter[$Req->con->fk_lookup_category]
								);
								echo $Form->create_input("dropdown",$parameter);
							?>
						</td>
					</tr>
					<tr>
						<td>Status Aktif</td>
						<td>
							<?php if($filter[$Req->con->status]) $check="checked=1"; else $check=""; ?>
							<input type="checkbox" name="<?php echo $Req->form_status?>"
							value="1" <?php echo $check;?> />
						</td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" value="Filter!" /></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>
	<button onclick="chenxAjaxRefreshID('table_images')">Refresh</button>
	<div id="table_images">
		<?php echo $table_images; ?>
	</div>
</p>