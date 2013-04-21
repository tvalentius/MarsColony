<head>
	<!-- Charset -->
	<meta charset="utf-8">
	<!-- CSS From Server -->
	<?php echo $style ?>
	<!-- JS From Server -->
	<script>
		//Variable value from Server
		var current_path = '<?php echo base_url($this->current_path)?>';
	</script>
	<?php echo $js ?>
	<!-- Title From Server -->
	<title><?php echo $title ?></title>
	<!-- Meta Tag-->
	<?php foreach($meta as $key=>$value): if($value):	?>
		<meta name="<?php echo $key ?>" content="<?php echo $value ?>">
	<?php	endif; endforeach;  ?>
		
	<!-- Icon -->
	<link rel="icon" href="<?php echo IMAGE_PATH; ?>favicon.ico" type="image/x-icon">
	<!-- Shortcut Icon -->
	<link rel="shortcut icon" href="<?php echo IMAGE_PATH; ?>favicon.ico" type="image/x-icon">
	<!-- Script Type -->
	<meta http-equiv="content-script-type" content="text/javascript">
	<!-- Robot 
		INDEX CONTENT 		= "INDEX, FOLLOW"
		NO INDEX CONTENT 	= "NOINDEX, NOFOLLOW"
	-->
	<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
	<!-- Chenx_AJAX Refresh Function
	<script>
		<?php	if($chenx_ajax_refresh==TRUE):	?>
		<?php		foreach($chenx_ajax_refresh as $ref):	?>
		parent.chenxAjaxRefreshID('<?php echo $ref?>');
		<?php		endforeach;	?>
		<?php	endif;	?>	
	</script>
	 -->
</head>