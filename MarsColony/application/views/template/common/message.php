<?php if($error): 	?>	<div class="message_error">		<?php echo $error ?>	</div> 	<?php endif; ?>
<?php if($success): ?>	<div class="message_success">	<?php echo $success ?>	</div>	<?php endif; ?>
<?php if($general): ?>	<div class="message_general">	<?php echo $general ?>	</div>	<?php endif; ?>