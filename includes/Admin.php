<?php 

namespace DevNahid\Plugin;

/**
 * The admin class
 * 
 * @return void
 */

 class Admin {

    function __construct() {
        new Admin\Menu();
    }
 }