<?php 

namespace DevNahid\Plugin\Frontend;

/**
 * The shortcode handler class
 * 
 * @return void
 */

 class Shortcode {

    function __construct() {
        
        add_shortcode( 'devnahid-shortcode', [ $this, 'render_shortcode' ] );
    }

    public function render_shortcode( $attr, $content = '' ) {

        return 'Hello From Shortcode';

    }
 }