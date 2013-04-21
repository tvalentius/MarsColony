<h3>Data Lookup</h3>
<div class="content_nav">
		<?php if($is_insert): ?>
		<a onclick="boxFrame(this)" href="<?php echo $link_insert; ?>">
			<img src='<?php echo BACKEND_IMAGE_PATH.'add.png'?>' title="Tambah Lookup Baru" />
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
						<td>Judul</td>
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
						<td>Grup</td>
						<td>
							<?php
								$parameter = array(
									"name"=>$Req->form_group, "value"=>$drop_group,
									"all"=>TRUE, "allname"=>"- Pilih Salah Satu -", "selected"=>$filter[$Req->con->fk_group]
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
	<button onclick="chenxAjaxRefreshID('table_lookup')">Refresh</button>
	<div id="table_lookup">
		<?php echo $table_lookup; ?>
	</div>
</p>