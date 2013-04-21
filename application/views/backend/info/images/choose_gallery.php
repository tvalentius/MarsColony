<h3>Data Gambar</h3>
<div class="content_nav">

	<a href="<?php echo base_url($this->current_path.'gallery/'.$pk)?>">
		<img src='<?php echo BACKEND_IMAGE_PATH.'left.png'?>' title="Kembali" />
	</a>
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
						<td colspan="2"><input type="submit" value="Filter!" /></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>
	<button onclick="chenxAjaxRefreshID('table_choose_images')">Refresh</button>
	<div id="table_choose_images">
		<?php echo $table_images; ?>
	</div>
</p>