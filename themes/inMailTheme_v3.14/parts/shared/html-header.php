<?php global $share_linkedin, $share_facebook, $share_twitter, $share_prepend, $share_pinterest, $post, $get_stylesheet_directory_uri, $formatted_title, $override_ctacaption, $tester; ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" >
<title><?php $title = $formatted_title; if ($title == "") { $title = $override_ctacaption; } echo $title; ?> | LinkedIn</title>
<?php 
if (is_single()) { 
	$meta = get_the_excerpt();
  	$tags = array("<p>", "</p>");
  	$meta = str_replace($tags, "", $meta);
?>
<meta name="description" content="<?php echo $meta; ?>" />
<?php } ?>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="/favicon.ico">
<link rel="stylesheet" type="text/css" href="<?php echo $get_stylesheet_directory_uri; ?>/style.css"/>
<link media="screen" rel="stylesheet" type="text/css" href="<?php echo $get_stylesheet_directory_uri; ?>/css/inmail.css" />
<link media="only screen and (orientation:portrait) and (max-device-width: 480px)" href="<?php echo $get_stylesheet_directory_uri; ?>/css/inmail-portrait.css" type="text/css" rel="stylesheet">
<link media="only screen and (orientation:landscape) and (min-device-width: 481px) and (max-device-width: 1024px)" href="<?php echo $get_stylesheet_directory_uri; ?>/css/inmail-landscape.css" type="text/css" rel="stylesheet">
<link media="only screen and (min-device-width: 1025px)" href="<?php echo $get_stylesheet_directory_uri; ?>/css/inmail-enhanced.css" type="text/css" rel="stylesheet">
<!--[if (lt IE 9)&(!IEMobile)]><link rel="stylesheet" type="text/css" href="<?php echo $get_stylesheet_directory_uri; ?>/css/inmail-enhanced.css" /><![endif]-->
<!--[if lt IE 9 ]><link rel="stylesheet" type="text/css" href="<?php echo $get_stylesheet_directory_uri; ?>/css/inmail-ie.css" /><![endif]-->
<?php //if ($share_facebook == "yes" || $share_linkedin == "yes" || $share_twitter == "yes" || $share_pinterest == "yes") { ?>
<!--link media="screen" rel="stylesheet" type="text/css" href="<?php echo $get_stylesheet_directory_uri; ?>/css/colorbox.css" /-->
<?php //} ?>
<script type="text/javascript" src="http://platform.linkedin.com/in.js">
<?php if ($tester === true) { echo "api_key: WeIwLy14_uhwZbPUH3sgjvTe3BBDjqb3USWL0rCvBCZ8DUKGIYkw3s0zZMIO374P";
echo "onLoad: onLinkedInLoad"; 
echo "authorize: true";} ?>
</script>
</head>
<!--[if IEMobile 7 ]><body class="iem7 ie"><![endif]-->
<!--[if lt IE 7 ]><body class="ie6 ie"><![endif]-->
<!--[if IE 7 ]><body class="ie7 ie"><![endif]-->
<!--[if IE 8 ]><body class="ie8 ie"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><body><!--<![endif]-->
<di