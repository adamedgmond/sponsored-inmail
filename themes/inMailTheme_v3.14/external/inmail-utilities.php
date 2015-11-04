<?php
//scrubs clicktracked links
function scrubClicktracker($link) {
	$newlink = "";
	if ($link != "") {
		$qm = strrpos($link, "?");
		if ($qm !== false) {
			$newlink = substr(trim($link), 0, $qm+1);
		} else {
			$newlink = $newlink."?";
		}
	}
	return $newlink;
}
//remove unnecessary meta boxes
function my_remove_meta_boxes() {
    remove_meta_box('trackbacksdiv', 'post', 'core');
	remove_meta_box('commentsdiv', 'post', 'core');
	remove_meta_box('commentstatusdiv', 'post', 'core');
	remove_meta_box('slugdiv', 'post', 'core');
	remove_meta_box('authordiv', 'post', 'core');
	remove_meta_box('postexcerpt', 'post', 'core');
}
add_action( 'admin_menu', 'my_remove_meta_boxes' );
?>