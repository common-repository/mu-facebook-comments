<?php
$options  = get_option('mufbc_option');
$site_url = get_the_permalink();
$data_width = $options['mufbc_data_width'];
$data_numposts = $options['mufbc_data_numposts'];

if($site_url !=''){
?>
<div class="mufbc-comments">
    <div class="fb-comments" data-href="<?php echo $site_url; ?>" data-width="600" data-numposts="5"></div>
</div>
<?php } ?>