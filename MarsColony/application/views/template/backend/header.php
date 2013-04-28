<div class="header_left" style="float:left">
	<div class="header_language">
		Language : (<?php echo lang('web_language')?>) |
		<a href="<?php echo base_url('id').'/'.$this->current_path ?>">Indonesia</a> -
		<a href="<?php echo base_url('en').'/'.$this->current_path ?>">English</a>
	</div>
	<div class="header_welcome">
		Welcome, <?php echo $name; ?>
		<?php if($this->is_user_login==TRUE): ?><br>
		<a href="<?php echo $this->link_path.'backend/profile'?>" onclick="boxFrame(this)">Profile</a> |
		<a href="<?php echo $this->link_path.'backend/home/logout'?>">Logout</a>
		<?php endif; ?>
	</div>
</div>
<div class="header_right" style="float:left">
	<div class="header_title">Backend Header</div>
</div>
<div style="clear:both"></div>