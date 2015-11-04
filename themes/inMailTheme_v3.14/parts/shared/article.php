<?php global $button_flag, $formatted_title, $tester, $pm_format, $name_flag, $secondary_text; ?>
<article>
  <div class="article panel">
    <?php if ($formatted_title != "") { ?>
    <h2><?php echo $formatted_title; ?></h2>
    <?php } if ($tester === true) { ?>
    <div id="javascript_name"></div>
    <?php } else {
		if (strtolower($name_flag) == "yes" && $pm_format != "plus") {
			$salutation_method = get_post_meta($post->ID, 'salutation_method', true);
            $salutation = ucwords(strtolower(get_post_meta ($post->ID, 'salutation_string', true)));
			$fullname = filter_var(pack('H*', $_GET["n"]), FILTER_SANITIZE_SPECIAL_CHARS);
			$firstname = explode(" ",$fullname);
      	    if ($fullname == "") {
				if ($salutation == "") {
      		    	$greeting = "Hello";
				} else {
					$greeting = $salutation;
				}
			} else {
				if ($salutation_method == "" || $salutation_method == 0) { 
                	$greeting = $salutation." ".$fullname;
				} else if ($salutation_method == 1) {
					$greeting = $salutation." ".$firstname[0];
				} else if ($salutation_method == 2) {
					$greeting = $fullname;
				} else if ($salutation_method == 3) {
					$greeting = $firstname[0];
				} else if ($salutation_method == 4) {
					$greeting = $fullname." ".$salutation;
				} else if ($salutation_method == 5) {
					$greeting = $firstname[0]." ".$salutation;
				} else if ($salutation_method == 6) {
					$greeting = $fullname.$salutation;
				} else if ($salutation_method == 7) {
					$greeting = $firstname[0].$salutation;
				}
			}
			if ($_GET["n"] != "") {
               	echo "<div><p>";
      	       	echo $greeting;
      	       	echo ",</p></div>";
			}
        }
	}
		the_content(); 
	  	if ($button_flag != "no") { ?>
    <?php get_template_parts(array('parts/shared/ctas')); ?>
    <?php }
	  	if ($secondary_text != "") { ?>
    <div id="secondary_text"><?php echo $secondary_text?></div>
    <?php } ?>
  </div>
</article>
