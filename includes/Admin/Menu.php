<?php

namespace DevNahid\Plugin\Admin;

/**
 * The Menu handle class - Add Menu item in wordpress admin
 * 
 * @return void
 */

 class Menu {

    function __construct() {
        
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    }

    public function admin_menu() {

        add_menu_page( __( 'DevNahid Options', 'devnahid-plugin' ), __( 'DevNahid', 'devnahid-plugin' ), 'manage_options', 'devnahid-slug', [ $this, 'plugin_page'], 'dashicons-admin-plugins' );

    }

    public function plugin_page() {
        echo 'Hello DevNahid';
    }

 }