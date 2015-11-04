<?php 
	global $button_td_campaignid, $secondary_button_flag, $redirect_url;
	if ($button_td_campaignid != "") {
		get_template_parts(array('parts/widgets/talentdirect'));
	} else {
		global $action_text;
		$button_redirect = (get_post_meta($post->ID, 'button_url', true) != "" ? get_post_meta($post->ID, 'button_url', true) : $redirect_url);
		$button_text = ($action_text == "" ? "Continue" : $action_text);
		?>
		<a target="_blank" class="btn-action" href="<?php echo $button_redirect ?>"><?php echo $button_text ?></a>
<?php	$secondary_button_redirect = $redirect_url;
		$secondary_button_url = get_post_meta($post->ID, 'secondary_button_url', true);
		$secondary_action_text = get_post_meta($post->ID, 'secondary_action_text', true);
		if ($secondary_button_url != "") { $secondary_button_redirect = $secondary_button_url; }
		if ($secondary_button_flag == "yes" && $secondary_action_text != "") { ?>
<a target="_blank" class="btn-ternary" href="<?php echo $secondary_button_redirect ?>"><?php echo $secondary_action_text ?></a>
<?php } } ?>