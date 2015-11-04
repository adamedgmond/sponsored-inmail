<?php
$companywidget_companyid = get_post_meta($post->ID, 'companywidget_companyid', true);
$companywidget_connections = get_post_meta($post->ID, 'companywidget_connections', true);
?>
<script type="IN/CompanyProfile" data-id="<?php echo $companywidget_companyid?>" data-format="inline"
<?php if ($companywidget_connections != "yes") { ?>data-related="false"<?php } ?>></script>