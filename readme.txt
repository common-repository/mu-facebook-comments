=== Responsive Facebook Comments ===
Contributors: ajith2011
Donate link: http://makeusawebsite.lk/plugins/donate/
Tags: facebook, comments, facebook comments, responsive
Requires at least: 4.0
Tested up to: 4.2.2
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Wordpress commenting plugin which is easy to install and configure.

== Description ==

Responsive Facebook Comments plugin makes commenting easy and nice. It is a javascript based responsive iframe containing a box to publish comments using visitors facebook account and list of published comments. Visitors will have to log into their facebook account before post comments.

= Docs & Support =

You can find [docs](http://makeusawebsite.lk/plugins/muaw-fb-comments/docs/), [FAQ](http://makeusawebsite.lk/plugins/muaw-fb-comments/faq/) and more detailed information about Responsive Facebook Comments on [makeusawebsite.lk](http://makeusawebsite.lk/plugins/muaw-fb-comments/).

= Responsive Facebook Comments Needs Your Support =

It is hard to continue development and support for this free plugin without contributions from users like you. If you enjoy using Responsive Facebook Comments plugin and find it useful, please consider [__making a donation__](http://makeusawebsite.lk/plugins/donate/). Your donation will help encourage and support the plugin's continued development and better user support.


== Installation ==

1. Upload the entire `muaw-fb-comments` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.

You will find 'FB Comment' sub-menu under settings menu in your WordPress admin panel.

For basic usage, you can also have a look at the [plugin homepage](http://makeusawebsite.lk/plugins/muaw-fb-comments/).

== Frequently Asked Questions ==
= Q: I have installed and activated the plugin. But I can't see the comments block =
A: This plugin replaces wordpress default comments section. So, your theme will have to have a comments section where you need to see the comments block. For example, use following code in single.php right before the end of the loop ( just before endwhile; )
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;


== Screenshots ==

1. screenshot-1.png
1. screenshot-1.png

== Changelog ==
