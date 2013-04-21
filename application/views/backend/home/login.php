<div>Login Form</div>
<p>
	<form method="POST">
		<fieldset>
			<legend>Masukkan Data Formulir Login Anda</legend>
			<label>Nama</label>
			<?php 
				echo $Form->create_input("text",
					array("name"=>$Req->form_name,"value"=>$data[$Req->con->login_name],"required"=>TRUE)
				); 
			?>
			<label>Password</label>
			<?php echo $Form->create_input("password",array("name"=>$Req->form_pass,"required"=>TRUE)); ?>
			<input type="submit" />
		</fieldset>
	</form>
</p>