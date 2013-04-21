<head>


	<title><?php echo $title ?></title>
	<!-- CSS From Server -->
	<?php echo $style ?>
	
	<link rel="stylesheet" type="text/css" href="http://stephband.info/css/template.min.css" />
	<link rel="stylesheet" type="text/css" href="http://stephband.info/css/template.theme.min.css" />
	<link rel="stylesheet" type="text/css" href="http://stephband.github.com/css/site.layout.css" />
	<link rel="stylesheet" type="text/css" href="http://stephband.github.com/css/docs.classes.css" />

	<style type="text/css" media="screen, projection">
    	.parallax-viewport {
	    	width: 100%;
	    	max-width: 60em;
	    	height: 20em;
	    	background-color: #aebcc9;
    	}
    
		.diagram {
    		margin-top: -0.75em;
    	}
    
	  	small {
	    	text-transform: uppercase;
	  	}
	</style>		
	<!-- JS From Server -->
	<?php echo $js ?>

	<script>
		jQuery(document).ready(function(){
			jQuery('#parallax .parallax-layer')
			.parallax({
				mouseport: jQuery('#parallax')
			});
		});
	</script>
  	<!-- Title From Server -->

</head>