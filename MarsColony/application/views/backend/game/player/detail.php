<p>
	<h3>Detail</h3>
	<form action="" method="POST">
		<table class="table_default">
			<tr>
				<td>Nama Depan - Belakang</td>
				<td>
					<?php echo $data[$Req->con->name].' '.$data[$Req->con->lastname]  ?>
				</td>
			</tr>
			<tr>
				<td>Facebook ID</td>
				<td>
					<?php echo $data[$Req->con->fbid] ?>
					<?php echo anchor('http://www.facebook.com/'.$data[$Req->con->fbid], '(Link)', array('target'=>'_blank')) ?>
				</td>
			</tr>
			<tr>
				<td>Email / City</td>
				<td>
					<?php echo $data[$Req->con->email].' / '.$data[$Req->con->city] ?>
				</td>
			</tr>
			<tr>
				<td>Score</td>
				<td>
					<?php echo $data[$Req->con->score] ?>
				</td>
			</tr>
			<tr>
				<td>Cash (Win / Lose / Reward)</td>
				<td>
					<?php echo $data[$Req->con->cash].' '.
                    '( '.$data[$Req->con->cashwin].' / '.$data[$Req->con->cashlose].' / '.$data[$Req->con->cashreward].' )' ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal Login</td>
				<td>
					<?php echo convert_mysql_date_format($data[$Req->con->login_date], 'd F Y H:i:s') ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal Main</td>
				<td>
					<?php echo convert_mysql_date_format($data[$Req->con->play_date], 'd F Y H:i:s') ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal Daftar</td>
				<td>
					<?php echo convert_mysql_date_format($data[$Req->con->create_date], 'd F Y H:i:s') ?>
				</td>
			</tr>
		</table>
	</form>
</p>