<?php
global $recommendwidget_companyid;
$recommendwidget_productid = get_post_meta($post->ID, 'recommendwidget_productid', true);
$recommendwidget_prepend = get_post_meta($post->ID, 'recommendwidget_prepend', true);
$recommendwidget_text = (get_post_meta($post->ID, 'recommendwidget_text', true) == "" ? "Professionals in your LinkedIn Network have recommended this!" : get_post_meta($post->ID, 'recommendwidget_text', true));
$recommendwidget_button = (get_post_meta($post->ID, 'recommendwidget_button', true) == "" ? "View details" : get_post_meta($post->ID, 'recommendwidget_button', true));
if ($recommendwidget_productid == "") { ?>
<script type="IN/RecommendProduct" data-company="<?php echo $recommendwidget_companyid?>" data-product="201714" data-counter="top"></script>
<div><?php echo $recommendwidget_text?><br/><a target="_blank" class="btn-ternary" href="<?php echo scrubClicktracker($recommendwidget_prepend) ?>http://www.linkedin.com/company/<?php echo $recommendwidget_companyid?>/" rel="external"><?php echo $recommendwidget_button?></a></div>
<?php } else { ?>
<script type="IN/RecommendProduct" data-company="<?php echo $recommendwidget_companyid?>" data-product="<?php echo $recommendwidget_productid?>" data-counter="top"></script>
<div><?php echo $recommendwidget_text?><br/><a target="_blank" class="btn-ternary" href="<?php echo scrubClicktracker($recommendwidget_prepend) ?>http://www.linkedin.com/company/<?php echo $recommendwidget_companyid?>/<?php echo $recommendwidget_productid?>/product" rel="external"><?php echo $recommendwidget_button?></a></div>
<?php } ?>
