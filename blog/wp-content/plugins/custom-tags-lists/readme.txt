=== Custom Tags List ===
Plugin Name: Custom Tags List
Author: Joan Junyent Tarrida
Author URI: http://junyent.org/
Contributors: jjunyent
Donate link: http://projectes.junyent.org/
Plugin URI: http://projectes.junyent.org/custom-tags-list/
Version: 0.2.1
Tags: tags
Requires at least: 2.3
Tested up to: 3.6
Stable tag: 0.2.1

== Description ==

[ Notas en castellano en la web ]  [  Notes en català a la web ]

It allows to display highly customizable tags lists. You can create tags lists linking to anything you want (RSS feeds, twitter hashtags, wordpress.com tags, wikipedia terms, google searches, flickr tags...). Use your tags in a completely new way!

= Usage =

Place the desired function on your theme wherever you want your tag list to appear.

`<?php the_tags_nice(', ' , ' and '); ?>`

Shows a tags list like the regular one but in a nice way. Ex: apples, oranges, grapes and kiwis.

`<?php the_tags_rss(', ' , ' and '); ?>`

Shows a tags list with links to the rss feed.
	
`<?php the_tags_external('http://wordpress.com/tag/' , 'Find related posts on Wordpress.com', ' , ' and '); ?>`

Shows a tags list with links to any external social site. 

You can also make use of the examples included uncomenting the line include "("examples.php");"
	
= Function parameters =

	$url = URL to the social webservice you want to link. Defaults to 'http://wordpress.com/tag/'.
	$title = Title for the link. Defaults to 'Find related posts on Wordpress.com'.
	$separator = Separator for the tags. Defaults to ' , '.
	$last_separator = Separator for the last tag. Defaults to ' and '.
	 
= ToDo =

Create widgets for the tags lists.
	
= Credits and Acknowledgments =

This plugin is based on:

* [Nice Categories plugin by Mark Jaquith](http://txfx.net/2004/07/22/wordpress-conversational-categories/)
* [Ultimate Tag Warrior by Christine Davis](http://www.neato.co.nz/ultimate-tag-warrior)

Thanks to Mark Jaquith and Christine Davis for writing their plugins.

Image credits for the plugin header: http://www.flickr.com/photos/sheeprus/7123952917/

== Installation ==

1. Once downloaded the file, uncopress it and upload it through FTP to the server where your Wordpress blog is hosted.
2. Copy it to the folder /wp-content/plugins/.
3. Activate it through the plugin management screen.
4. Put any of the functions avaliable on the desired place.


== Frequently Asked Questions ==

None yet

== Screenshots ==

None yet


	
== License ==
	
This plugin is free software. You can redistribute it and/or modify it under the terms of the GPL License (don't remove credits to author, please). See license.txt for details


== Changelog ==
= 0.2.1 = 
Fixing deployment error

= 0.2 = 
Metadata update

= 0.1 = 
Initial release






