<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<?php
global $pm_format, $cachebuster, $name_flag, $button_td_campaignid, $share_facebook, $share_linkedin, $share_twitter, $share_pinterest, $get_stylesheet_directory_uri, $optimization_suffix, $tester;
if ($pm_format != "plus") { ?>
<script type="text/javascript" src="<?php echo $get_stylesheet_directory_uri; ?>/js/jquery.ba-throttle-debounce.min.js"></script>
<?php } //if ($share_linkedin == "yes" || $share_facebook == "yes" || $share_twitter == "yes" || $share_pinterest == "yes") { ?>
<!--script type="text/javascript" src="<?php echo $get_stylesheet_directory_uri; ?>/js/jquery.colorbox-min.js"></script-->
<?php //} ?>
<script type="text/javascript" src="<?php echo $get_stylesheet_directory_uri; ?>/js/site<?php echo $optimization_suffix ?>.js?cb=<?php echo $cachebuster ?>"></script>
<script type="text/javascript">
<?php if ($tester === true) { ?>
function onLinkedInLoad() {
	IN.Event.on(IN, "auth", onLinkedInAuth);
}
function onLinkedInAuth() {
	IN.API.Profile("me").result(displayProfiles);
}
function displayProfiles(profiles) {
   	var member = profiles.values[0];
<?php
if (strtolower($name_flag) == "yes" && $pm_format != "plus") {
	$salutation_method = get_post_meta($post->ID, 'salutation_method', true);
	$salutation = ((get_post_meta ($post->ID, 'salutation_string', true)) != "" ? ucwords(strtolower(get_post_meta ($post->ID, 'salutation_string', true))) : "Hello");
	if ($salutation_method == "" || $salutation_method == 0) { 
    	$greeting = '"'.$salutation.' " +  member.firstName + " " + member.lastName + ","';
	} else if ($salutation_method == 1) {
		$greeting = '"'.$salutation.' " +  member.firstName + ","';
	} else if ($salutation_method == 2) {
		$greeting = 'member.firstName + " " + member.lastName + ","';
	} else if ($salutation_method == 3) {
		$greeting = 'member.firstName + ","';
	}
?>
	$("#javascript_name").html("<p>" + <?php echo $greeting ?> + "</p>");
<?php } ?>
}
<?php } ?>
$(document).ready(function(){
<?php
$media_header = get_post_meta($post->ID, 'media_header', true); // media header
if ($media_header != "" && $pm_format != "plus") {
	if ($media_header != "custom") {
		$media_header_url = $get_stylesheet_directory_uri."/img/".$media_header.".jpg";
	} else {
		$media_header_url = get_post_meta($post->ID, 'media_header_url', true);
	} ?>
   $(function(){
      if (isMobile === false) {
         var headerHeight = ($('#ctas').length > 0 ? $('#ctas .panel').outerHeight(true)/2 + "px" : "75px");
	     $('#content').css('padding-top', headerHeight);
	     $('#content').css('background-image', 'url(<?php echo $media_header_url ?>)');
	  }
   });
<?php }
$global_clicktracker = trim(get_post_meta($post->ID, 'global_clicktracker', true)); // global clicktracker
if ($global_clicktracker != "") { ?>
   $(function(){
      $('.panel a').each(function() {
	    var imgDetect = $(this).find("img").length;
		if (imgDetect == 0) {	
	  		var oldText = $(this).text(); // ie8 fix
		}
		$(this).attr('href', '<?php echo scrubClicktracker($global_clicktracker) ?>' + this.href);
		if (imgDetect == 0) {
			$(this).text(oldText); // ie8 fix
		}
	  });
   });
   $(function(){
      $('.panel form').each(function() {
         $(this).attr('action', '<?php echo scrubClicktracker($global_clicktracker) ?>' + this.action);
      });
   });
<?php } // user ids to clicktracked hyperlinks ?>
   $(function(){
      var user = getParameterByName("u");
      if (user != "") {
         $('#content a, a.btn-action').each(function() {
            if ($(this).attr('href').toLowerCase().indexOf("ad.doubleclick.net/clk") >= 0) {
               var values = $(this).attr('href').split("?");
               for (i=0;i<values.length;i++) {
                  if (values[i].indexOf("ad.doubleclick.net/clk") >= 0 && values[i].indexOf("utm_") == -1 && values[i].indexOf("ad.doubleclick.net/adj") == -1 && values[i].indexOf("ad.doubleclick.net/adi") == -1 && values[i].indexOf("ad.doubleclick.net/jump") == -1) {
                     values[i]+=";u="+user+";";
                  }
               }
               $(this).attr('href', values.join('?'));
            }
         });
      }
   });	 
   $(function(){ // campaign ID to footer link
      var cpgn = getParameterByName("cpgn");
      if (cpgn != "") {
	     $('.footer a').each(function() {
		    if ($(this).attr('href').toLowerCase().indexOf("www.linkedin.com") >= 0) {
		       $(this).attr('href', this.href+'&trkInfo=campaign_id:'+cpgn);		   
		    }
		 });	  
      }
   });   	
});
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-34875559-1']);
_gaq.push(['_trackPageview']);
(function() {
   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
<?php $pixel_url = get_post_meta($post->ID, 'pixel_url', true);
if ($pixel_url != "") {
	echo "<img src='";
    echo $pixel_url;
    echo "' height='1' width='1' alt='' border='1'/>";
}
?>
</body>
</html>