<h3>Gallery</h3>
<div class="content_nav">
		<a href="<?php echo $link_insert; ?>">
			<img src='<?php echo BACKEND_IMAGE_PATH.'add.png'?>' title="Pilih Gambar" />
		</a>
</div>
<p style="margin-top:10px; border:1px solid">
	<?php foreach($result as $row): ?>
	<div style="float:left; padding:5px; border:1px solid #7f7f7f; min-height:200px">
		<a href="<?php echo base_url().$this->current_path.'update_gallery/'.$type.'/'.$pk.'/'.$row[$Rel->con->pk_images]; ?>">
			<img width="150" src="<?php echo $Rel->Images->view_image($row, TRUE) ?>" />
			<div>
				<?php echo $row[$Rel->Images->con->name]?>
				<span style="font-size:12px; font-style: italic;">(<?php echo $row[$Rel->Images->obj->Lookup->con->name]?>)</span>
			</div>
		</a>
		<a href="<?php echo base_url().$this->current_path.'do_delete_gallery/'.$type.'/'.$pk.'/'.$row[$Rel->con->pk_images]; ?>">
			<img src='<?php echo BACKEND_IMAGE_PATH.'delete.png'?>' title="Hapus Gambar" />
		</a>
	</div>
	
	<?php endforeach; ?>
	<div style="clear:both"></div>
</p>