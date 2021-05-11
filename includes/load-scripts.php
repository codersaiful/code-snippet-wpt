<?php

if( !function_exists( 'wpt_code_snippet_addons_enqueue_scripts' ) ){
    function wpt_code_snippet_addons_enqueue_scripts(){
        wp_enqueue_style( 'wpt_code_snippet-addons-style', WPT_CODE_SNIPPET_ADDONS_BASE_URL . 'assets/css/style.css', array(), '1.0.0', 'all' );
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'wpt_code_snippet-addons-script', WPT_CODE_SNIPPET_ADDONS_BASE_URL . 'assets/js/scripts.js', array( 'jquery' ), '1.0.0', true );

        $ajax_url = admin_url( 'admin-ajax.php' );
        $WPT_CODE_SNIPPET_ADDONS_DATA = array( 
            'ajaxurl'   => $ajax_url,
            'ajax_url'  => $ajax_url,
            'site_url'  => site_url(),
            'checkout_url' => wc_get_checkout_url(),
            'cart_url' => wc_get_cart_url(),
            );
        wp_localize_script( 'wpt_code_snippet-addons-script', 'WPT_CODE_SNIPPET_ADDONS_DATA', $WPT_CODE_SNIPPET_ADDONS_DATA );
    }
}
add_action( 'wp_enqueue_scripts', 'wpt_code_snippet_addons_enqueue_scripts' );

if( !function_exists( 'wpt_code_snippet_addons_admin_enqueue_scripts' ) ){
    function wpt_code_snippet_addons_admin_enqueue_scripts( ) {
        wp_enqueue_style( 'wpt_code_snippet-addons-css', WPT_CODE_SNIPPET_ADDONS_BASE_URL . 'assets/css/admin-common.css', array(), '1.0.0', 'all' );
        wp_enqueue_style('wpt_code_snippet-addons-css');

        wp_enqueue_style( 'wpt_code_snippet-addons-admin', WPT_CODE_SNIPPET_ADDONS_BASE_URL . 'assets/css/admin-style.css', array(), '1.0.0', 'all' );
        wp_enqueue_script( 'wpt_code_snippet-addons-admin', WPT_CODE_SNIPPET_ADDONS_BASE_URL . 'assets/js/admin-script.js', array( 'jquery' ), '1.0.0', true );
    }
}
add_action( 'admin_enqueue_scripts', 'wpt_code_snippet_addons_admin_enqueue_scripts' );