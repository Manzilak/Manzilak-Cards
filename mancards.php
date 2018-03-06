<?php
    /*
    Plugin Name: Manzilak Cards
    Plugin URI: https://manzilak.com
    Description: This plugin helps creating Facebook Open Graphic, Twitter Cards, Google+ Meta Data, and Search Engine Optimization Meta Data
    Version: 0.2.1
    Author: Abdullah Alghamdi
    Author URI: https://manzilak.com
    License: GPLv2 or later
    */
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    if( !defined( 'ABSPATH' ) ) {
        exit;
    }

    require_once( plugin_dir_path(__FILE__) . 'inc/mancards-settings.php' );
    require_once( plugin_dir_path(__FILE__) . 'inc/mancards-head.php' );
    
    function mancards_scripts() {
      wp_enqueue_script( 'mancards', plugin_dir_url( __FILE__ ) .'assets/js/mancards.js', array(), '0.2.1', true );
    }

    add_action( 'wp_enqueue_scripts', 'mancards_scripts' );
