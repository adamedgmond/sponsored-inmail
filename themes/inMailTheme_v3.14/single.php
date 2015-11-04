<?php
 
// **************************
// *                        *
// *    GLOBAL VARIABLES    *
// *                        *
// **************************

$env = "prod"; // either "dev" or "prod"
if ($env == "dev") {
	$baseURL = $_SERVER["SERVER_NAME"];
	$get_stylesheet_directory_uri = "http://".$baseURL."/apps/wordpress/wp-content/themes/inMailTheme_v3.14";
} else {
	$baseURL = "www.liasset.com";
	$get_stylesheet_directory_uri = "http://".$baseURL."/wp-v3/wp-content/themes/inMailTheme_v3.14";
}
//$optimization_suffix = ""; // liadops DEV for external javascript refactoring only
$optimization_suffix = "-min"; // liasset PROD only
$tester = ($_GET["tester"] == "" ? false : true); // testing flag 
$pm_format = (get_post_meta($post->ID, 'pm_format', true) == "" ? "left" : get_post_meta($post->ID, 'pm_format', true));
$redirect_url = get_post_meta($post->ID, 'redirect_url', true);
$button_flag = (get_post_meta($post->ID, 'button_flag', true) == "" ? "yes" : get_post_meta($post->ID, 'button_flag', true));
$action_text = (get_post_meta($post->ID, 'action_text', true) == "" ? "Continue" : get_post_meta($post->ID, 'action_text', true));
$button_td_campaignid = trim(get_post_meta($post->ID, 'button_td_campaignid', true));
$companyfollowwidget_companyid = get_post_meta($post->ID, 'companyfollowwidget_companyid', true);
$companyfollowwidget_position = get_post_meta($post->ID, 'companyfollowwidget_position', true);
$recommendwidget_companyid = get_post_meta($post->ID, 'recommendwidget_companyid', true);
$recommendwidget_position = get_post_meta($post->ID, 'recommendwidget_position', true);
$underbar_color = (get_post_meta($post->ID, 'underbar_color', true) == "" ? "orange" : get_post_meta($post->ID, 'underbar_color', true));
$override_ctacaption = (trim(get_post_meta($post->ID, 'override_ctacaption', true)) == "" ? "Take action on this Message" : get_post_meta($post->ID, 'override_ctacaption', true));
$name_flag = (get_post_meta($post->ID, 'name_flag', true) == "" ? "yes" : get_post_meta($post->ID, 'name_flag', true));
$share_linkedin = get_post_meta($post->ID, 'share_linkedin', true);
$share_facebook = get_post_meta($post->ID, 'share_facebook', true);
$share_twitter = get_post_meta($post->ID, 'share_twitter', true);
$share_pinterest = (get_post_meta($post->ID, 'share_pinterest', true) == "" ? "no" : get_post_meta($post->ID, 'share_pinterest', true)); 
$share_prepend = get_post_meta($post->ID, 'share_prepend', true);
$secondary_button_flag = "no";
$formatted_title = trim(strip_tags(get_the_title()));
$secondary_text = wpautop(get_field('secondary_text'));
$cachebuster = rand(0,100000);

// **************************
// *                        *
// *        TEMPLATE        *
// *                        *
// **************************

if (have_posts()) while (have_posts()) : the_post();
get_template_parts(array('parts/shared/html-header', 'parts/shared/header'));
 
?>

<div id="body" class="<?php echo $pm_format?>">
  <div id="extra">
    <?php if ($pm_format != "plus" && $pm_format != "doublewide" && $button_flag != "no") { ?>
    <div id="ctas" class="<?php echo $underbar_color ?>">
      <div class="panel">
        <p class="caption"><?php echo $override_ctacaption ?></p>
        <?php get_template_parts(array('parts/shared/ctas')); ?>
      </div>
    </div>
    <?php } 
	$halfpage_ad = get_post_meta($post->ID, 'halfpage_ad', true);
    $rectangles = get_post_meta($post->ID, 'med_rectangle_ad', false);
    $rawcreatives = get_post_meta($post->ID, 'rawcreative_html', false);
	if ($pm_format != "doublewide") {
	if (count($rectangles) > 0 || count($rawcreatives) > 0 || $halfpage_ad != "" || ($pm_format != "plus" && $recommendwidget_companyid != "" && $recommendwidget_position == "rail")) {
		if ($rectangles[0] != "" || $rawcreatives[0] != "" || $halfpage_ad != "") {
	?>
    <div id="ads" class="panel">
      <?php get_template_parts(array('parts/shared/ads')); ?>
    </div>
    <?php } } } ?>
  </div>
  <?php if ($pm_format != "plus") { ?>
  <div id="content">
    <?php $secondary_button_flag = "yes"; get_template_parts(array('parts/shared/article'));
    // widgets
    if (get_post_meta($post->ID, 'companywidget_companyid', true) != "") { ?>
    <div class="widget companywidget">
      <div class="panel">
        <?php get_template_parts(array('parts/widgets/companyprofile')); ?>
      </div>
    </div>
    <?php }
    if ($recommendwidget_companyid != "" && $recommendwidget_position == "content") {	?>
    <div class="widget recommendwidget">
      <div class="panel">
        <?php get_template_parts(array('parts/widgets/recommend')); ?>
      </div>
    </div>
    <?php } ?>
  </div>
  <?php } ?>
  <?php get_template_parts(array('parts/shared/footer')); ?>
</div>
<?php endwhile; ?>
<?php get_template_parts(array('parts/shared/html-footer')); ?>
