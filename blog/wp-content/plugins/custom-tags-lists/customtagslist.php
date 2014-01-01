<?php
/*
Plugin Name: Custom Tags List
Plugin URI: http://www.junyent.org/blog/2006/05/20/around-this-date-in-the-past-wordpress-widget/
Description:  It allows to display highly customizable tags lists.
Version: 0.2.1
Author: Joan Junyent Tarrida
Contributors: jjunyent
Author URI: http://www.junyent.org/

[ Notas en castellano en la web ]  [  Notes en català  a la web ]

*/


// Displays a tags list in a nice way (ex: apples, oranges, grapes and kiwis)
function the_tags_nice($normal_separator = ', ', $last_separator = ' and ') {
    $tags = get_the_tags();
        $i = 1;
        $n = count($tags);
        foreach($tags as $tag) {
            $separator = '';
            if (1 < $i && $i != $n) $separator = $normal_separator;
            if (1 < $i && $i == $n) $separator = $last_separator;
			$link = get_tag_link($tag->term_id);
				if ( is_wp_error( $link ) )
			return $link;				
            $taglink = '<a rel="tag" href="' . $link . '" title="' . sprintf(__("View all posts in %s"), $tag->name) . '">'.$tag->name.'</a>';
		echo $separator . $taglink;	
                     ++$i;
        }
}

// Displays a tags list with links to RSS
function the_tags_rss($normal_separator = ', ', $last_separator = ' and ') {
    $tags = get_the_tags();
        $i = 1;
        $n = count($tags);
        foreach($tags as $tag) {
            $separator = '';
            if (1 < $i && $i != $n) $separator = $normal_separator;
            if (1 < $i && $i == $n) $separator = $last_separator;
			$link = get_tag_link($tag->term_id);
				if ( is_wp_error( $link ) )
			return $link;				
            $taglink = '<a rel="rss" href="' . $link . 'feed/" title="' . sprintf(__("Subscribe to %s posts"), $tag->name) . '">'.$tag->name.'</a>';
		echo $separator . $taglink;	
                     ++$i;
        }
}

// Display a tag list with links to an external social site (eg. Flikr, Technorati, Digg, Del.icio.us, Wordpres.com etc...)
function the_tags_external($url='http://wordpress.com/tag/', $title='Find items related to ', $normal_separator = ', ', $last_separator = ' and '){
	$tags = get_the_tags();
    $i = 1;
    $n = count($tags);
    foreach($tags as $tag) {
        $separator = '';
        if (1 < $i && $i != $n) $separator = $normal_separator;
        if (1 < $i && $i == $n) $separator = $last_separator;
        $taglink = '<a rel="external" href="' . $url . $tag->name . '" title="' . $title . $tag->name . '">'.$tag->name.'</a>';
		echo $separator . $taglink;	
             ++$i;
    }
}


/* Examples of custom functions. Uncoment to make use of the ready-to-use examples */
// include ("./examples.php");


?>