<?php

// do shortcode in post excerpt, use cutom wp_trim_excerpt()
remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'wpsdc_wp_trim_excerpt' );
add_filter( 'the_excerpt', 'do_shortcode' );

// Copied from wp-includes/post-formatting.php
function wpsdc_wp_trim_excerpt($text = '') {
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');
		// $text = strip_shortcodes( $text );
		// $text = apply_filters( 'the_content', $text );
		$text = str_replace(']]>', ']]&gt;', $text);		
		$excerpt_length = apply_filters( 'excerpt_length', 55 );		
		$excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
}