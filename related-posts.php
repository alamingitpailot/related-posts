<?php
/*
* 
* Plugin Name: Related Posts
* Description: Displays related posts below content based on categories to enhance engagement and navigation.
* Version: 1.0.0
* Author: Al Amin
* Author URI: https://github.com/alamingitpailot
* License: GPLv3
* License URI: https://www.gnu.org/licenses/gpl-3.0.txt
* Text Domain: related-posts
*
*/


if ( !defined('ABSPATH') ) { exit; }

class ALRP_Related_posts{

    public static $instance;

    private function __construct()
    {
        $this->defined_constants();
        $this->load_classes();

        // assets enqueue js&css
        add_action( 'wp_enqueue_scripts', array($this, 'alrp_plugins_enqueue_assets') );
        
    }

    public static function get_instance() {
        if( self::$instance ) {
            return self::$instance;
        }

        self::$instance = new self();
        return self::$instance;
    }

    public function defined_constants() {
        define('ALRP_PLUGIN_VERSION', '1.0.0');
        define('ALRP_PLUGIN_PATH', plugin_dir_path(__FILE__));
        define('ALRP_PLUGIN_ASSETS', plugin_dir_url(__FILE__) . 'assets/');
    }

    public function load_classes() {

        require_once ALRP_PLUGIN_PATH . 'includes/get_category_show_posts.php';
        new ALRP_Related_Posts\get_category_show_posts();

    }

    public function alrp_plugins_enqueue_assets(){
        wp_register_style('alrp_main', ALRP_PLUGIN_ASSETS .'css/style.css', array(), ALRP_PLUGIN_VERSION );
        wp_enqueue_style('alrp_main');
    }
}
ALRP_Related_posts::get_instance();
 

