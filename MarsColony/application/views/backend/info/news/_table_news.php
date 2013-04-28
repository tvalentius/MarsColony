<table class="table_default">
	<tr>
		<td colspan="3">
			<?php echo $ajax_pagination ?>
			<input type="hidden" id="<?php echo CHENX_AJAX_SEARCH?>" value="<?php echo $ajax_src_encode?>"/> 
		</td>
	</tr>
	<tr>
		<th>Nama</th>
		<th>Teaser</th>
		<th>Main Photo</th>
		<th>List Photo</th>
		<th>Action</th>
	</tr>
	<?php foreach($result as $row): ?>
	<tr align="center">
		<td>
			<?php
				echo anchor(
					$this->current_path.'update/'.$row[$News->con->pk],
					$row[$News->con->name],
					array("onclick"=>"boxFrame(this,1000)")
				);
			?>
		</td>
		<td><?php echo $row[$News->con->teaser]; ?></td>
		<td>
			<?php
				$image = $News->con->image_path.$row[$News->con->pk]."_news_thumb.jpg";
				if(file_exists($image)):
				$image = base_url().$image;
			?>
			<img src="<?php echo $image; ?>" />
			<?php
				endif;
			?>
		</td>
		<td>
			<?php
				echo anchor(
					'backend/info/images/gallery/news/'.$row[$News->con->pk],
					img(BACKEND_IMAGE_PATH.'picture.png'),
					array("onclick"=>"boxFrame(this,'100%','100%')")
				);
			?>
		</td>
		<td>
			<?php
				if($row[$News->con->status]==1): $status=img(BACKEND_IMAGE_PATH.'active.png');
				else: $status=img(BACKEND_IMAGE_PATH.'unactive.png');
				endif;
				echo $this->chenx_ajax->button_action(
					$this->current_path.'update_status/'.$row[$News->con->pk],$status,'table_news',TRUE
				);
			?>
			<br />
			<?php
				if($row[$News->con->is_hot]) $status=img(array("src"=>BACKEND_IMAGE_PATH.'heart.png',"title"=>"Hot Topic"));
				else $status=img(array("src"=>BACKEND_IMAGE_PATH.'heart_x.png',"title"=>"Regular"));
				echo $this->chenx_ajax->button_action(
					$this->current_path.'update_is_hot/'.$row[$News->con->pk],$status,'table_news',TRUE
				);
			?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>