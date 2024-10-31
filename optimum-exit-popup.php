<?php
/*
 * Plugin Name: Optimum Exit Popup
 * Plugin URI: https://wordpress.org/plugins/optimum-exit-popup
 * Version: 1.1.2
 * Description: Optimum Exit Popup is a simple and light wieght exit popup plugin. Using this plugin, you can show popup with information or a subscription form to your website visitors. This is the most easier and user friendly Exit Popup Plugin released in Wordpress plugin directory, so far.
 * Author: Optimum Creative
 * Author URI: http://www.optimumcreative.com
 * License: GPLv2 or later
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//File includes
require("inc/popup.php"); //Popup
require("inc/popup-settings.php"); //Popup Settings page

// CSS Enqueue

function ocep_add_popup_css() 
{
    wp_enqueue_style( 'optimum-exit-popup', plugins_url( '/css/oc-popup-style.css', __FILE__ ) );
}
add_action('wp_enqueue_scripts', 'ocep_add_popup_css');
function ocep_load_jquery() {
    if ( ! wp_script_is( 'jquery', 'enqueued' )) {
        //Enqueue
        wp_enqueue_script( 'jquery' );
    }
}
add_action( 'wp_enqueue_scripts', 'ocep_load_jquery' );