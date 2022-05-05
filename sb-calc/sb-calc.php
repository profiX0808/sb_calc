<?php
/**
 * @package sb_calc
 * @version 1.0
 */
/*
Plugin Name: Simplest Bitcoin Calc
Description: Add shortcode like [sb_calc style="1"]
Author: Alexander Berkut
Version: 1.0
*/

if ( ! defined( 'WPINC' ) ) { die; }

//It is good to add it in a function that is hooked to init hook. So that WordPress has time to initialize properly.
add_action( 'init', 'sb_calc_add_shortcode' );

function sb_calc_add_shortcode() {
	add_shortcode( 'sb_calc', 'sb_calc_func' );
	wp_enqueue_script( 'cb-query-ajax' );
}

//Shortcode tag using the API
function sb_calc_func( $atts ) {
	if ( $atts['style'] == 1 ) {

		ob_start();
		require_once( plugin_dir_path( __FILE__ ) . 'templates/calc-template.php' );
		$view = ob_get_contents();
		ob_end_clean();

	} else {
		$view = 'No template style selected';
	}
	
	return $view;
}

add_action( 'wp_enqueue_scripts', 'cb_scripts' );

function cb_scripts(){
	$url = trailingslashit( plugin_dir_url( __FILE__ ) );
	wp_register_script( 'cb-query-ajax', $url . "js/cb-jquery-ajax.js", array( 'jquery' ), '1.2', true );
}
