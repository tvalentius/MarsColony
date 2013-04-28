<head>
	<script>
		//Variable value from Server
		var current_path = '<?php echo $this->link_path.$this->current_path?>';
	</script>
	<!-- Charset -->
	<meta charset="utf-8">
	<!-- CSS From Server -->
	<?php echo $style ?>
	<!-- JS From Server -->
	<?php echo $js ?>
	<!-- Title From Server -->
	<title><?php echo $title ?></title>
	<!-- Icon -->
	<link rel="icon" href="<?php echo IMAGE_PATH; ?>favicon.ico" type="image/x-icon">
	<!-- Shortcut Icon -->
	<link rel="shortcut icon" href="<?php echo IMAGE_PATH; ?>favicon.ico" type="image/x-icon">
	<!-- Script Type -->
	<meta http-equiv="content-script-type" content="text/javascript">
	<!-- Robot No Index -->
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">												
	<!-- Chenx_AJAX Refresh Function -->
	<script>
		<?php	if($chenx_ajax_refresh==TRUE):	?>
		<?php		foreach($chenx_ajax_refresh as $ref):	?>
		parent.chenxAjaxRefreshID('<?php echo $ref?>');
		<?php		endforeach;	?>
		<?php	endif;	?>	
	</script>
</head>