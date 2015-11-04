<footer><div class="footer">
    <?php $overridedisclaimer = wpautop(get_field('override_disclaimer'));
	$footer_date = date('Y');
	$footer_text_1 = "<p><strong>Why did I receive this message?</strong> This Sponsored InMail was sent to you based on non-personal information, such as the title of your current position, your primary industry, or your region. Per our privacy policy, your name and e-mail address have not been disclosed. <a href='https://www.linkedin.com/settings/?tab=email&modal=nsettings-partner-inmail&trk=coml-opt-out'>Edit your Sponsored InMail contact settings.</a></p>
    <p>Copyright &copy; ";
	$footer_text_2 = " LinkedIn Corporation, 2029 Stierlin Court, Mountain View, <span title='California'>CA</span>, <span title='United States of America'>USA</span>. All rights reserved.</p>";
	if (!$overridedisclaimer)
	  {
               echo $footer_text_1.$footer_date.$footer_text_2;
          }
          else
          {
               echo "<p>$overridedisclaimer</p>";
          } ?>
</div></footer>
