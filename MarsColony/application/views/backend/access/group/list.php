<h3>Data Grup User</h3>
<div class="content_nav">
		<?php if($is_insert): ?>
		<a onclick="boxFrame(this)" href="<?php echo $link_insert; ?>">
			<img src='<?php echo BACKEND_IMAGE_PATH.'add.png'?>' title="Tambah Grup Baru" />
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
	<button onclick="chenxAjaxRefreshID('table_group')">Refresh</button>
	<div id="table_group">
		<?php echo $table_group; ?>
	</div>
</p>