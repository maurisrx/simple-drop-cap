// check if the website use genesis framework
if ( wp_get_theme( 'genesis' ) ) {
	// replace get_the_content_limit() with the custom one
	remove_filter( 'the_content_limit', 'get_the_content_limit' );
	add_filter( 'the_content_limit', 'wpsdc_get_the_content_limit' );
	add_filter( 'the_content_limit', 'do_shortcode' );

	// copied from genesis/lib/functions/formatting.php:57
	function wpsdc_get_the_content_limit( $max_characters, $more_link_text = '(more...)', $stripteaser = false ) {

		$content = get_the_content( '', $stripteaser );

		//* Strip tags and shortcodes so the content truncation count is done correctly
		$content = strip_tags( $content, apply_filters( 'get_the_content_limit_allowedtags', '<script>,<style>' ) );

		//* Remove inline styles / scripts
		$content = trim( preg_replace( '#<(s(cript|tyle)).*?</\1>#si', '', $content ) );

		//* Truncate $content to $max_char
		$content = genesis_truncate_phrase( $content, $max_characters );

		//* More link?
		if ( $more_link_text ) {
			$link   = apply_filters( 'get_the_content_more_link', sprintf( '&#x02026; <a href="%s" class="more-link">%s</a>', get_permalink(), $more_link_text ), $more_link_text );
			$output = sprintf( '<p>%s %s</p>', $content, $link );
		} else {
			$output = sprintf( '<p>%s</p>', $content );
			$link = '';
		}

		return apply_filters( 'get_the_content_limit', $output, $content, $link, $max_characters );

	}
}