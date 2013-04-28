<div class='home-wrapper'>
	<?php if($this->is_player_login==FALSE): ?>

	<a href="<?php echo $this->FB->fb_login_url ?>">Login dengan Facebook</a>

	<?php endif; ?>

	<div class='logo-home'>
		<img src="<?php echo IMAGE_PATH;?>template/Web-logo.png"/>
	</div>
	<div class='home-navigation'>
		<img src="<?php echo IMAGE_PATH;?>home/Homepage-navi.png"/>
	</div>
	<div class='home-main-content'>
		<div class='home-main-content-bg'>
			<img src="<?php echo IMAGE_PATH;?>home/home-content-background.png"/>
		</div>
		<div class="home-main-content-nav">
			<img src="<?php echo IMAGE_PATH;?>home/Homepage-main-navigation.png"/>
		</div>
	</div>
</div>

