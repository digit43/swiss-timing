<?php
/**
 * Plugin Name: Swiss Timing
 * Author: sinch.pro
 * Author URI: https://sinch.pro
 * Plugin URI: https://sinch.pro
 * Description: Swiss Timing parser plugin
 * 
 */

// No direct access
if ( ! defined( "ABSPATH" ) ) {
    exit();
}

// Plugin root dir path
define( "SWISS_ROOT", plugin_dir_path(__FILE__) );

// Plugin root url
define( "SWISS_ROOT_URL", plugin_dir_url(__FILE__) );

// Plugin version
define( "SWISS_VERSION", "1.0.0" );

require_once plugin_dir_path( __FILE__ ) . 'includes/class-swiss-timing.php';

function init_swiss_timing() {
    $swiss_timing = new Swiss_Timing;
}

init_swiss_timing();