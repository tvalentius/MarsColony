<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="no-js">
	<?php echo $head; ?>
<body>
<header>
	<div class="header_wrapper">
		<div class="header_position"><?php echo $header; ?></div>
	</div>
</header>
<div class="header_separator"></div>
<div class="main_wrapper">
	<div class="main_position">
			<div class="nav_wrapper"><nav><?php echo $menu; ?></nav></div>
			<div class="message"><?php echo $message; ?></div>
			<div class="content">
				<div class="left"><?php echo $left; ?></div>
				<div class="main"><?php echo $content; ?></div>
			</div>
	</div>
</div>
<div class="footer_separator"></div>
<footer>
	<div class="footer_wrapper">
		<div class="footer_position"><?php echo $footer; ?></div>
	</div>
</footer>	
<div class="footer_bottom"></div>
</body>
</html>