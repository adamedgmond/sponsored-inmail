<?php 
global $baseURL, $share_linkedin, $share_facebook, $share_twitter, $share_prepend, $button_td_campaignid, $formatted_title, $override_ctacaption;
$pageURL = "http://".$baseURL.$_SERVER["REQUEST_URI"];
function remove_querystring_var($url, $key) {
    $url = preg_replace('/(?:&|(\?))' . $key . '=[^&]*(?(1)&|)?/i', "$1", $url);
	$url = strip_tags($url);
  	return $url;
}
//$shareURL = substr(remove_querystring_var(substr(remove_querystring_var($pageURL, "n"),0,-1), "u"),0,-1);
$shareURL = substr(remove_querystring_var($pageURL,"u"),0,-1);
$title = urlencode($formatted_title);
if ($title == "") { $title = $override_ctacaption; }
?>
<header>
<div id="header">
<div id="subheader">
   <h1 id="logo"><a href="http://www.linkedin.com">LinkedIn</a></h1>
   <nav>
   <div class="nav">
   <ul>
      <?php
      $override_backlink = (get_post_meta($post->ID, 'override_backlink', true) == "" ? "Go to Inbox" : get_post_meta($post->ID, 'override_backlink', true));
      $override_share = (get_post_meta($post->ID, 'override_share', true) == "" ? "Share" : get_post_meta($post->ID, 'override_share', true)); 
      ?>
      <li class="backlink"><a href="http://www.linkedin.com/inbox/messages/received"><?php echo $override_backlink ?></a></li>
      <?php if ($share_facebook == "yes" || $share_linkedin == "yes" || $share_twitter == "yes") { if ($button_td_campaignid == "") { ?>
      <li class="share_list"><a href="#" class="share_link"><?php echo $override_share; ?></a>
         <ul>
            <?php if ($share_linkedin == "yes") { ?>
            <li><a href="<?php echo scrubClicktracker($share_prepend) ?>http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $shareURL?>" class="share share_linkedin">LinkedIn</a></li>
            <?php } if ($share_facebook == "yes") { ?>
            <li><a href="<?php echo scrubClicktracker($share_prepend) ?>http://www.facebook.com/share.php?u=<?php echo urlencode($shareURL)?>" class="share share_facebook">Facebook</a></li>
            <?php } if ($share_twitter == "yes") { ?>
            <li><a href="<?php echo scrubClicktracker($share_prepend) ?>http://twitter.com/home?status=<?php echo $title?><?php echo urlencode(" ".$shareURL." #in")?>" class="share share_twitter">Twitter</a></li>
            <?php } ?>
         </ul>
      </li>
      <?php } } ?>
   </ul>
   </div>
   </nav>
</div>
</div>
</header>