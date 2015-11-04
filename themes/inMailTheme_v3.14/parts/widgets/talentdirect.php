<?php 
global $button_td_campaignid, $action_text, $secondary_button_flag, $secondary_text;
$agreement_td_text = (get_post_meta($post->ID, 'agreement_td_text', true) == "" ? "By clicking the button, I agree that my contact information will be forwarded directly to a recruiter." : get_post_meta($post->ID, 'agreement_td_text', true));
$check_td_text = (get_post_meta($post->ID, 'check_td_text', true) == "" ? "Share my email address" : get_post_meta($post->ID, 'check_td_text', true));
$button_text = ($action_text == "" ? "I'm interested!" : $action_text);
$secondary_text_class = ($secondary_text != "" ? "td_secondary_text" : "");
?>
<form action="https://www.linkedin.com/secure/inMailResponse" method="GET" class="td <?php echo $secondary_text_class ?>" id="td_<?php echo $secondary_button_flag ?>" name="td_<?php echo $secondary_button_flag ?>">
  <input name="campaignId" type="hidden" value="<?php echo $button_td_campaignid?>" />
  <div class="talentdirect_details">
    <p class="td_agreement"><?php echo $agreement_td_text?></p>
    <div class="td_button"><a class="btn-action" href="javascript:document.forms.td_<?php echo $secondary_button_flag ?>.submit();"><?php echo $button_text?></a></div>
    <div class="td_checkbox">
      <label>
         <input checked="checked" name="shareEmail" type="checkbox" /> <?php echo $check_td_text?>
      </label>
    </div>
  </div>
</form>
