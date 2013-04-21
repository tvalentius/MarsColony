
<script>
	jQuery(document).ready(function(){
		jQuery('#parallax .parallax-layer')
		.parallax({
			mouseport: jQuery('#parallax')
		});
	});
	
	function circular(divid)
	{
		var now = divid;
		if(divid<2)
		{
			divid++;
		}else{
			divid = 1;
		}
		$('#'+divid).fadeOut(100);
		$('#'+now).fadeIn(100);	
		
		window.setTimeout(circular(divid), 1000);
	}

</script>
	<button onclick="circular(1)">Click Me</button>
	<div id="1" style="display:none">Hello World A</div>
	<div id="2" style="display:none">Hello World B</div>
	
	
    <div class="parallax-viewport" id="parallax">
        
        <!-- parallax layers -->
        <div class="parallax-layer" style="width:860px; height:273px;">
            <img src="<?php echo DESIGN_IMAGE_PATH?>parallax_sketch/0_sun.png" alt="" style="position:absolute; left:300px; top:-12px;"/>
        </div>
        <div class="parallax-layer" style="width:920px; height:274px;">
            <img src="<?php echo DESIGN_IMAGE_PATH?>parallax_sketch/1_mountains.png" alt="" />
        </div>
        <div class="parallax-layer" style="width:1100px; height:284px;">
            <img src="<?php echo DESIGN_IMAGE_PATH?>parallax_sketch/2_hill.png" alt="" style="position:absolute; top:40px; left:0;" />
        </div>
        <div class="parallax-layer" style="width:1360px; height:320px;">
            <img src="<?php echo DESIGN_IMAGE_PATH?>parallax_sketch/3_wood.png" alt="" style="position:absolute; top:96px; left:0;"/>
        </div>

        <!-- Rounded corners -->
        <img src="http://stephband.info/images/corner_white_tl.png" class="tl" />
        <img src="http://stephband.info/images/corner_white_tr.png" class="tr" />
        <img src="http://stephband.info/images/corner_white_bl.png" class="bl" />
        <img src="http://stephband.info/images/corner_white_br.png" class="br" />
    </div>