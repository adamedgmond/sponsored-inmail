<?php
	global $redirect_url, $pm_format, $halfpage_ad, $rectangles, $rawcreatives, $recommendwidget_companyid, $recommendwidget_position, $companyfollowwidget_companyid, $companyfollowwidget_position, $secondary_button_flag;
	if (count($rectangles) > 0 && $rectangles[0] != "") { 
		foreach ($rectangles as $rectangle) {
			if ($rectangle != "") {
				$swf = strpos(strtolower($rectangle),".swf");
				if ($swf !== false) {
					echo '<div class="ad rectangle"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="300" height="250">
<param name="movie" value="';
					echo $rectangle;
					echo '"><param name="quality" value="high"><param name="bgcolor" value="#ffffff"><embed src="';
					echo $rectangle;
					echo '" quality="high" bgcolor="#ffffff" width="300" height="250" type="application/x-shockwave-flash" pluginspace="http://www.macromedia.com/go/getflashplayer"></embed></object></div>';
				} else {
					echo "<a class='ad rectangle' href='";
					echo $redirect_url;
					echo "' target='_blank'><img src='";
					echo $rectangle; 
					echo "' width='300' height='250' alt=''></a>";
				}
			}
		}
	}
	else if ($halfpage_ad != "") {
		$swf = strpos(strtolower($rectangle),".swf");
			if ($swf !== false) {
				echo '<div class="ad halfpage_ad"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="300" height="600">
<param name="movie" value="';
				echo $halfpage_ad;
				echo '"><param name="quality" value="high"><param name="bgcolor" value="#ffffff"><embed src="';
				echo $halfpage_ad;
				echo '" quality="high" bgcolor="#ffffff" width="300" height="600" type="application/x-shockwave-flash" pluginspace="http://www.macromedia.com/go/getflashplayer"></embed></object></div>';
			} else {
				echo "<a class='ad halfpage_ad' href='";
				echo $redirect_url;
				echo "' target='_blank'><img src='";
				echo $halfpage_ad; 
				echo "' width='300' height='600' alt=''/></a>";
		}
	}
	else if (count($rawcreatives) > 0 && $rawcreatives[0] != "") {
    	foreach ($rawcreatives as $raw_creative) {
			if ($raw_creative != "") {echo "<div class='ad raw_creative'>".$raw_creative."</div>";}
			if ($pm_format == "plus") { ?><div class="noscript">
<?php $secondary_button_flag = "yes"; get_template_parts(array('parts/shared/article')); ?>
</div><?php
			}
       	}
	}
if ($pm_format != "plus" && $companyfollowwidget_companyid != "" && $companyfollowwidget_position == "rail") {	?>

<div class="widget companyfollowwidget ad">
  <?php get_template_parts(array('parts/widgets/companyfollow')); ?>
</div>
<?php } 
if ($pm_format != "plus" && $recommendwidget_companyid != "" && $recommendwidget_position == "rail") {	?>
<div class="widget recommendwidget ad">
  <?php get_template_parts(array('parts/widgets/recommend')); ?>
</div>
<?php } ?>
