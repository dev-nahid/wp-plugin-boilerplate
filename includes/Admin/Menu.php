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

        $parent_slug = 'devnahid';
        $capability = 'manage_options';

        add_menu_page( __( 'DevNahid Options', 'devnahid-plugin' ), __( 'DevNahid', 'devnahid-plugin' ), $capability, $parent_slug, [ $this, 'plugin_page'], 'dashicons-welcome-learn-more', 79 );

        add_submenu_page( $parent_slug, __( 'Add Book', 'devnahid-plugin' ), __( 'Add Book', 'devnahid-plugin' ), $capability, $parent_slug, [ $this, 'plugin_page' ] );

        add_submenu_page( $parent_slug, __( 'Settings', 'devnahid-plugin' ), __( 'Settings', 'devnahid-plugin' ), $capability, 'add_book', [ $this, 'settings_page' ] );

    }

    public function plugin_page() {
        echo 'Add New Book';
    }
    public function settings_page() {
        echo 'Settings Page';
    }

 }