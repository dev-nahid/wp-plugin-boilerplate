<?php 

namespace DevNahid\Plugin;

/**
 * The Frontend handler class
 * 
 * @return void
 */

 class Frontend {

    function __construct() {
        new Frontend\Shortcode();
    }
 }