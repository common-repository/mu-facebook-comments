<?php
/*
Plugin Name: Facebook Comment
Plugin URI: http://makeusawebsite.lk/plugins/muaw-fb-comments/
Description: A plugin enables users to add comments using their facebook profile.
Version: 1.0
Author: Ajith K Ranatunga
Author URI: http://www.makeusawebsite.lk/author/ajith/
License: GPL2
Text Domain: mufbc
*/
if(!class_exists('MuFBSettingsPage')){
    require_once('MuFBSettingsPage.php');
}

/** loading required files */
function muaw_fbc_load_scripts(){
    wp_enqueue_script('muaw-jquery', plugin_dir_url(__FILE__).'js/jquery-min.js');
}
add_action('wp_enqueue_scripts', 'muaw_fbc_load_scripts');

function muaw_fbc_load_styles(){
    wp_enqueue_style('muaw-fbc-style', plugin_dir_url(__FILE__).'css/mufbc-comments.css');
}
add_action('wp_enqueue_scripts', 'muaw_fbc_load_scripts', '', '', true);

function init_fb_comment_api(){
    ?>
    <script>
        jQuery(document).ready( function($) {
            jQuery('body').prepend('<div id=/"fb-root/"></div>');
            var script = document.createElement( 'script' );
            script.type = 'text/javascript';
            script.src = "<?php echo plugins_url( ) ?>/mu-facebook-comments/js/muaw-fb-comments.js";
            jQuery('body').prepend(script);
        });
    </script>
<?php
}
add_action('wp_head', 'init_fb_comment_api');

function muaw_show_fbcomments(){
    return dirname(__FILE__) . '/comments.php';
}
add_filter( "comments_template", "muaw_show_fbcomments",0 );

$settings = new MuFBSettingsPage();