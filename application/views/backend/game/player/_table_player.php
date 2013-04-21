<table class="table_default">
	<tr>
		<td colspan="3">
			<?php echo $ajax_pagination ?>
			<input type="hidden" id="<?php echo CHENX_AJAX_SEARCH?>" value="<?php echo $ajax_src_encode?>"/> 
		</td>
	</tr>
	<tr>
		<th>Nama (Player)</th>
		<th>Score</th>
		<th>Cash (Win / Lose / Reward)</th>
		<th>Action</th>
	</tr>
	<?php foreach($players as $row): ?>
	<tr align="center">
		<td>
			<?php
				echo anchor(
					$this->current_path.'detail/'.$row[$Player->con->pk],
					$row[$Player->con->name]." (".$row[$Player->con->name].")",
					array("onclick"=>"boxFrame(this)")
				);
			?>
		</td>
        <td><?php echo $row[$Player->con->score]?></td>
        <td>
			<?php 
                echo $row[$Player->con->cash].' '.
                '( '.$row[$Player->con->cashwin].' / '.$row[$Player->con->cashlose].' / '.$row[$Player->con->cashreward].' )' 
            ?>
		</td>
		<td>
			<?php
					if($row[$Player->con->status]):	$delete_message = "Non-Aktifkan";
					else:	$delete_message = "Aktifkan";
					endif;
					echo $this->chenx_ajax->button_action(
						$this->current_path.'delete/'.$row[$Player->con->pk],$delete_message,'table_player',TRUE
					);
			?>		
		</td>
	</tr>
	<?php endforeach; ?>
</table>