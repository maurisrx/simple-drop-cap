<?php

add_action( 'plugins_loaded', 'wpsdc_load_textdomain' );

function wpsdc_load_textdomain() {
	$wpsdc_lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
	load_plugin_textdomain( 'simple-drop-cap', false, $wpsdc_lang_dir );
}