<?php

/**
 * Plugin Name: Addons Code Snippet - WPT
 * Plugin URI: #
 * Description: Only for wooproducttable.com demo site.
 * Author: Saiful Islam
 * Author URI: https://profiles.wordpress.org/codersaiful/#content-plugins
 * 
 * Version: 1.0.0
 * Requires at least:    4.0.0
 * Tested up to:         5.4.2
 * WC requires at least: 3.7
 * WC tested up to:      4.4.1
 * 
 */


if ( !defined( 'ABSPATH' ) ) {
    die();
}

if ( !defined( 'WPT_CODE_SNIPPET_ADDONS_VERSION' ) ) {
    define( 'WPT_CODE_SNIPPET_ADDONS_VERSION', '1.0.0');
}
if( !defined( 'WPT_CODE_SNIPPET_ADDONS_CAPABILITY' ) ){
    $wpt_code_snippet_addons_capability = apply_filters( 'wpt_code_snippet_addons_menu_capability', 'manage_woocommerce' );
    define( 'WPT_CODE_SNIPPET_ADDONS_CAPABILITY', $wpt_code_snippet_addons_capability );
}

if ( !defined( 'WPT_CODE_SNIPPET_ADDONS_NAME' ) ) {
    define( 'WPT_CODE_SNIPPET_ADDONS_NAME', 'UltraAddons - Addons Plugin');
}

if ( !defined( 'WPT_CODE_SNIPPET_ADDONS_BASE_NAME' ) ) {
    define( 'WPT_CODE_SNIPPET_ADDONS_BASE_NAME', plugin_basename( __FILE__ ) );
}

if ( !defined( 'WPT_CODE_SNIPPET_ADDONS_MENU_SLUG' ) ) {
    define( 'WPT_CODE_SNIPPET_ADDONS_MENU_SLUG', 'UltraAddons-addons' );
}
if( !defined( 'WPT_CODE_SNIPPET_ADDONS_PLUGIN' ) ){
    define( 'WPT_CODE_SNIPPET_ADDONS_PLUGIN', 'UltraAddons-addons/init.php' );
}


if ( !defined( 'WPT_CODE_SNIPPET_ADDONS_BASE_URL' ) ) {
    define( "WPT_CODE_SNIPPET_ADDONS_BASE_URL", plugins_url() . '/'. plugin_basename( dirname( __FILE__ ) ) . '/' );
}

if ( !defined( 'WPT_CODE_SNIPPET_ADDONS_BASE_DIR' ) ) {
    define( "WPT_CODE_SNIPPET_ADDONS_BASE_DIR", str_replace( '\\', '/', dirname( __FILE__ ) ) );
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );


//Including File
include_once WPT_CODE_SNIPPET_ADDONS_BASE_DIR . '/includes/load-scripts.php';
include_once WPT_CODE_SNIPPET_ADDONS_BASE_DIR . '/includes/action-hook.php';
include_once WPT_CODE_SNIPPET_ADDONS_BASE_DIR . '/includes/functions.php';

