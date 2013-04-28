<div id='cssmenu'>
<ul>
	<?php foreach($list_menu as $menu):	?>
	<?php if($menu["active"]==TRUE): $class="active";	else:	$class="";	endif;	?>
	<?php	if(isset($menu["child"])==FALSE): ?>
	<li class='<?php echo $class;?>'><a href='<?php echo $menu["link"]?>'><span><?php echo $menu["title"]?></span></a></li>
	<?php	else:	?>
	<li class='has-sub <?php echo $class;?>'><a href='<?php echo $menu["link"]?>'><span><?php echo $menu["title"]?></span></a>
    	<ul>
	<?php		foreach($menu["child"] as $child):	?>
        <li><a href='<?php echo $child["link"]?>'><span><?php echo $child["title"]?></span></a></li>
	<?php		endforeach;	?>
    	</ul>
	</li>
	<?php 	endif;	?>
	<?php endforeach;	?>
</ul>
</div>
