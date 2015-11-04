<?php

/*
Plugin Name: LinkedIn Sponsored InMail Admin
Plugin URI: http://www.linkedin.com
Description: Wordpress customizations specific to LinkedIn Sponsored InMail generation.
Author: Adam Edgmond
Version: 1.0
Author URI: http://www.linkedin.com/in/adamedgmond
*/

// hides unnecessary editor elements
function my_admin_head() {
	echo '<link rel="stylesheet" type="text/css" href="'.plugins_url('wp-admin.css', __FILE__). '">';
	echo '<style type="text/css">#wp-admin-bar-wp-logo > .ab-item .ab-icon {background-image:url("'.plugins_url('sprite_third_party_sharing_v2.png', __FILE__).'")!important;background-position:left top!important; }#wp-admin-bar-wp-logo:hover > .ab-item .ab-icon {background-image:url("'.plugins_url('sprite_third_party_sharing_v2.png', __FILE__).'")!important;background-position:left top!important; }.mce_underline {display:none!important;}.mce_justifyfull {display:none!important;}.mce_forecolor {display:none!important;}#acf-global_clicktracker_old {display:none!important;}#acf-global_clicktracker {display:none!important;}</style>';
}
add_action('admin_head', 'my_admin_head');

// adds customizations to the editor bar
function wp_admin_bar_my_custom_account_menu( $wp_admin_bar ) {
	$user_id = get_current_user_id();
	$current_user = wp_get_current_user();
	$profile_url = get_edit_profile_url( $user_id );
	if ( 0 != $user_id ) {
		/* Add the "My Account" menu */
		$avatar = get_avatar( $user_id, 28 );
		$howdies = array(
			"It's a great day to make an InMail",
			"Top o' th' mornin'",
			"Howdy",
			"I live to serve",
			"Sup",
			"Lookin' good",
			"Welcome",
			"Hello",
			"You make InMail look easy",
			"Nice to see you again",
			"The robot overlords say hi",
			"Awaiting your orders",
			"It's good to be InMailin'",
			"Hi",
			"I like working with you",
			"Mo' InMails, mo' problems",
			"Bonjour",
			"Bah-weep-Graaaaagnah wheep ni ni bong",
			"0100100001100101011011000110110001101111",
			"Your shoelaces are untied",
			"Greetings",
			"I hope Adam doesn't break me again",
			"You should see me as a blog",
			"This greeting is randomly selected",
			"Word to the mutha",
			":)",
			"#yolo",
			"Yo",
			"If it's InMails you want, it's InMails I got",
			"Let's get crackin'",
			"Party on",
			"randomly_generated_greeting",
			"Start the party",
			"Stylin' like The Chicago Manual",
			"'I' before 'E', except after 'C'",
			"The postal service ain't got nothing on me",
			"So InMail me maybe",
			"Oppa InMail Style",
			"Love it, ship it",
			"Next play",
			"#swag",
			"Link Out",
			"With great power comes great responsibility",
			"Freedom after 5pm is the right of all CMs"
		);
		$howdiesIndex = $howdies[rand(0,count($howdies)-1)];
		$howdy = $howdiesIndex.sprintf( __(', %1$s.'), $current_user->display_name );
		$class = empty( $avatar ) ? '' : 'with-avatar';
		$wp_admin_bar->add_menu( array(
			'id' => 'my-account',
			'parent' => 'top-secondary',
			'title' => $howdy . $avatar,
			'href' => $profile_url,
			'meta' => array(
				'class' => $class,
			),
		) );
	}
}
add_action( 'admin_bar_menu', 'wp_admin_bar_my_custom_account_menu', 11 );

// adds randomized images to the login screen
function my_login_css() {
	$photos = array('v300.jpg','v301.jpg','v302.jpg','v303.jpg','v304.jpg','v305.jpg','v306.jpg','v307.jpg','v308.jpg','v309.jpg','v310.jpg','v311.jpg','v312.jpg','v313.jpg');
	$photoIndex = $photos[rand(0,count($photos)-1)];
 	echo '<link rel="stylesheet" type="text/css" href="' .plugins_url('login.css', __FILE__). '">';
	echo '<style type="text/css">.login h1 a {background-image:url("'.plugins_url($photoIndex, __FILE__).'")!important;}</style>';
}
add_action('login_head', 'my_login_css');

// removes nonfunctioning panels from the dashboard screen
function remove_dashboard_widgets() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_incoming_links']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets', 20, 0);

// error message for neglecting a title in posts upon hitting publish
function force_post_title_init() {
  wp_enqueue_script('jquery');
}
function force_post_title() {
  echo "<script type='text/javascript'>\n";
  echo "
  jQuery('#publish').click(function(){
		var testervar = jQuery('[id^=\"titlediv\"]')
		.find('#title');
		if (jQuery.trim(testervar.val()).length < 1)
		{
			jQuery('[id^=\"titlediv\"]').css('background', '#F96');
			setTimeout(\"jQuery('#ajax-loading').css('visibility', 'hidden');\", 100);
			alert('Title is required. Please enter a title.');
			setTimeout(\"jQuery('#publish').removeClass('button-primary-disabled');\", 100);
			return false;
		}
  	});
  ";
   echo "</script>\n";
}
add_action('admin_init', 'force_post_title_init');
add_action('edit_form_advanced', 'force_post_title');

// changes empty title text from "Enter Title Here"
function title_text_input($title) {
     return $title = 'Title is required';
}
add_filter( 'enter_title_here', 'title_text_input' );

//function diediedie() {
	//global $wpdb, $post;
	//wp_die(get_post_meta($post->ID, 'action_text', true));
//}
//add_action('wp_insert_post_data','diediedie');

?>