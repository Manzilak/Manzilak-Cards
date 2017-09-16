<?php
    /*
    Plugin Name: Manzilak Cards
    Plugin URI: https://manzilak.com
    Description: This plugin helps creating Facebook Open Graphic, Twitter Cards, Google+ Meta Data, and Search Engine Optimization Meta Data
    Version: 0.1
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
     
    function manzilak_cards() {
        global $seo_home_metas,
                $schema_home_tags,
                $facebook_home_og,
                $twitter_home_cards,
                $seo_article_metas,
                $schema_article_tags,
                $facebook_article_og,
                $twitter_article_cards;
        if( is_home() ) {
            echo $seo_home_metas;
            echo $schema_home_tags;
            echo $facebook_home_og;
            echo $twitter_home_cards;
        } elseif( is_single() ) {
            echo $seo_article_metas;
            echo $schema_article_tags;
            echo $facebook_article_og;
            echo $twitter_article_cards;
        } else {
            echo $seo_home_metas;
            echo $schema_home_tags;
            echo $facebook_home_og;
            echo $twitter_home_cards;
        }

    }

    add_action( 'wp_head' , 'manzilak_cards' );