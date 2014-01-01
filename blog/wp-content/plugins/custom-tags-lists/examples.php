<?php 

// Displays tag images. Code taken from the Codex
function the_tags_images() {
	$url = 'http://example.com/images/';
	foreach((get_the_tags()) as $tag) {
		echo '<img src="' . $url . $tag->term_ID . '.jpg" alt="' . $tag->name . '" />';
	}
}

// Displays a tags list with links to technorati tags
function the_tags_technorati($normal_separator = ', ', $last_separator = ' and ') {
    $tags = get_the_tags();
        $i = 1;
        $n = count($tags);
        foreach($tags as $tag) {
            $separator = '';
            if (1 < $i && $i != $n) $separator = $normal_separator;
            if (1 < $i && $i == $n) $separator = $last_separator;
            $taglink = '<a rel="external" href="http://technorati.com/tag/' . $tag->name . '" title="' . sprintf(__("Find out on Technorati what others blog about %s"), $tag->name) . '">'.$tag->name.'</a>';
		echo $separator . $taglink;	
                     ++$i;
        }
}

// Displays a tags list with links to wordpress.com tags
function the_tags_wordpress($normal_separator = ', ', $last_separator = ' and ') {
    $tags = get_the_tags();
        $i = 1;
        $n = count($tags);
        foreach($tags as $tag) {
            $separator = '';
            if (1 < $i && $i != $n) $separator = $normal_separator;
            if (1 < $i && $i == $n) $separator = $last_separator;
            $taglink = '<a rel="external" href="http://wordpress.com/tag/' . $tag->name . '" title="' . sprintf(__("Find out on Wordpress.com what others blog about %s"), $tag->name) . '">'.$tag->name.'</a>';
		echo $separator . $taglink;	
                     ++$i;
        }
}


// Displays a tags list with links to google search
function the_tags_google($normal_separator = ', ', $last_separator = ' and ') {
    $tags = get_the_tags();
        $i = 1;
        $n = count($tags);
        foreach($tags as $tag) {
            $separator = '';
            if (1 < $i && $i != $n) $separator = $normal_separator;
            if (1 < $i && $i == $n) $separator = $last_separator;
            $taglink = '<a rel="external" href="http://www.google.com/search?q=' . $tag->name . '" title="' . sprintf(__("Search %s in Google"), $tag->name) . '">'.$tag->name.'</a>';
		echo $separator . $taglink;	
                     ++$i;
        }
}

// Displays a tags list with links to google blog search
function the_tags_googleblogsearch($normal_separator = ', ', $last_separator = ' and ') {
    $tags = get_the_tags();
        $i = 1;
        $n = count($tags);
        foreach($tags as $tag) {
            $separator = '';
            if (1 < $i && $i != $n) $separator = $normal_separator;
            if (1 < $i && $i == $n) $separator = $last_separator;
            $taglink = '<a rel="external" href="http://blogsearch.google.com/blogsearch?q=' . $tag->name . '" title="' . sprintf(__("Find out on Google BlogSearch what others blog about %s"), $tag->name) . '">'.$tag->name.'</a>';
		echo $separator . $taglink;	
                     ++$i;
        }
}

// Displays a tags list with links to wikipedia (English)
function the_tags_wikipedia($normal_separator = ', ', $last_separator = ' and ') {
    $tags = get_the_tags();
        $i = 1;
        $n = count($tags);
        foreach($tags as $tag) {
            $separator = '';
            if (1 < $i && $i != $n) $separator = $normal_separator;
            if (1 < $i && $i == $n) $separator = $last_separator;
            $taglink = '<a rel="external" href="http://en.wikipedia.org/wiki/' . $tag->name . '" title="' . sprintf(__("Find out more about %s on the Wikipedia"), $tag->name) . '">'.$tag->name.'</a>';
		echo $separator . $taglink;	
                     ++$i;
        }
}

// Displays a tags list with links to Del.icio.us
function the_tags_delicious($normal_separator = ', ', $last_separator = ' and ') {
    $tags = get_the_tags();
        $i = 1;
        $n = count($tags);
        foreach($tags as $tag) {
            $separator = '';
            if (1 < $i && $i != $n) $separator = $normal_separator;
            if (1 < $i && $i == $n) $separator = $last_separator;
            $taglink = '<a rel="external" href="http://del.icio.us/tag/' . $tag->name . '" title="' . sprintf(__("Find out links related to %s on Del.icio.us"), $tag->name) . '">'.$tag->name.'</a>';
		echo $separator . $taglink;	
                     ++$i;
        }
}

// Displays a tags list with links to Flickr
function the_tags_flickr($normal_separator = ', ', $last_separator = ' and ') {
    $tags = get_the_tags();
         $i = 1;
        $n = count($tags);
        foreach($tags as $tag) {
            $separator = '';
            if (1 < $i && $i != $n) $separator = $normal_separator;
            if (1 < $i && $i == $n) $separator = $last_separator;
            $taglink = '<a rel="external" href="http://www.flickr.com/photos/tags/' . $tag->name . '/" title="' . sprintf(__("Find out photos related to %s on Flickr"), $tag->name) . '">'.$tag->name.'</a>';
		echo $separator . $taglink;	
                     ++$i;
        }
}

// Displays a tags list with links to Newsvine
function the_tags_newsvine($normal_separator = ', ', $last_separator = ' and ') {
	$tags = get_the_tags();
        $i = 1;
        $n = count($tags);
        foreach($tags as $tag) {
            $separator = '';
            if (1 < $i && $i != $n) $separator = $normal_separator;
            if (1 < $i && $i == $n) $separator = $last_separator;
            $taglink = '<a rel="external" href="http://www.newsvine.com/' . $url . $tag->name . '" title="' . sprintf(__("Find out news related to %s on Newsvine"), $tag->name) . '">'.$tag->name.'</a>';
		echo $separator . $taglink;	
                     ++$i;
        }
}

?>