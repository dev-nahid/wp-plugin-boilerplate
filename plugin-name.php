<?php
/*
 * Plugin Name:       devNahid Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Nahid Hasan
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       devnahid-plugin
 * Domain Path:       /languages
 */



if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Use php composer for namespace. 
 */
// require_once __DIR__ . '/vendor/autoload.php';


/**
 * Plugin main class -- Final class, so can't access other people
 */
final class DevNahid_Plugin {
  
    /**
     * Define plugin version
     */
    const version = '1.0.0';


    /**
     * Class constructors
     */
    private function __construct() {
        $this->define_constants();
        register_activation_hook( __FILE__, [ $this, 'activate' ] );
        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Initializes a singleton instance
     * 
     * @return \DevNahid_Plugin 
     */
     public static function init() {

        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
     }


     /**
      * Define required plugin constants
      *
      *@return void
      */
      public function define_constants() {
        define( 'DEVNAHID_VERSION', self::version );
        define( 'DEVNAHID_FILE', __FILE__ );
        define( 'DEVNAHID_PATH', __DIR__ );
        define( 'DEVNAHID_URL', plugins_url( '', DEVNAHID_FILE ) );
        define( 'DEVNAHID_ASSETS', DEVNAHID_URL . '/assets' );
      }


      /**
       * Initialize after plugin file loaded
       */
      public function init_plugin() {

        if ( is_admin() ) {
          //new DevNahid\Plugin\Admin();
        }else {
         // new DevNahid\Plugin\Frontend();
        }
      }

      /**
       * do staff upon plugin activation
       * 
       * @return void
       */
      public function activate() {

        /**
         * Initialize the plugin activation time blow this hook. So we can able to check the time of this plugin installed
         */
        $installed = get_option( 'devnahid_installed' );

        if ( ! $installed ) {
            update_option( 'devnahid_installed', time() );
        }

        
        /**
         * Initialize the plugin version on the database. So we able to check which version of this plugin running.
         */
        update_option( 'devnahid_version', DEVNAHID_VERSION );
      }


} //END CLASS



/**
 * Initializes the main plugin
 * 
 * @return \DevNahid_Plugin 
 */

function devnahid_plugin() {
    return DevNahid_Plugin::init();
}

// Finally run the plugin!
// devnahid_plugin();