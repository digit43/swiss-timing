<?php
/**
 * Swiss Timing main class
 * 
 * @since      1.0.0
 * @package    swiss-timing
 * @author     sinch.pro <admin@sinch.pro>
 */
class Swiss_Timing {

    /**
     * Plugin root directory
     * 
     * @var      string
     * @access   private
     */
    private $root_dir;

    /**
     * Plugin version
     * 
     * @var      string
     * @access   private
     */


    /**
     * Constructor
     * 
     * @since      1.0.0
     * @return     void
     */
    public function __construct() {

        $this->root_dir = SWISS_ROOT;

        $this->version = SWISS_VERSION;

        $this->root_url = SWISS_ROOT_URL;

        // Require xml helper class
        require_once plugin_dir_path(__FILE__) . 'class-xml-swiss-timing.php';

        $xml = new XML_Swiss_Timing;

        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_plugin_scripts') );
    }

    /**
     * Enqueue plugin scritps.
     * 
     * @since      1.0.0
     * @return     void
     */
    public function enqueue_plugin_scripts() {

        wp_register_style( 'swiss-styles', $this->root_url . 'assets/css/main.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'swiss-styles' );
    }
} 